<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
        if(I('get.url'))
        {
            $url = I('get.url');
            $this->assign("url",$url);
        }
        $action = U('Login/yanzheng');
        $this->assign('action',$action);
        $this->display();
    }
    public function yanzheng(){
    	  header('Content-Type: text/html; charset=utf-8');
        session('[start]');
        $user = new \Admin\Model\UserModel();
        if($user->IsUser(I('post.username'),I('post.password')))
        {
           $token = md5(date('d-h-i-s'));
           session('token',$token);
           cookie('token',$token);
           session('userName',I('post.username'));
           if (I("post.url")) 
           {
              $url = I('post.url');
              $url = urldecode($url);
              redirect($url);
           }
           else
           {
              $url = U('Admin/Home/home');
              redirect($url);
           }
           
        }
        else
        {
            echo "<script> alert('输入的账号密码不正确');";
            echo "history.back();</script>";
        }
 
        
    }

}