<?php
namespace Admin\Controller;
use Think\Controller;
class WeiXinController extends Controller {
    public function index(){
    	isLogined();
    	$specialRespon = M('wxspecialrespon');
    	$allRespon     = $specialRespon->select();
    	foreach ($allRespon as &$value) {
    		$value['action'] = U('WeiXin/saveSpecialRespon?id=' . $value['id']);
    	}
    	$this->assign('allRespon',$allRespon);
        $this->assign('head_title',"特殊回复");
        $this->assign('head_keywords',"特殊回复");
        $this->assign('head_description',"特殊回复");
    	$this->assign('special',U('WeiXin/index'));
    	$this->assign('checkMessage',U('WeiXin/checkMessage'));
    	$this->assign('autoRespon',U('WeiXin/autoRespon'));
    	$this->assign('list',$list);
    	$this->assign('pageTurn',$pageTurn);
    	$this->assign('pageNum',$pageNum);
      	$this->display();
    }


    public function checkToken(){
        $WeiXin = new \Admin\Model\WeiXinModel();
       // $WeiXin->valid(); //没有拼接口的话就去掉注释
       $WeiXin->responseMsg();
       
    }

    public function menu(){
    	$this->assign('head_title',"菜单修改");
        $this->assign('head_keywords',"菜单修改");
        $this->assign('head_description',"菜单修改");
    	$this->assign('special',U('WeiXin/index'));
    	$this->assign('checkMessage',U('WeiXin/checkMessage'));
    	$this->assign('autoRespon',U('WeiXin/autoRespon'));
    	$this->display();
    }

    public function autoRespon(){
        isLogined();
        $Respon    = new \Admin\Model\ResponModel();
        $allRespon = $Respon->getRespon();
        foreach ($allRespon as &$respon) {
            $respon['change'] = U('WeiXin/changeRespon?id=' . $respon['id']);
            $respon['delete'] = U('WeiXin/deleteRespon?id=' . $respon['id']);
        }
        $this->assign('allRespon',$allRespon); 
    	$this->assign('head_title',"自动回复");
        $this->assign('head_keywords',"自动回复");
        $this->assign('head_description',"自动回复");
    	$this->assign('special',U('WeiXin/index'));
    	$this->assign('checkMessage',U('WeiXin/checkMessage'));
    	$this->assign('autoRespon',U('WeiXin/autoRespon'));
        $this->assign('action',U('WeiXin/saveRespon'));
    	$this->display();
    }

    public function checkMessage(){
        isLogined();
    	$Openid = M('weixinuser');
    	$allOpenId = $Openid->select();
    	foreach ($allOpenId as &$value) {
    		$value['url'] = U('WeiXin/checkMessage?openid=' . $value['openid']);
    	}
    	if(I('get.openid')){
    		$weixinMsg = M('weixinmsg');
    		$allMsg = $weixinMsg->where('openid="' . I('get.openid') . '"')->order('id desc')->select();
    		$this->assign('allMsg',$allMsg);
    	}
    	$this->assign('allOpenId',$allOpenId);
    	$this->assign('head_title',"消息记录");
        $this->assign('head_keywords',"消息记录");
        $this->assign('head_description',"消息记录");
    	$this->assign('special',U('WeiXin/index'));
    	$this->assign('checkMessage',U('WeiXin/checkMessage'));
    	$this->assign('autoRespon',U('WeiXin/autoRespon'));
    	$this->display();
    }

    public function saveRespon(){
        isLogined();
        $Respon = new \Admin\Model\ResponModel();
        if(!$Respon->saveRespon()){
        	$this->redirect('autoRespon','',0.1, '<script> alert("关键字已存在"); </script>');
        }
        $this->redirect('autoRespon','',0.1, '<script> alert("成功"); </script>');
    }

    public function changeRespon(){
        isLogined();
        $respon = new \Admin\Model\ResponModel();
        if(I('post.id')){
            $respon->changeRespon(I('post.id'));
            $this->redirect('autoRespon','',0.1, '<script> alert("成功"); </script>');
        }
        else{
            $result = $respon->getRespon(I('get.id'));
           // $result['content'] = $respon->changeSymbol($result['content']);
            $this->assign('respon',$result);
            $this->assign('action',U('WeiXin/changeRespon'));
            $this->assign('head_title',"修改自动回复");
	        $this->assign('head_keywords',"修改自动回复");
	        $this->assign('head_description',"修改自动回复");
	    	$this->assign('special',U('WeiXin/index'));
	    	$this->assign('checkMessage',U('WeiXin/checkMessage'));
	    	$this->assign('autoRespon',U('WeiXin/autoRespon'));
	    	if($result['type']=='news'){
            	$this->display();
        	}
        	else{
        		$this->display('changeResponText');
        	}
        }

   }

   public function deleteRespon(){
        isLogined();
        $respon = new \Admin\Model\ResponModel();
        $respon->deleteRespon(I('get.id'));
        $this->redirect('autoRespon','',0.1, '<script> alert("成功"); </script>');
   }

   public function saveSpecialRespon(){
   		isLogined();
   		$specialRespon = M('wxspecialrespon');
   		$data = array();
   		$data['content'] = I('post.content');
   		$specialRespon->where('id=' . I('get.id'))->save($data);
   		$Note   = new \Admin\Model\NoteModel();
		$url= U('WeiXin/index');
		$content = '修改了<a href="' . $url . '">' . I('post.name') . '</a>的特殊回复';
		$Note->addNote($content);
   		$this->redirect('index','',0.1, '<script> alert("成功"); </script>');
   }
}
