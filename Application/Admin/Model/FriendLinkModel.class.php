<?php
namespace Admin\Model;
use Think\Model;
class FriendLinkModel extends Model{
	public function insertSettings($settings){
		$Model = M('friendlink');
		$data  = array();
		$Model->where(1)->delete();
		foreach ($settings as $value) {
			if($value['status']=="启用"){
				$value['status']=1;
			}
			else{
				$value['status']=0;
			}
			$Model->add($value);
		}

		$Note  = new \Admin\Model\NoteModel();
		$title	 = '<a href="' . U('Admin/Home/friendLink') . '">' . 友情链接 . '</a>';
		$content = "修改了" . $title . "的设置";
		$Note->addNote($content);
		
	}

	public function getAllFriendLink(){
		$Model  = M('friendlink');
		$result = $Model->select();
		foreach ($result as  &$value) {
			if($value['status']==1){
				$value['status'] = "启用";
			}
			else{
				$value['status'] = "禁用";
			}
		}
		return $result;
	}
}
?>