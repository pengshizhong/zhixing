<?php
namespace Admin\Model;
use Think\Model;
class UserModel extends Model{
	public function IsUser($user,$password){
		$Model  =  M('user');
		$result = $Model->where("user='" . $user . "'")->getField('password');
		if(!$result)
			return false;
		if(md5($password)===$result)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	public function getAllUser(){
		$Model  = M('user');
		$result = $Model->select();
		return $result;
	}

	public function modifyPassword($user){
		$Model  = M('user');
		$password    = md5(I('post.oldPassword'));
		$newPassword = md5(I('post.newPassword'));
		$oldPassword = $Model->where("user='" . $user . "'")->find();
		if(($oldPassword==$password)||isAdmin()){
			$Model->where("user='" . $user . "'")->setField('password',$newPassword);
			return true;
		}
		else{
			return false;
		}


	}

	public function addUser(){
		$Model = M('user');
		$password = md5(I('post.newPassword'));
		$data = array();
		$data['user'] = I('post.user');
		$data['password'] = $password;
		return $Model->add($data);
	}
	
	public function deleteUser(){
		$Model = M('user');
		$Model->where("user='" . I('get.user') . "'")->delete();
	}		
}
?>