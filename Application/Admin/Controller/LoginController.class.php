<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
    	
  //  var_dump( $test->where('id=1')->select());
    $this->display();
    }
    public function yanzheng(){
    	if(I('get.password')=='123456')
    	{
    		session_start();
    		
    	}
    }

}