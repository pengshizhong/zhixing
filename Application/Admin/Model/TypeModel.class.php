<?php
namespace Admin\Model;
use Think\Model;
/**
 * 这个是对文章分类的一些增删查改
 */
class TypeModel extends Model{
	public function addType($name,$description,$parent){
		$Model = M('type');
		if($parent=="无")
		{
			$parent="";
		}
		$data = array();
		$data['name'] = $name;
		$data['description'] = $description;
		$data['parent'] = $parent; 
		$Model->add($data);
	}

	public function getAllType(){
		$Model  = M('type');
		$result = $Model->select();
		return $result;
	}

	public function getOneType($name){
		$Model  = M('type');
		$result = $Model->where("name='" . $name . "'")->find();
		return $result; 
	}
	
	public function deleteType($name){
		if ($name=="未分类") {
			return;
		}
		$Article  = M('article');
		$Type     = M('type');
		$Article->where("type='" . $name . "'")->setField('type',"未分类");
		$Type->where("name='" . $name . "'")->delete();
	}

	public function changeType($oldName,$newName,$description,$parent){
		$Model  = M('type');
		$data = array();
		$data['name'] = $newName;
		$data['description'] = $description;
		$data['parent'] = $parent;
		$Model->where("name='" . $oldName . "'")->save($data);
	}

	public function getAllParent(){
		$result = array("活动动态","知行干货","招聘信息");
		return $result;
	}

	public function getAllArticleType(){
		$Model     = M('type');
		$result =$Model->where("parent!=''")->getField('name',true);
		return $result;
	}

	public function getAllChild($parent){
		$Model     = M('type');
		$result = $Model->where("parent='" . $parent . "'")->select(); 
		return $result;
	}

	public function canOperate(){
		if(isAdmin()){
			return true;
		}
		else{
			header('Content-Type: text/html; charset=utf-8');
			echo '<script> alert("权限不足"); history.back();</script>';
		}
	}
}
?>