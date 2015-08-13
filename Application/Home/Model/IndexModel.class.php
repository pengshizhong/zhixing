<?php
namespace Admin\Model;
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
	
	public function deleteType($name){
		if ($name=="未分类") {
			return;
		}
		$Model  = M();
		$Model->query("UPDATE " . C('DB_PREFIX') . "article SET " 
						. "type='未分类' "
						. "WHERE type='" . $name . "'");
		$Model->query("UPDATE " . C('DB_PREFIX') . "type SET "
						. "parent='" . "'"
						. " WHERE parent='" . $name . "'");
		// var_dump("UPDATE " . C('DB_PREFIX') . "type SET "
		// 				. "parent='" . "'"
		// 				. " WHERE name='" . $name . "'");
		$Model->query("DELETE FROM " . C('DB_PREFIX') . "type " 
						. "WHERE name='" . $name . "'");
	}

	public function changeType($oldName,$newName,$description,$parent){
		$Model  = M();
		$Model->query("UPDATE " . C('DB_PREFIX') . "type SET "
						. "name='" . $newName . "',"
						. "description='" . $description . "',"
						. "parent='" . $parent . "'"
						. " WHERE name='" . $oldName . "'"); 
	}

	
}
?>