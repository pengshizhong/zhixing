<?php
namespace Home\Controller;
use Think\Controller;
class AboutController extends Controller {
   
    public function index(){
        $allJs[0]  = 'jquery.fullPage.min.js';
        $allJs[1]  = 'jquery-ui-1.10.3.min.js';
        $allJs[2]  = 'about.js';
        $allCss[0] = 'jquery.fullPage.css';
        $this->assign('allFriendlink',$allFriendlink);
        $this->assign('head_title',"华南农业大学信息学院软件学院知行职业指导与服务中心");
        $this->assign('head_keywords',"华南农业大学信息学院软件学院知行职业指导与服务中心");
        $this->assign('head_description',"华南农业大学信息学院软件学院知行职业指导与服务中心");
        $this->assign('allCss',$allCss);
        $this->assign('allJs',$allJs);
        $this->display();
    }
	

}
