<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$Article 	  = new \Home\Model\ArticleModel();
    	$SlideShow 	  = new \Home\Model\SlideShowModel();
        $aricle       = array();
        $allCss       = array();
        $allCss[0]    = 'flexslider.css';
        $allJs        = array();
        $allJs[1]     = 'jquery.flexslider-min.js';
        $allJs[2]     = 'control.js';
    	$article['jobNews']      = $Article->getArticleByTypeInIndex('招聘信息',12);
    	$article['activityNews'] = $Article->getArticleByTypeInIndex('活动动态',6);
    	$article['infoNews'] 	 = $Article->getArticleByTypeInIndex('知行干货',7);
    	$slideImage   = $SlideShow->getAllSlideShow();
        $FriendLink   = M('friendlink');
        $allFriendlink= $FriendLink->where('status=1')->select();
        $this->assign('allFriendlink',$allFriendlink);
        $this->assign('head_title',"华南农业大学信息学院软件学院知行职业指导与服务中心");
        $this->assign('head_keywords',"华南农业大学信息学院软件学院知行职业指导与服务中心");
        $this->assign('head_description',"华南农业大学信息学院软件学院知行职业指导与服务中心");
    	$this->assign('more',U('Home/Article/index?type=知行干货'));
        $this->assign('activityMore',U('Home/Article/index?type=活动动态'));
        $this->assign('jobMore',U('Home/Article/index?type=招聘信息'));
    	$this->assign('jobNews',$article['jobNews']);
    	$this->assign('activityNews',$article['activityNews']);
    	$this->assign('infoNews',$article['infoNews']);
    	$this->assign('slideImage',$slideImage);
        $this->assign('allCss',$allCss);
        $this->assign('allJs',$allJs);
    	$this->display();
    }

    
}