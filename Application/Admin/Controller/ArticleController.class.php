<?php
namespace Admin\Controller;
use Think\Controller;
class ArticleController extends Controller {
    public function edit(){	
        isLogined();
    	$Type    = new \Admin\Model\TypeModel();
        $allType = $Type->getAllArticleType();
        $action  = U("Admin/Article/saveArticle");
    	if(I("get.id"))
    	{
    		$Article = new \Admin\Model\ArticleModel();
    		$article = $Article->getArticleById(I("get.id"));
            $action  = U("Admin/Article/changeArticleById?id=" . $article['id']);
    		$this->assign('article',$article);
    	}
        $allJs = array();
        $this->assign('head_title',"编辑文章");
        $this->assign('head_keywords',"编辑文章");
        $this->assign('head_description',"编辑文章");
        $this->assign('menu_edit',U("Admin/Article/edit"));
        $this->assign('menu_type',U("Admin/Article/type"));
        $this->assign('action',$action);
    	$this->assign('allType',$allType);
    	$this->display();
    }

    public function index(){
        isLogined();
    	$Type    	= new \Admin\Model\TypeModel();
    	$Article    = new \Admin\Model\ArticleModel();	
        $allType    = array();
        $allType['jobInfo']             = array();
        $allType['jobInfo']['name']     = "招聘信息";
        $allType['jobInfo']['child']    = $Type->getAllChild($allType['jobInfo']['name']);
        $allType['activity']            = array();
        $allType['activity']['name']    = "活动动态";
        $allType['activity']['child']   = $Type->getAllChild($allType['activity']['name']);
        $allType['ganhuo']              = array();
        $allType['ganhuo']['name']      = "知行干货";
        $allType['ganhuo']['child']     = array();
        $allType['ganhuo']['child']     = $Type->getAllChild($allType['ganhuo']['name']);
        foreach ($allType as &$value){
            foreach ($value['child'] as &$type) {
                if (isset($type['name'])) {
                   $type['url']  = U('Admin/Article/index?type=' . $type['name']);
                }
                unset($type); //双重循环需要这样,清除副本
                unset($value);
            }
        }
        // echo $allType['ganhuo']['child'][0]['name'];
        $type       = I("get.type")?I("get.type"):"未分类";
    	$allArticle = $Article->getContentByType("Article",10,"type='" . $type . "'");
    	$allArticle['list'] = $Article->changeStatus_0ToWord($allArticle['list']);
    	// $changeUrlPrefix  = "Admin/Article/edit?id=";
        //  $deleteUrlPrefix  = "Admin/Article/deleteArticleById?id=";
        //var_dump($allArticle['list']);
        foreach ($allArticle['list'] as &$value) {
            // if(!$value['cover']){
            //     $value['cover'] = 'images/system/default.gif';
            // }
            $value['deleteUrl'] = U('Admin/Article/deleteArticleById?id=' . $value['id']);
            $value['changeUrl'] = U('Admin/Article/edit?id=' . $value['id']);
        }
        $editButton = U('Admin/Article/edit');
        $this->assign('editButton',$editButton);
        $this->assign('head_title',"文章管理");
        $this->assign('head_keywords',"文章管理");
        $this->assign('head_description',"文章管理");
        $this->assign('type',$type);
        $this->assign('page',$page+1);
    	$this->assign('changeUrlPrefix',$changeUrlPrefix);
        $this->assign('deleteUrlPrefix',$deleteUrlPrefix);
        $this->assign('allType',$allType); 
    	$this->assign('allArticle',$allArticle['list']);
        $this->assign('pageTurn',$allArticle['show']);
        $this->assign('pageNum',$allArticle['pageNum']);
        $this->assign('menu_index',U("Admin/Article/index"));
        $this->assign('menu_type',U("Admin/Article/type"));
        $this->display();
    }

    public function type(){
        isLogined();
    	$Type    = new \Admin\Model\TypeModel();
        $Article = new \Admin\Model\ArticleModel();

    	if(I("get.changeType")&&I("get.changeType")!="未分类")
    	{    
    		$changeType = $Type->getOneType(I("get.changeType"));
    		$this->assign('changeType',$changeType);
    	}
    	if(I("get.deleteType"))
    	{      
            if($Type->canOperate()){
    		    $Type->deleteType(I("get.deleteType"));
            }


    	}
    	$allType   = $Type->getAllType();
        $allParent = $Type->getAllParent();
        foreach ($allType as &$type) {   
            $num = $Article->getArticleNumByType($type['name']);
            $type['articleNum'] = $num['count(*)'];
            $type['changeUrl']  = U('Admin/Article/type?changeType=' . $type['name']);
            $type['deleteUrl']  = U('Admin/Article/type?deleteType=' . $type['name']);
        }
        $action = U('Admin/Article/saveType');

        $this->assign('action',$action);
        $this->assign('head_title',"分类管理");
        $this->assign('head_keywords',"分类管理");
        $this->assign('head_description',"分类管理");
        $this->assign('allParent',$allParent);
        $this->assign('menu_index',U("Admin/Article/index"));
        $this->assign('menu_type',U("Admin/Article/type"));
    	$this->assign('allType',$allType);
    	$this->display();
    }

    
    public function saveArticle(){
        isLogined();
    	$Article = new \Admin\Model\ArticleModel();
        if(I('post.status_0')=="已发布"&&(!isAdmin())){
            $this->noAdmin();
        }
        $Article->addArticle();
       $this->redirect('edit','',0.1, '<script> alert("成功"); </script>');
    }
    
    public function saveType(){
        isLogined();
        $Type = new \Admin\Model\TypeModel();
        if(!$Type->canOperate()){
            return;
        }
        if (I("post.oldName")) {
            $Type->changeType(I("post.oldName"),I("post.name"),I("post.description"),I("post.parent"));
            $this->redirect('type','',0.1, '<script> alert("成功"); </script>');
            return;
        }
        $Type->addType(I("post.name"),I("post.description"),I("post.parent"));
        redirect('type', 0.1, '<script> alert("成功"); </script>');
    }

    public function changeArticleById(){
        isLogined();
        $Article = new \Admin\Model\ArticleModel();
        if($Article->canOperate()){
            $Article->changeArticleById();
            $this->redirect('index','',0.1, '<script> alert("成功"); </script>');
        }
    }

    public function deleteArticleById(){
        isLogined();
        $Article = new \Admin\Model\ArticleModel();
        if($Article->canOperate()){
            $Article->deleteArticleById(I("get.id"));
            $this->redirect('index','',0.1, '<script> alert("成功"); </script>');
        }
    }
	

}
