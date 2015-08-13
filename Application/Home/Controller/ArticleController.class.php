<?php
namespace Home\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function index(){
		$Article  = new \Home\Model\ArticleModel();
        $Type     = new \Home\Model\TypeModel();
        $type     = I('get.type');
        $allChild = $Type->getAllChild($type);
        $infoOfType = $Type->getOneType($type);
       // var_dump($infoOfType);
        $where    = "type='" . $type . "' AND status_0=1";
		$content  = $Article->getContentByType('article', 8 , $where);
        if(!$content['list']){
            
        }
       // var_dump($allChild);
		//var_dump($content);
       // var_dump(I('get.type'));
        if(I('get.type')=='知行干货'){
            $this->assign('download',U('Home/Article/download'));
        }
        if(!$content['list']&&!$allChild[0]){  //确定是不是二级目录  
            $allChild = $Type->getSameType($type);
            $content  = $Article->getTopTypeArticle($type,8);
        }
        foreach ($content['list'] as &$value) {
            $value['description'] = $Article->getdescription($value['article'],50);
            $value['url']         = U('Article/article?id=' . $value['id']);
        }
        $ie = array();
        $ie[0] = '<!--[if lt IE 9]>
　　　　<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
　　<![endif]-->';
        $title       = $infoOfType[0]['name'];
        $description = $infoOfType[0]['description'];
        $keywords    = $infoOfType[0]['name'] . $infoOfType[0]['parent']; 
        $FriendLink   = M('friendlink');
        $allFriendlink= $FriendLink->where('status=1')->select();
        $this->assign('allFriendlink',$allFriendlink);
        $this->assign('allIeScript',$ie);
        $this->assign('head_title',$type);
        $this->assign('head_keywords',$keywords);
        $this->assign('head_description',$description);
        $this->assign('allChild',$allChild);
        $this->assign('type',$type);
		$this->assign('allArticle',$content['list']);
		$this->assign('pageTurn',$content['show']);
    	$this->display();
    }

    public function article(){
    	$Article = new \Home\Model\ArticleModel();
    	$Type 	 = new \Home\Model\TypeModel();
    	$content = $Article->getArticleById(I('get.id'));
    	//$navType = $Type->getNavType($content['type']);
    	//var_dump($navType);
       // var_dump($navType);
        // if($navType){
        //     $this->assign('navType',$navType); 
        //     $this->assign('navTypeUrl',U('Home/Article/index?type=' . $navType));
        // }
        $FriendLink   = M('friendlink');
        $allFriendlink= $FriendLink->where('status=1')->select();
        $this->assign('allFriendlink',$allFriendlink);
        $content['last'] = U('Home/Article/index?type=' . $content['type']);
        $this->assign('head_title',$content['title']);
        $this->assign('head_keywords',$content['keywords']);
        $this->assign('head_description',$Article->getdescription($content['article']));
    	$this->assign('content',$content);
        $this->assign('contentTypeUrl',U('Home/Article/index?type=' . $content['type']));
    	$this->display();
    }

    public function download(){
        $Article = new \Home\Model\ArticleModel();
        $content = $Article->getContentByType( 'download' , 8 , '' );
        //var_dump($content);
        $FriendLink   = M('friendlink');
        $allFriendlink= $FriendLink->where('status=1')->select();
        $this->assign('allFriendlink',$allFriendlink);
        $this->assign('head_title',"下载库");
        $this->assign('head_keywords',"下载库");
        $this->assign('head_description',"下载库");
        $this->assign('allFiles',$content['list']);
        $this->assign('pageTurn',$content['show']);
        $this->display();
    }

    public function weixin(){
        $Article = new \Home\Model\ArticleModel();
        $article = $Article->getArticleById(I('get.id'));
        $this->assign('article',$article);
        // var_dump($article);
        $allCss = array();
        $allCss[0] = 'weixin.css';
        $allJs  = array();
        $allJs[0] = 'weixin.js';
        $this->assign('head_title',$article['title']);
        $this->assign('head_keywords',$article['title']);
        $this->assign('head_description',$article['title']);
        $this->assign('allCss',$allCss);
        $this->assign('allJs',$allJs);
        $this->display('weixin');
    }

    public function getArticleJson(){
        $Article = new \Home\Model\ArticleModel();
        $dbArticle = M('article');
        if(I('get.id')){
            $result    = $dbArticle->where('id=' . I('get.id') . "&&status_0=1")->find();
            $result    = $Article->getStateCode($result);
            foreach ($result as $key => &$value) {
               $key  = urlencode($key);
               $value= urlencode($value);
            }
        }
        if(I('get.date')){
            $result  = $dbArticle->field('id,cover,title')->where("date='" . I('get.date') . "'&&status_0=1")->select();
            $result  = $Article->getStateCode($result);
            foreach ($result as $id => &$article) {
                foreach ($article as $key => &$value) {
                    $key  = urlencode($key);
                    $value= urlencode($value);
                }
            }
        }
        if(I('get.updata')){
            $result = $dbArticle->field('id,cover,title')->where("status_0=1")->order('id Desc')->limit(I('get.updata'))->select();
            $result = $Article->getStateCode($result);
            foreach ($result as $id => &$article) {
                foreach ($article as $key => &$value) {
                    $key  = urlencode($key);
                    $value= urlencode($value);
                }
            }
        }
        $result = json_encode($result);
        $result = urldecode($result);
        echo $result;
      //  return $result;

    }
}