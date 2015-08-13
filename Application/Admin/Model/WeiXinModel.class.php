<?php
namespace Admin\Model;
use Think\Model;
class WeiXinModel extends Model{
    /**
     * [$textTpl description]下面两个是模板
     * 
     */
	public  $textTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<Content><![CDATA[%s]]></Content>
							<FuncFlag>0</FuncFlag>
				        </xml>"; 
    public $picTpl = "<xml>
							<ToUserName><![CDATA[%s]]></ToUserName>
							<FromUserName><![CDATA[%s]]></FromUserName>
							<CreateTime>%s</CreateTime>
							<MsgType><![CDATA[%s]]></MsgType>
							<ArticleCount>1</ArticleCount>
							<Articles>
							<item>
							<Title><![CDATA[%s]]></Title>
							<Description><![CDATA[%s]]></Description>
							<PicUrl><![CDATA[%s]]></PicUrl>
							<Url><![CDATA[%s]]></Url>
							</item>
							</Articles>
							<FuncFlag>1</FuncFlag>
					  </xml> ";

    /**
     * 下面两个函数是微信公众平台的接口，没有绑定的话要运行一次 之后可以注释掉或者不调用
     * @return void
     */
	public function valid() {  
        $echoStr = I('get.echostr');
        if($this->checkSignature()){  
            echo $echoStr;  
            exit;  
        }  
    }  
  
    private function checkSignature() {  
    	define('TOKEN', 'zhixing');
        $signature = I('get.signature');  
        $timestamp = I('get.timestamp');  
        $nonce = I('get.nonce');  
        $token = TOKEN;  
        $tmpArr = array($token, $timestamp, $nonce);  
        sort($tmpArr);  
        $tmpStr = implode( $tmpArr );  
        $tmpStr = sha1( $tmpStr );  
        if( $tmpStr == $signature ) {  
            return true;  
        } else {  
            return false;  
        }  
    }  

     /**
      * 获取返回微信的信息
      * @param  string $keyword 用户发送过来的信息
      * @return string 返回的是内容
      */
     public function getContent($keyword){
        $respon = $this->isAutoRespon($keyword);   //先检索有没有自动回复或者特殊回复
        if($respon['content']){
            return $respon;
        }
        if(is_numeric($keyword)){                 //如果是数字直接返回对应的文章
            $respon = $this->getArticleByNum($keyword);
            if($respon['content'])
            return $respon;
        }
        else{
        	$Article = new \Admin\Model\ArticleModel();	  //上诉两种没有找到结果就搜索
        	$list 	 = $Article->getSearchArticle($keyword);
        	$respon  = $this->changeSearchArrayToRespon($list);
        	if($respon['content']){
        		return $respon;
        	}
        }
     
     }
     /**
      * 返回信息的主函数
      * 
      * @return mixed XML字符串作为结果
      */
     public function responseMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if (!empty($postStr)){
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA); #这里有从用户通过公众平台接收过来的数据，具体是什么类型的数据，开发者文档上写的很清楚，可以去上面查。
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $msgType = $postObj->MsgType;
            $time = time();
            switch( $msgType ){
            case "text":           
            $contentStr = $this->getContent($keyword);
            if($contentStr['type']){
            	if($contentStr['type'] == 'text'){
            		$resultStr = sprintf($this->textTpl, $fromUsername, $toUsername, $time, 'text' ,$contentStr['content']);
            	}
            	else{
            		if($contentStr['type'] == 'news'){
            		$msgType = "news";
					// $title   = "123123";
					// $desription = "这是细节";
					// $image = "http://scauzhixing.duapp.com/Public/images/cover/2014-09-18/541a25cf8919d.jpg";
					// $turl = "http://www.baidu.com/";
            		$resultStr = sprintf($this->picTpl, $fromUsername, $toUsername, $time, 'news' , $contentStr['title'],$contentStr['content'],$contentStr['cover'],$contentStr['turl']);
                	}
           		}
            }
       		else{
                $specialRespon = M('wxspecialrespon');
                $contentStr = $specialRespon->where('id=2')->find();
           		$resultStr = sprintf($this->textTpl, $fromUsername, $toUsername, $time, 'text',$contentStr['content']);
            	
            }
           // $resultStr = sprintf($this->textTpl, $fromUsername, $toUsername, $time, $msgType,$contentStr['type'] . "++" . $contentStr['content']);
            echo $resultStr;
            $MSG = new \Admin\Model\WeixinmsgModel();
            $MSG->saveMsg($contentStr['content'],$keyword,$fromUsername,date('Y-m-d'));
            break;
            case "event": #这个是事件的操作，当关注的时候自动回复
					$event = $postObj->Event;
					$msgType = "text";
					if( $event =='subscribe'){
    					$contentStr = $this->saveUser($fromUsername);
                        $specialRespon = M('wxspecialrespon');
                        $respon = $specialRespon->where('id=1')->find();
                        $content = $respon['content'];
                        
    					$resultStr = sprintf($this->textTpl, $fromUsername, $toUsername, $time, 'text' , $content);
    					echo $resultStr;
    					break;
                    }
            }
        }
        else {
                echo "";
                exit;
             }
    }
    /**
     * 根据用户输入判定是不是有设定自动回复或者特殊回复
     * @param  string  $keyword
     * @return boolean 
     */
    public function isAutoRespon($keyword){
        $autoRespon = M('respon');
        $result     = $autoRespon->select();
        foreach ($result as  $value) {
            if($value['keyword']==$keyword){
                // $respon = array();
                // $respon['type']    = $value['type'];
                // $respon['content'] = $value['content'];
                // if($value['type'] == 'news'){
                //     $respon['title'] = $value['title'];
                //     $respon['cover'] = $value['']
                // }
                return $value;
            }
        }
        return null;
    }

    public function getArticleByNum($num){
        $Article = M('article');
        $content = $Article->where('id=' . $num . '&&status_0=1')->find();
        if(!$content){
            return null;
        }
        $respon  = $this->changgeArticleToRespon($content);
        return $respon;
    }

    /**
     * 把获取的文章改成回复需要的格式
     * 
     * @param  mixed $article 文章
     * @return mixed 回复
     */
    private function changgeArticleToRespon($article){
        $Article = new \Admin\Model\ArticleModel();
        $respon  = array();
        $respon['type'] = 'news';
        $respon['turl']  = C('BASE_HREF') . U('Home/Article/weixin?id=' . $article['id']); 
        $respon['cover']= $article['cover'];
        $respon['title']= $article['title'];
        $respon['content'] = $Article->getdescription($article['article'],20); 
        return $respon;
    }

    /**
     * 把获取的搜索结果转化为回复需要的格式
     * @param  mixed $array 一般是数组，搜索结果 
     * @return string XML字符串应该
     */
    public function changeSearchArrayToRespon($array){
        if(!$array[0]){
            return null;
        }
        $respon = array();
        $respon['type'] = 'text';
        foreach ($array as $value) {
            $respon['content'] .= $value['id'] . ".";
            $respon['content'] .= $value['title'] . "\n"; 
        }
        $respon['content'] .= "直接回复数字查看";
        return $respon;
    }
    /**
     * 存储新用户
     * @param  string $openid 加密编码后的用户名
     * @return void
     */
    public function saveUser($openid){
    	$data = array();
    	$data['openid'] = $openid;
    	//$weixinUser = M('weixinuser');
    	//$weixinUser->add($data);
    	$User = M("weixinuser"); // 实例化User对象
    	// $User->query("INSERT INTO " . C('DB_PREFIX') . "weixinuser SET openid='" . $openid . "'");
      $data = array();
      $data['openid'] = (string)$openid;
      $User->add($data);
    }
}
?>