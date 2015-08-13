<?php
namespace Admin\Controller;
use Think\Controller;
class SlideShowController extends Controller {
    public function index(){	
        isLogined();
  		$SlideShow  = new \Admin\Model\SlideShowModel();
  		$allImage 	= $SlideShow->getAllImage();
        foreach ($allImage as &$value) {
           $value['changeUrl'] = U('Admin/SlideShow/changeInfoById?id=' . $value['id']);
           $value['deleteUrl'] = U('Admin/SlideShow/deleteInfoById?id=' . $value['id']);
           $value['addToSlideShowUrl'] = U('Admin/SlideShow/addToSlideShow?id=' . $value['id']);
           $value['removeFromSlideShowUrl'] = U('Admin/SlideShow/removeFromSlideShow?id=' . $value['id']);
        }
        $imageView    = U('Admin/SlideShow/index');
        $changeSort   = U('Admin/SlideShow/changeSort');
        $action       = U('Admin/SlideShow/saveImage');
        $downloadFile = U('Admin/SlideShow/downloadFile');

        $this->assign('downloadFile',$downloadFile);
        $this->assign('imageView',$imageView);
        $this->assign('changeSort',$changeSort);
        $this->assign('action',$action);
        $this->assign('head_title',"滑动图管理");
        $this->assign('head_keywords',"滑动图管理");
        $this->assign('head_description',"滑动图管理");
  		// $this->assign('changeInfoUrlPrefix',"Admin/SlideShow/changeInfoById?id=");
  		// $this->assign('deleteInfoUrlPrefix',"Admin/SlideShow/deleteInfoById?id=");
  		// $this->assign('addToSlideShowUrlPrefix',"Admin/SlideShow/addToSlideShow?id=");
  		// $this->assign('removeFromSlideShowUrlPrefix',"Admin/SlideShow/removeFromSlideShow?id=");
  		$this->assign('allImage',$allImage);
    	$this->display();
    }

    public function changeInfoById(){
        isLogined();
    	$SlideShow  = new \Admin\Model\SlideShowModel();

    	if(I('post.id'))
    	{	if($SlideShow->canOperate(I('post.id'))){
        		$SlideShow->changeSlideShowById(I('post.id'));
                $this->redirect('index','',0.1,'<script>alert("成功")</script>');
            }
    	}
    	else
    	{	
            $action = U('Admin/SlideShow/changeInfoById?id=' . I('get.id'));
            $this->assign('action',$action);
    		$image = $SlideShow->getImageById(I("get.id"));
    		$this->assign('image',$image);
    		$this->assign('id',I("get.id"));
    		$this->display();
    	}
    }

    public function changeSort(){
        isLogined();
    	$SlideShow    = new \Admin\Model\SlideShowModel();
    	$allSlideShow = $SlideShow->getAllSlideShow();
        $imageView    = U('Admin/SlideShow/index');
        $changeSort   = U('Admin/SlideShow/changeSort');
        foreach ($allSlideShow as &$value) {
            $value['removeUrl'] = U('Admin/SlideShow/removeFromSlideShow',array('id' => $value['id'],'jump' => 'changeSort'));
        }
        $downloadFile = U('Admin/SlideShow/downloadFile');

        $this->assign('downloadFile',$downloadFile);
        $this->assign('imageView',$imageView);
        $this->assign('changeSort',$changeSort);
        $this->assign('head_title',"滑动图顺序调整");
        $this->assign('head_keywords',"滑动图顺序调整");
        $this->assign('head_description',"滑动图顺序调整");
    	// $this->assign('removeFromSlideShowUrlPrefix',"Admin/SlideShow/removeFromSlideShow?id=");
    	// $this->assign('jumpToChangeSort',"&jump=changeSort");
    	$this->assign('allSlideShow',$allSlideShow);
    	$this->display();
    }

    public function downloadFile(){
    	$Download    	 = new \Admin\Model\DownloadModel();
        $Article         = new \Admin\Model\ArticleModel();
    	$imageView    	 = U('Admin/SlideShow/index');
        $changeSort      = U('Admin/SlideShow/changeSort');
        $downloadFile    = U('Admin/SlideShow/downloadFile');
        $action		     = U('Admin/SlideShow/saveDownloadFile');
        $allDownloadFile = $Article->getContentByType("download",10,'');
       	foreach ($allDownloadFile['list'] as &$value) {
       		$value['changeUrl'] = U('Admin/SlideShow/changeDownloadFileInfo?id=' . $value['id']);
       		$value['deleteUrl'] = U('Admin/SlideShow/deleteDownloadFile?id=' . $value['id']);
       	}

        $this->assign('head_title',"下载文件管理");
        $this->assign('head_keywords',"下载文件管理");
        $this->assign('head_description',"下载文件管理");
        $this->assign('allDownloadFile',$allDownloadFile['list']);
        $this->assign('pageTurn',$allDownloadFile['show']);
        $this->assign('action',$action);
        $this->assign('downloadFile',$downloadFile);
        $this->assign('imageView',$imageView);
        $this->assign('changeSort',$changeSort);
        $this->display();
    }
    public function saveImage(){
        isLogined();
    	$Image      = new \Admin\Model\ImageModel();
        $SlideShow  = new \Admin\Model\SlideShowModel();
		//$imageAddress  = $Image->uploadToBcs("slideShow","/slideshow/");   BAE
        $imageAddress  = $Image->upload("slideShow","/slideshow/");  //本地、SAE
        $SlideShow->saveSlideShow($imageAddress);
		if ($imageAddress ) {
		//	redirect('index', 0.1, '<script> alert("成功"); </script>');
             $this->redirect('index','',0.1,'<script>alert("成功")</script>');
		}
		else{
             $this->redirect('index','',0.1,'<script>alert("失败")</script>');
		//	redirect('index', 0.1, '<script> alert("未知错误"); </script>');
		}

    }

    public function deleteInfoById(){
        isLogined();
    	$SlideShow  = new \Admin\Model\SlideShowModel();
        if(!$SlideShow->canOperate(I('get.id'))){
            return;
        }
    	$SlideShow->deleteImageById(I("get.id"));
        $this->redirect('index','',0.1,'<script>alert("成功")</script>');
    //	redirect('index', 0.1, '<script> alert("成功"); </script>');
    }

    public function addToSlideShow(){
        isLogined();
    	$SlideShow  = new \Admin\Model\SlideShowModel();
    	if($SlideShow->isUrlEmpty(I('get.id')))
    	{  
            $this->noAdmin();
    		$SlideShow->addToSlideShowById(I("get.id"));
            $this->redirect('index','',0.1,'<script>alert("成功")</script>');
    		//redirect('index', 0.1, '<script> alert("成功"); </script>');
    	}
    	else
    	{  
            $this->redirect('changeInfoById?id=' . I('get.id'),'',0.1,'<script>alert("缺少必要的链接信息，请先补充完整后重试")</script>');
    		
    	}
    }

    public function removeFromSlideShow(){
        isLogined();
        $this->noAdmin();
    	$SlideShow  = new \Admin\Model\SlideShowModel();
    	$SlideShow->removeFromSlideShowById(I('get.id'));
    	if(I("get.jump"))
    	{
            $this->redirect(I('get.jump'),'',0.1,'<script>alert("成功")</script>');
    	//redirect(I('get.jump'), 0.1, '<script> alert("成功"); </script>');
    	}
    	else
    	{
            $this->redirect('index','',0.1,'<script>alert("成功")</script>');
    	//redirect('index', 0.1, '<script> alert("成功"); </script>');
    	}
    }

    public function saveSettings(){	
        isLogined();
        if(!isAdmin()){
            echo  "权限不足";
            return;
        }
        $SlideShow    = new \Admin\Model\SlideShowModel();
        $jsonSettings = I("post.jsonSettings");
        $SlideShow->saveJsonSettings($jsonSettings);
        echo "成功";
    }

    public function saveDownloadFile(){
    	isLogined();
        if(!isAdmin()){
            $this->redirect('downloadFile','',0.1,'<script>alert("权限不足")</script>');
        }
    	$Download   = new \Admin\Model\DownloadModel();
    	$Upload   = new \Admin\Model\ImageModel();
    	//$filePath = $Upload->uploadToBcs('downloadfile','/download/');
        $filePath = $Upload->upload('downloadfile','./download/');
    	if($filePath){
    		$Download->saveDownloadFilePath($filePath,$_FILES['downloadfile']['name']);
    		$this->redirect('downloadFile','',0.1,'<script>alert("成功")</script>');
    	}
    	else{
    		$this->redirect('downloadFile','',0.1,'<script>alert("未知错误")</script>');
    	}
    }

    public function deleteDownloadFile(){
    	isLogined();
        if(!isAdmin()){
            $this->redirect('downloadFile','',0.1,'<script>alert("权限不足")</script>');
        }
    	$Download   = new \Admin\Model\DownloadModel();
    	$Download->deleteDownloadFile(I('get.id'));
    	$this->redirect('downloadFile','',0.1,'<script>alert("成功")</script>');
    }

    public function changeDownloadFileInfo(){
    	isLogined();
        if(!isAdmin()){
            $this->redirect('downloadFile','',0.1,'<script>alert("权限不足")</script>');
        }
    	$Download   = new \Admin\Model\DownloadModel();
    	$Download->changeDownloadFileById( I('get.id') , I('post.name') );
    	$this->redirect('downloadFile','',0.1,'<script>alert("成功")</script>'); 
    }
}
