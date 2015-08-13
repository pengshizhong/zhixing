<?php
namespace Home\Model;
use Think\Model;
class DownloadModel extends Model{
    public function getAllDownloadFile(){
    	$Model  = M();
    	$result = $Model->query("SELECT * FROM " . C('DB_PREFIX') . "download");
    	return $result;
    }
	
}
?>