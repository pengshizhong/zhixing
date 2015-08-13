<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        isLogined();
        $this->redirect('Admin/Home/home');
    }
   
}
