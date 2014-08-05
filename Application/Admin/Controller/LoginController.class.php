<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	session('[start]');
        //$ctoken=cookie('token');
if(cookie('token')&&cookie('token')==session('token')){
    echo "已登录的账号";
}
else {
    echo "不存在的token";
    $this->display();
}
        $this->display();
    }
    public function yanzheng(){
        $user=M('User');
        $username=I('post.username');
        //echo $username;
        $userid=$user->where("userid='".$username."'")->select();
        if(!$userid)
            echo "不存在的账户";

        var_dump($userid);
        echo $userid;
        session('[start]');
        $token=md5(date("Y m d h i s"));
        session('token',$token);
        cookie('token',$token,3600);
    }
    		
       // $token=md5(date("Y m d h i s"));
       //       $_SESSION['token']=$token;
      //       setcookie('token',$token);
    	
    }

