<?php
namespace Admin\Model;
use Think\Model;
/**
 * 对滑动图片的各种管理
 */
class SlideShowModel extends Model{
	public function saveSlideShow($image){
		$Model = M('slideshow');
		$data = array();
		$data['address'] = $image;
		$Model->add($data);
		$Note    = new \Admin\Model\NoteModel();
        $title   = '<a href="' . U('Admin/SlideShow/index') . '">' . "上传了新的下载滑动图片" . '</a>';
        $Note->addNote($title);
	}
	
	public function getAllImage(){
		$Model = M('slideshow');
		$result = $Model->order('id desc')->select();
		return $result;
	}

	public function changeSlideShowById($id){
		$Model 		   = M('slideshow');
		$Image 		   = new \Admin\Model\ImageModel();
		//$imageAddress  = $Image->uploadToBcs("slideShow","/slideshow/"); BAE
		$imageAddress  = $Image->upload('slideShow','./slideshow');
		if($imageAddress)
		{	
			$oldImage = $Model->where('id=' . $id)->find();
			//$Image->deleteImageBcs($oldImage['address']);  BAE
			$Image->deleteImageSae($oldImage['address']);
			$data = array();
			$data['address'] = $imageAddress;
			$data['url']     = I('post.url');
			$data['title']   = I('post.title');
			$Model->where('id=' . $id)->save($data);
		}
		else
		{
			$data = array();
			$data['url']     = I('post.url');
			$data['title']   = I('post.title');
			$Model->where('id=' . $id)->save($data);
		}
		$Note    = new \Admin\Model\NoteModel();
        $title   = '<a href="' . U('Admin/SlideShow/changeInfoById?id=' . $id) . '">' . I('post.title') . '</a>';
        $content = "修改了滑动图片：" . $title . "的信息";
        $Note->addNote($content);
	}

	public function getImageById($id){
		$Model  = M('slideshow');
		$result = $Model->where('id=' . $id)->find();
		return $result;
	}

	public function deleteImageById($id){
		$Model  = M('slideshow');
		$info = $Model->where('id=' . $id)->find();
		$Model->where('sort>' . $info['sort'])->setDec('sort'); // 降序		
		// $result = @unlink("Public/" . $sort[0]['address']); 不用BCS可以用这个
		$Image = new \Admin\Model\ImageModel();
	    // $Image->deleteImageBcs($sort[0]['address']);   BAE
	    $Image->deleteImageSae($info['address']);
		$Model->where('id=' . $id)->delete();
		$Note    = new \Admin\Model\NoteModel();
        $content = "删除了滑动图片：" . $info['title'] . ",id为" . $info['id'];
        $Note->addNote($content);
	}

	public function isUrlEmpty($id){
		$Model  = M('slideshow');
		$result = $Model->where('id=' . $id)->find();
		return $result['url'];
	}

	public function addToSlideShowById($id){
		$Model  = M('slideshow');
		$sort   = $Model->where('sort!=0')->getField('count(*)');
		$sort	= ++$sort;
		$Model->where('id=' . $id)->setField('sort',$sort);
		$info = $Model->where('id=' . $id)->getField('title');
		$Note    = new \Admin\Model\NoteModel();
        $title   = '<a href="' . U('Admin/SlideShow/changeInfoById?' . $id) . '">' . $info . '</a>';
        $content = $title . "被加入了滑动图";
        $Note->addNote($content);
	}

	public function removeFromSlideShowById($id){
		$Model  = M('slideshow');
		$sort   = $Model->where('id=' . $id)->getField('sort');
		$Model->where('sort>' . $sort)->setDec('sort');
		$Model->where('id=' . $id)->setField('sort',0);
		$info =$Model->where('id=' . $id)->getField('title');
		$Note    = new \Admin\Model\NoteModel();
        $title   = '<a href="' . U('Admin/SlideShow/changeInfoById?' . $id) . '">' . $info . '</a>';
        $content = $title . "被移出了滑动图";
        $Note->addNote($content);

	}

	public function getAllSlideShow(){
    	$Model  = M('slideshow');
		$result = $Model->where('sort!=0')->order('sort')->select();
		return $result;
    }

    public function saveJsonSettings($jsonSettings){
    	$Model  = M('slideshow');
    	$jsonSettings = str_replace("&quot;", '"', $jsonSettings);
        $jsonSettings = json_decode($jsonSettings,true);
    	foreach ($jsonSettings as $value) {
    		$Model->where('id=' . $value['id'])->setField('sort',$value['sort']);
    	}
		$Note    = new \Admin\Model\NoteModel();
        $title   = '<a href="' . U('Admin/SlideShow/changesort') . '">' . "修改了滑动图的设置" . '</a>';
        $Note->addNote($title);
    }

    public function hasReleased($id){
    	$Model  = M('slideshow');
    	$sort   = $Model->where('id=' . $id)->getField('sort');
    	//var_dump($sort);
    	if($sort!=0){
    		return true;
    	}
    	else{
    		return false;
    	}
    }
    public function canOperate($id){
    	if(isAdmin()){
    		return true;
    	}
    	else{
    		if(!$this->hasReleased($id)){
    			return true;
    		} 
    		else{
    			echo '<script> alert("权限不足"); history.back();</script>';
    		}

    	}
    }

  
}
?>