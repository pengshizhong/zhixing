<?php
namespace Home\Model;
use Think\Model;
class TypeModel extends Model{
	public function addType($name,$description,$parent){
		$Model = M();
		if($parent=="无")
		{
			$parent="";
		}
		$Model->query("INSERT INTO " . C('DB_PREFIX') . "type SET " 
						. "name='" . $name . "',"
						. "description='". $description. "',"
						. "parent='" . $parent . "'");
	}

	public function getAllType(){
		$Model  = M();
		$result = $Model->query("SELECT * FROM " . C('DB_PREFIX') . "type");
		return $result;
	}

	public function getOneType($name){
		$Model  = M();
		$result = $Model->query("SELECT * FROM " . C('DB_PREFIX') . "type " 
								. "WHERE name='" . $name . "'");
		return $result; 
	}
	

	public function getNavType($type){
		$Model  = M();
		$result = $Model->query("SELECT parent FROM " . C('DB_PREFIX') . "type"
								. " WHERE name='" . $type . "'");
		
		//var_dump($result);
		return $result[0]['parent'];
	}

	public function getAllChild($type){
		$Model  = M('type');
		$parent = $Model->field('parent')->where("name='" . $type . "'")->find();
		if (!$parent['parent']) {
			return null;
		}
		$result = $Model->query("SELECT name FROM " . C('DB_PREFIX') . "type "
								. "WHERE parent='" . $parent['parent'] . "'");
		foreach ($result as &$value) {
			$value['url'] = U('Home/Article/index?type=' . $value['name']);
		}
		return $result;
	}

	public function getSameType($type){
		$Type  =  M('type');
		$result = M('type')->where("parent='" . $type . "'")->select();
		foreach ($result as &$value) {
			$value['url'] = U('Home/Article/index?type=' . $value['name']);
		}
		return $result;
	}
	
}
?>