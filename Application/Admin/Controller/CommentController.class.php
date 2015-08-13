<?php
namespace Admin\Controller;
use Think\Controller;
class CommentController extends Controller {
    public function index(){
    	isLogined();
    	$Comment = new \Admin\Model\CommentModel();
    	$content = $Comment->getCommentByStatus();
    	$list 	 = $content['list'];
    	$pageTurn= $content['show'];
    	$pageNum = $content['pageNum'];

    	$this->assign('allComment',U('Comment/index'));
    	$this->assign('waitingAuditComment',U('Comment/index?status=0'));
    	$this->assign('passedComment',U('Comment/index?status=1'));
    	$this->assign('list',$list);
    	$this->assign('pageTurn',$pageTurn);
    	$this->assign('pageNum',$pageNum);
      	$this->display();
    }

    public function changeStatus(){
    	$Comment = new \Admin\Model\CommentModel();
    	$Comment->changeStatus();
    	if(I('get.status')==1)
    	{
    		$this->redirect('index?status=0','',0.1, '<script> alert("成功"); </script>');
    	}
    	else
    	{
    		$this->redirect('index?status=1','',0.1, '<script> alert("成功"); </script>');
    	}
    }

    public function deleteComment(){
		$Comment = new \Admin\Model\CommentModel();
    	$Comment->deleteCommentById();
    	$this->redirect('index','',0.1, '<script> alert("成功"); </script>');
    } 
}