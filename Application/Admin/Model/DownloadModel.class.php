<?php
namespace Admin\Model;
use Think\Model;
class DownloadModel extends Model{
      /**
       * 用于存储下载文件的路径和名字，上传下载文件的动作在控制器中完成了
       * @version  1.0
       * @author   psz   
       * @param string $path 文件路径，应该是个URL
       * @param string $name 名称 
       */
	  public function saveDownloadFilePath($path,$name){
    	$Model  = M('download');
        $data = array();
        $data['path'] = $path;
        $data['name'] = $name;
        $data['date'] = date('Y-m-d');
        $Model->add($data);
        $Note  = new \Admin\Model\NoteModel();
        $title   = '<a href="' . U('Admin/SlideShow/downloadFile') . '">' . $name . '</a>';
        $content = "上传了新的下载文件" . $title;
        $Note->addNote($content);
    }

    public function getAllDownloadFile(){
    	$Model  = M('download');
    	$result = $Model->select();
    	return $result;
    }

    public function deleteDownloadFile($id){
    	$Model  = M('download');
        $result = $Model->where('id=' . $id)->getField('path');
        $upload = new \Admin\Model\ImageModel();
        $upload->deleteImageSae($result);
    	$Model->query("DELETE FROM " . C('DB_PREFIX') . "download "
    				  . "WHERE id=" . $id);
        $Model->where('id=' . $id)->delete();
        $Note  = new \Admin\Model\NoteModel();
        $content = "删除了下载文件：" . $result;
        $Note->addNote($content);
    }
    /**
     * 主要用来改变显示在外面的那个名字
     * @version  1.0
     * @author   psz 
     * @param num $id  数据库中的id
     * @param string $name 名字
     */
    public function changeDownloadFileById($id,$name){
    	$Model  = M('download');
        $result = $Model->where('id=' . $id)->getField('name');
        $data  = array();
        $data['name'] = $name;
        $Model->where('id=' . $id)->save($data); 
        $Note  = new \Admin\Model\NoteModel();
        $title   = $result . '为<a href="' . U('Admin/SlideShow/downloadFile') . '">' . $name . '</a>';
        $content = "修改了下载文件" . $title;
        $Note->addNote($content);
    }
	
}
?>