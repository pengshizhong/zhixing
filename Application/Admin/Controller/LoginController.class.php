<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	
  //  var_dump( $test->where('id=1')->select());
    $this->display();
    }
    public function yanzheng(){
        session_start();
        if($_COOKIE['token']==$_SESSION['token'])
            echo "两个token相同";
        echo $_COOKIE['token'];
            echo $_SESSION['token'];
    
    		
    		// $token=md5(date("Y m d h i s"));
      //       $_SESSION['token']=$token;
      //       setcookie('token',$token);
    	
    }

}