<?php
namespace Home\Model;
use Think\Model;
class CommentModel extends Model{
	
	public function getCommentByStatus(){
		$Model = new \Admin\Model\ArticleModel();
		if(isset($_GET['status']))
		{
			$result = $Model->getContentByType('comment',25,'status=' . I('get.status'));
		}
		else
		{
			$result = $Model->getContentByType('comment',25);
		}
		foreach ($result['list'] as &$value) {
			if($value['status']==1)
			{
				$value['status'] = '已通过';
				$value['changeStatusUrl'] = U('Comment/changeStatus?value=0',array( 'id' => $value['id'] , 'status' => 0)); 
			}
			else
			{
				$value['status'] = '未通过';
				$value['changeStatusUrl'] = U('Comment/changeStatus',array( 'id' => $value['id'] , 'status' => 1)); 
			}
			$value['deleteUrl'] = U('Comment/deleteComment?id=' . $value['id']);
		}
		return $result;
	}

	public function changeStatus(){
		$Model = M();
		$Model->query('UPDATE ' . C('DB_PREFIX') . 'comment SET '
					  . 'status=' . I('get.status')
					  . ' WHERE id=' . I('get.id'));
	}

	public function deleteCommentById(){
		$Model = M();
		$Model->query('DELETE FROM ' . C('DB_PREFIX') . 'comment '
					  . ' WHERE id=' . I('get.id'));
		
	}
	}
?>