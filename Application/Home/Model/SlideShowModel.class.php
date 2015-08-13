<?php
namespace Home\Model;
use Think\Model;
class SlideShowModel extends Model{	
	public function getAllImage(){
		$Model = M();
		$result= $Model->query("SELECT * FROM " . C('DB_PREFIX') . "slideshow "
								. "ORDER BY id DESC");
		return $result;
	}



	public function getImageById($id){
		$Model  = M();
		$result	= $Model->query("SELECT * FROM " . C('DB_PREFIX') . "slideshow "
								. "WHERE id=" . $id);
		return $result[0];
	}



	public function getAllSlideShow(){
    	$Model  = M();
		$result = $Model->query("SELECT * FROM " . C('DB_PREFIX') . "slideshow "
								. "WHERE sort!=0 "
								. "ORDER BY sort");
		return $result;
    }


}
?>