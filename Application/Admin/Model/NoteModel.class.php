<?php
namespace Admin\Model;
use Think\Model;
/**
 * 生成操作记录
 */
class NoteModel extends Model{
	public function addNote($content){
		$Model = M('note');
		$Model->query("INSERT INTO " . C('DB_PREFIX') . "note SET "
			 		  . "auther='" . session('userName') . "',"
			 		  . "content='" . $content . "',"
			 		  . "date='" . date("Y-m-d") . "'");
		$data = array();
		$data['auther']  = session('userName');
		$data['content'] = $content;
		$data['date']    = date('Y-m-d'); 
		$Model->add($data);
	}

	public function getAllNote(){
		$Model  = M('note');
		$result = $Model->select();
		return $result;
	}
}
?>