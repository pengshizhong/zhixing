<?php
namespace Admin\Controller;
use Think\Controller;
class HeaderController extends Controller {
    public function header(){
    	isLogined();
    	$this->display();
    }
   
    

}