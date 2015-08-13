<?php
namespace Home\Model;
use Think\Model;
class ArticleModel extends Model{


	public function getArticleById($id){
		$Model  = M();
		$result = $Model->query("SELECT * FROM " . C('DB_PREFIX') . "article "
								. "WHERE id=" . $id);
		$result[0]['article'] = $this->changeSymbol($result[0]['article']);
		return $result[0];
	}
	


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

	public function getTopTypeArticle($type,$pageContentNum,$where=''){
		$Model 	= M('article'); 
 		$zx     = C('DB_PREFIX');
		$join   = $zx . "type on " . $zx . "article.type=" . $zx . "type.name";
		$count  = $Model->join($join)->where("parent='" . $type . "'")->count();
		$Page   = new \Think\Page($count,$pageContentNum);
		$show   = $Page->show();
		$list   = $Model->field($zx . 'article.id,date,title,article,cover')->join($join)->where("parent='" . $type . "'")->order('id DESC')->limit($Page->firstRow.','.$Page->listRows)->select();
		// $query1   = "SELECT a.id,article,title,keywords,type,cover,date FROM " . C('DB_PREFIX') . "article as a inner JOIN " . C('DB_PREFIX') . "type as b on a.type=b.name"
		//             . " WHERE parent='" .$type 
		//             . "' order by id DESC"
		//             . " limit " . $Page->firstRow . "," . $Page->listRows;
		// var_dump($query1);
		// $list   = $Model->query($query1);
		$result = array( 	
						'show' => $show,
						'list' => $list,
						'pageNum' => $Page->totalPages,
							);
		return $result;
	} 
	public function getArticleByTypeInIndex($type,$num){
		$Model    = M();
		$Type 	  = new \Home\Model\TypeModel();
		$allChild = $Type->getAllChild($type);
		$query1   = "SELECT a.id,title,keywords,type,cover,date FROM " . C('DB_PREFIX') . "article as a inner JOIN " . C('DB_PREFIX') . "type as b on a.type=b.name"
		            . " WHERE parent='" .$type 
		            . "' order by id DESC"
		            . " limit " . $num;
		//var_dump($query1);
		$result   = $Model->query($query1);
		foreach ($result as &$value) {
			if(strlen($value['title'])>20){
                $value['title'] = mb_substr($value['title'],0,20,'utf-8')."...";
			}
			if(strlen($value['keywords']>15)){
				$value['keywords'] = mb_substr($value['keywords'],0,15,'utf-8');
			}
			$value['description'] = $this->getdescription($value['article']);
			$value['url'] 		  = U('Home/Article/article?id=' . $value['id']);
		}
		return $result;
	}

	public function getdescription($str,$wordNum = 20)
	{	

		//var_dump($str);
		//var_dump($zero);
		$str=str_replace('&amp;', '&', $str);

		$str=str_replace('&lt;','<', $str);
		
		$str=str_replace('&gt;', '>', $str);
		
		$str=str_replace('&nbsp;', ' ', $str);
		//var_dump($zero);
		$str = strip_tags($str);
		$str=mb_substr($str,0,$wordNum,'utf-8')."......";

		return $str;

	}

	public function changeSymbol($zero){
		$zero=str_replace('&amp;','&', $zero);
		$zero=str_replace('&lt;','<', $zero);
		$zero=str_replace('&gt;', '>', $zero);
		$zero=str_replace('&quot;', '"', $zero);
		//$zero=str_replace('&nbsp;', ' ', $zero);
		return $zero;
	}

	public function getStateCode($result){
		if(!$result){
	            $result = array();
	            if(is_null($result)){
	                $result['stateCode'] = 0;
	            }
	            else{
	                if(empty($result)){
	                    $result['stateCode'] = 1;
	                }
	            }
	        }
	    else{
            $result['stateCode'] = 2;
        }
	    return $result;
	}
}
?>