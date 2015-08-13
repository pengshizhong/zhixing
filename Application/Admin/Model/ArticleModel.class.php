<?php
namespace Admin\Model;
use Think\Model;
class ArticleModel extends Model{
		/**
		 * @version  1.0
		 * @author   psz
		 * 增加新文章    
		 */
	public function addArticle(){
		$Model  = M('article');
		$Image  = new \Admin\Model\ImageModel();
		$Note  = new \Admin\Model\NoteModel();
		//$cover = $Image->uploadToBcs('cover',"/cover/");
		$cover  = $Image->upload("cover","./cover/"); //这是SAE 本地也可以
		if(!$cover)
		{
			$cover = C('DEFAULT_COVER');
		}
		if(I("post.status_0")=="待审核")
			$status_0=0;
		else
			$status_0=1;
		$data = array();
		$data['title'] = I("post.title");
		$data['keywords'] = I("post.keywords");
		$data['type'] =I("post.type");
		$data['article'] = I("post.article");
		$data['status_0'] = $status_0; 
		$data['cover'] = $cover;
		$data['date'] = date("Y-m-d");
		$id = $Model->add($data);
		$title	 = '<a href="' . $this->getUrlById($id) . '">' . I('post.title') . '</a>';
		$content = "新增标题为" . $title . "的文章";
		$Note->addNote($content);
	}

	// public function getArticleByType($type, $page){
	// 	$Model  = M();
	// 	$result = $Model->query("SELECT * FROM " . C('DB_PREFIX') . "article "
	// 							. "WHERE type='" . $type . "'"
	// 							. " ORDER BY id DESC "
	// 							. "limit " . $page*10 . ",10 ");
	// 	foreach ($result as &$value) {
 //    		if($value['status_0']==1)
 //    			$value['status_0'] = "已发布";
 //    		else
 //    			$value['status_0'] = "待审核";
 //    	}
	// 	return $result;
	// }

	public function getArticleById($id){
		$Model  = M('article');
		$result = $Model->where('id=' . $id)->find();
		return $result;
	}
	
	public function changeArticleById(){
		$Model  = M('article');
		$Image  = new \Admin\Model\ImageModel();
		$cover  = $Image->upload("cover","./cover/"); //这是SAE 本地也可以
		if(I("post.status_0")=="待审核")
			$status_0=0;
		else
			$status_0=1;
		if(!$cover)
		{
			// $Model->query("UPDATE " . C('DB_PREFIX') . "article SET " 
			// 				. "title='" . I("post.title") ."',"
			// 				. "keywords='" . I("post.keywords") . "',"
			// 				. "type='" . I("post.type") . "',"
			// 				. "article='" . I("post.article") . "',"
			// 				. "status_0='" . $status_0 . "'"
			// 				. " WHERE id=" . I("get.id"));
			$data = array();
			$data['title'] = I("post.title");
			$data['keywords'] = I("post.keywords");
			$data['type'] = I("post.type");
			$data['article'] = I("post.article");
			$data['status_0'] = $status_0;
			$Model->where('id=' . I('get.id'))->save($data);
		}
		else
		{	
			// $oldCover = $Model->query("SELECT cover FROM " . C('DB_PREFIX') . "article "
			// 					. "WHERE id=" . I('get.id') );
			$oldCover = $Model->where('id=' . I('get.id'))->getField('cover');
			if($oldCover!=C('DEFAULT_COVER')){
				// @unlink("Public/" . $oldCover[0]['cover']);  不用BAE的时候用这个
				// $Image->deleteImageBcs($oldCover[0]['cover']); 这是bae的
				$Image->deleteImageSae($oldCover);
				//var_dump($oldCover);
			}
			$data = array();
			$data['title'] = I("post.title");
			$data['keywords'] = I("post.keywords");
			$date['type'] = I("post.type");
			$data['article'] = I("post.article");
			$data['status_0'] = $status_0;
			$data['cover'] = $cover;
			$Model->where('id=' . I('get.id'))->save($data);
		}
		$Note  = new \Admin\Model\NoteModel();
		$title	 = '<a href="' . $this->getUrlById(I('get.id')) . '">' . I('post.title') . '</a>';
		$content = "修改了标题为" . $title . "的文章";
		$Note->addNote($content);
	}

	public function deleteArticleById($id){
		$Model  = M('article');
		$Image  = new \Admin\Model\ImageModel();
		$result = $Model->query("SELECT cover,article,title FROM " . C('DB_PREFIX') . "article "
								. "WHERE id=" . $id );
		if($result[0]['cover']!=C('DEFAULT_COVER')){
			//$Image->deleteImageBcs($result[0]['cover']); BAE
			$Image->deleteImageSae($result[0]['cover']);  //SAE
		}
		$pattern = "/&lt;img.*?src=&quot;(.*?)&quot;/"; 
		preg_match_all($pattern, $result[0]['article'],$matches);
		foreach ($matches[1] as $value) {
			// $value = preg_replace("/\/.*?\/Public/", "Public", $value);
			// @unlink($value);  本地可以这个
			// $Image->deleteImageBcs($value);  BAE这个
			$Image->deleteImageSae($value);
		}
		$Model->where('id=' . $id)->delete(); 
		$Note  = new \Admin\Model\NoteModel();
		$content = "删除了标题为" . $result[0]['title'] . "的文章";
		$Note->addNote($content);
	}

	public function getArticleNumByType($type){
		$Model  = M('article');
		// $result = $Model->query("SELECT count(*) FROM " . C('DB_PREFIX') . "article "
		// 						. " WHERE type='" . $type . "'");
		$result = $Model->where("type='" . $type . "'")->getField('count(*)');
		return $result;
	}

	public function getPageNumByType($type){
		$Article 	= new \Admin\Model\ArticleModel();
		$articleNum = $Article->getArticleNumByType($type);
		if($articleNum['count(*)%10']==0)
		{
			return $articleNum['count(*)']/10;
		}
		else
		{
			return $articleNum['count(*)']/10+1;
		}

	}



	/**
	 * 用于获取分页的数据信息
	 * @version  1.0
	 * @author   psz
	 * @param string $tableName 数据表名
	 * @param int $pageContentNum 第几页
	 * @param string $where     内容筛选条件   
	 */
	public function getContentByType($tableName,$pageContentNum,$where=''){
		$Model 		= M($tableName); 
		$count      = $Model->where($where)->count();
		//$pageNum 	= $count%10==0?sprintf("%d",($count/10)):sprintf("%d",$count/10+1);
		$Page       = new \Think\Page($count,$pageContentNum);
		$show       = $Page->show();
		$list = $Model->where($where)->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		$result 	= array( 	
						'show' => $show,
						'list' => $list,
						'pageNum' => $Page->totalPages,
							);
		return $result;
	}

	public function changeStatus_0ToWord($articles){
		foreach ($articles as  &$value) {
			if($value['status_0'] == 0)
			{
				$value['status_0'] = "待审核";
			}
			else
			{
				$value['status_0'] = "已发布";
			}
		}
		return $articles;
	}
	
	/**
	 * 判断是否发布
	 * @version  1.0
	 * @author   psz
	 * @return  boolean
	 */
	public function isRelease(){
		$Model 		= M($tableName); 
		$articleStatue = $Model->query("SELECT status_0 FROM " . C('DB_PREFIX') . "article "
										. "WHERE id=" . I('get.id') );
		if($articleStatue['0']['status_0']==1){
			return true;
		}
		else{
			return false;
		}
	}


	/**
	 * 根据keyword和关键字搜索文章
	 * @version  1.0
	 * @author   psz
	 * @param string $keyword 关键词
	 * @return mixed 
	 */
	public function getSearchArticle($keyword){
		$Model = M('article');
		$result = $Model->query("select id,title from zx_article 
								 where (keywords like '%" . $keyword ."%'
								 ||title like '%" . $keyword ."%')&&status_0=1");
		
		return $result;

	}


	/**
	 * 判断此文章是否可以操作依据是是否是管理员，或者文章未处于发布状态
	 * @version  1.0
	 * @author   psz    
	 */
	public function canOperate(){
        if(I('post.status_0')=='已发布'&&isAdmin()){
            return true;
        }
        else{
            if((!$this->isRelease()&&I('post.status_0')!='已发布')||isAdmin()){
                return true;
            }
            else{
            	header('Content-Type: text/html; charset=utf-8');
                echo '<script> alert("权限不足"); history.back();</script>';
            }
        }
    }

    public function getUrlById($id){
    	return U('Admin/Article/edit?id=' . $id);
    }

    /**
     * 用于获取限定正文字数的文章简介,并转换html格式
     * @version  1.0
     * @author   psz    
     * @param  string $str 文章正文
     * @param  num  $wordNum 限定字数 
     */
    public function getdescription($str,$wordNum = 20){	
		$zero=str_replace('&lt;','<', $str);
	//	var_dump($zero);
		$zero=str_replace('&gt;', '>', $zero);
		$zero=str_replace('&amp;', '&', $zero);
		$zero=str_replace('&nbsp;', ' ', $zero);
	//	var_dump($zero);
		$first=preg_replace("/<img.*?>/","", $zero);
		$second=preg_replace("/<p.*?>/", "", $first);
		$third=preg_replace('/<\/p>/', "", $second);
		$third=str_replace("</a>", "", $third);
		$third=preg_replace("/<a.*?>/", "", $third);
		$third=mb_substr($third,0,$wordNum,'utf-8')."......";
		$third=str_replace("<br/>", "", $third);
		$third=str_replace("<br/", "", $third);
		//$third=str_replace("<br>", "", $third);
		$third=str_replace("<br", "", $third);
		$third=str_replace("<b", "", $third);
		$third=str_replace("<", "", $third);
		return $third;

	}
}
?>