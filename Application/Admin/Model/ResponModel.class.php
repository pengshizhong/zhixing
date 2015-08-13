<?php
namespace Admin\Model;
use Think\Model;
/**
 * 对微信自动回复的各种增删查改
 */
class ResponModel extends Model{
	public function saveRespon(){
		$respon = M('respon');
		$allrespon = $respon->select();
		$keyword = I('post.keyword');
		foreach ($allrespon as $value) {
			if($value['keyword'] == $keyword){
				return false;
			}
		}
		$data 	= array();
		if(I('post.type'=='news')){
		$Image  = new \Admin\Model\ImageModel();
		$cover  = $Image->uploadToBcs("cover","/weixin-cover/");
		$data['url']   = I('post.url');
		$data['title'] = I('post.title'); 
		}

		if($cover){
			$data['cover'] = $cover;
		}
		else{
			$data['cover'] = C('DEFAULT_COVER');
		}
		$data['keyword'] = I('post.keyword');
		$data['content'] = I('post.content');
		$data['type']	 = I('post.type');
		$data['date']	 = date("Y-m-d");
		$Note   = new \Admin\Model\NoteModel();
		$id = $respon->add($data);
		$url= U('WeiXin/changeRespon?id=' . $id);
		$content = '新增关键字为<a href="' . $url . '">' . $data['keyword'] . '</a>的自动回复';
		$Note->addNote($content);
		return true;
	}

	public function getRespon($id=''){
		$respon = M('respon');
		if(!$id){
			return $respon->select();
		}
		else{
			$result = $respon->where("id=" . $id)->select();
			return $result[0];
		}
	}

	public function changeRespon($id){
		$respon = M('respon');
		$data   = array();
		$result = $respon->where("id=" . $id)->select();
		$Image  = new \Admin\Model\ImageModel();
		$cover  = $Image->uploadToBcs("cover","/weixin-cover/");
		if($cover){
			// @unlink("Public/" . $result[0]['cover']);
			$Image->deleteImageBcs($result[0]['cover']);
			$data['cover'] = $cover;
		}
		if($result[0]['type'] == 'news'){
			$data['title'] = I('post.title');
			$data['url']   = I('post.url');
		}
		$data['id'] 	 = $id;
		$data['keyword'] = I('post.keyword');
		$data['content'] = I('post.content');
		$respon->save($data);
		$Note   = new \Admin\Model\NoteModel();
		$url= U('WeiXin/changeRespon?id=' . $id);
		$content = '修改了关键字为<a href="' . $url . '">' . $data['keyword'] . '</a>的自动回复';
		$Note->addNote($content);
	}

	public function changeSymbol($zero){
		$zero=str_replace('&amp;','&', $zero);
		$zero=str_replace('&lt;','<', $zero);
		$zero=str_replace('&gt;', '>', $zero);
		$zero=str_replace('&quot;', '"', $zero);
		$zero=str_replace('&nbsp;', ' ', $zero);
		return $zero;
	}

	public function deleteRespon($id){
		$respon = M('respon');
		$result = $respon->where("id=" . $id)->find();
		// @unlink("Public/" . $result[0]['cover']);
		$Image  = new \Admin\Model\ImageModel();
		// $Image->deleteImage($result[0]['content']);
		$Image->deleteImageBcs($result['cover']);
		$respon->where("id=" . $id)->delete();
		$Note   = new \Admin\Model\NoteModel();
		$content = '删除了关键字为' . $result[0]['keyword'] . '</a>的自动回复';
		$Note->addNote($content);
	}
}
?>