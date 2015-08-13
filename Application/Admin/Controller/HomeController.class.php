<?php
namespace Admin\Controller;
use Think\Controller;
class HomeController extends Controller {
    public function home(){	
        isLogined();
        $this->redirect('Admin/Home/note');
    }


    public function note(){
    	isLogined();
    	$Note     = new \Admin\Model\NoteModel();
    	$allNotes = $Note->getAllNote();
        if(session('userName')=='admin'){
            $this->assign('user',U('Admin/Home/user'));
        }
        else{
            $this->assign('user',U('Admin/Home/modifyPassword'));
        }
        $Article       = new \Admin\Model\ArticleModel();
        $result        = $Article->getContentByType('Note',10);
        $this->assign('head_title',"操作记录");
        $this->assign('head_keywords',"操作记录");
        $this->assign('head_description',"操作记录");
    	$this->assign('allNotes',$result['list']);
        $this->assign('pageTurn',$result['show']);
        $this->assign('note',U('Admin/Home/note'));
        $this->assign('friendLink',U('Admin/Home/friendLink'));
    	$this->display();
    }


    public function friendLink(){	
        isLogined();
        $FriendLink    = new \Admin\Model\FriendLinkModel();
        $allFriendLink = $FriendLink->getAllFriendLink();
        if(session('userName')=='admin'){
            $this->assign('user',U('Admin/Home/user'));
        }
        else{
            $this->assign('user',U('Admin/Home/modifyPassword'));
        }
        $this->assign('head_title',"友情链接管理");
        $this->assign('head_keywords',"友情链接管理");
        $this->assign('head_description',"友情链接管理");
        $this->assign('allFriendLink',$allFriendLink);
        $this->assign('note',U('Admin/Home/note'));
        $this->assign('friendLink',U('Admin/Home/friendLink'));
        $this->assign('action',U('Admin/Home/saveFriendLink'));
    	$this->display();
    }


    public function activity(){	
        isLogined();
        if(session('userName')=='admin'){
            $this->assign('user',U('Admin/Home/user'));
        }
        else{
            $this->assign('user',U('Admin/Home/modifyPassword'));
        }
        $this->assign('note',U('Admin/Home/note'));
        $this->assign('friendLink',U('Admin/Home/friendLink'));
    	$this->display();
    }

    public function user(){
        isLogined();
        $this->noAdmin();
        $User = new \Admin\Model\UserModel();
        if(session('userName')=='admin'){
            $this->assign('user',U('Admin/Home/user'));
        }
        else{
            $this->assign('user',U('Admin/Home/modifyPassword'));
        }
        $allUser = $User->getAllUser();
        foreach ($allUser as  &$value) {
            $value['modifyPassword'] = U('Admin/Home/modifyPassword?user=' . $value['user']);
            $value['deleteUser']     = U('Admin/Home/deleteUser?user=' . $value['user']);
        }
        $this->assign('head_title',"账号管理");
        $this->assign('head_keywords',"账号管理");
        $this->assign('head_description',"账号管理");
        $this->assign('addNewUser',U('Admin/Home/addNewUser'));
        $this->assign('allUser',$allUser);
        $this->assign('note',U('Admin/Home/note'));
        $this->assign('friendLink',U('Admin/Home/friendLink'));
        $this->display();
    }

    public function saveFriendLink(){
        isLogined();
        $this->noAdmin(true);
        $FriendLink = new \Admin\Model\FriendLinkModel();
        $settings   = str_replace("&quot;", '"', I('post.jsonSettings'));
        $settings   = json_decode($settings,true);
        $FriendLink->insertSettings($settings);
        $respon = "成功";
        $this->ajaxReturn($respon,'EVAL');
   }

   public function modifyPassword(){
        isLogined();
        if(session('userName')=='admin'){
            $this->assign('user',U('Admin/Home/user'));
        }
        else{
            $this->assign('user',U('Admin/Home/modifyPassword'));
        }
        if(isAdmin()&&I('get.user')){
            $this->assign('action',U('Admin/Home/saveNewPassword?user=' . I('get.user')));
        }
        else{
            $this->assign('action',U('Admin/Home/saveNewPassword'));
        }
        if(isAdmin()){
            $this->assign('isAdmin',true);
        }
        $this->assign('head_title',"修改密码");
        $this->assign('head_keywords',"修改密码");
        $this->assign('head_description',"修改密码");
        $this->assign('note',U('Admin/Home/note'));
        $this->assign('friendLink',U('Admin/Home/friendLink'));
        $this->display();
   }

   public function saveNewPassword(){
        isLogined();
        if(!session('userName')){
            $this->redirect('Home','',0.1, '<script> alert("未知错误"); </script>');
        }
        $User   = new \Admin\Model\UserModel();
        if(isAdmin()){
            $result = $User->modifyPassword(I('get.user'));
        }
        else{
            $result = $User->modifyPassword(session('userName'));
        }
        if($result){
            $this->redirect('Home/modifyPassword?user=' . I('get.user'),'',0.1, '<script> alert("成功"); </script>');
        }
        else{
            $this->redirect('Home/modifyPassword?user=' . I('get.user'),'',0.1, '<script> alert("输入的旧密码错误"); </script>');
        }
   }

   public function addNewUser(){
        $this->noAdmin();
        if(I('post.user')){
            $User   = new \Admin\Model\UserModel();
            if($User->addUser()){   
                $this->redirect('Home/user','',0.1, '<script> alert("成功"); </script>');
            }
            else{
                $this->redirect('Home/user','',0.1, '<script> alert("失败"); </script>');
            }
            return;
        }
        $this->assign('action',U('Admin/Home/addNewUser'));
        $this->assign('note',U('Admin/Home/note'));
        $this->assign('friendLink',U('Admin/Home/friendLink'));
        $this->display();
   }

   public function deleteUser(){
        isLogined();
        $this->noAdmin();
        $User   = new \Admin\Model\UserModel();
        $User->deleteUser();
        $this->redirect('Home/user','',0.1, '<script> alert("成功"); </script>');
   }

}
