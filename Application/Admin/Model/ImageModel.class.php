<?php
namespace Admin\Model;
use Think\Model;
class ImageModel extends Model{
	/**
	 * 服务器允许上传文件的时候可以用这个函数
	 * @param  string $imageName 表单的file标签name属性
	 * @param  string $filePath  存储的文件夹，基于public的相对路径
	 * @param  array  $format 限制格式
	 * @return mixed 返回存储路径或者存储失败的布尔值
	 */
	public function upload($imageName,$filePath,$format=array('jpg', 'gif', 'png', 'jpeg'))
	{    
		$Upload = new \Think\Upload();
		//var_dump($Upload);
		$Upload->maxSize   = 3145728 ;
		$Upload->rootPath  = C('STORAGE');
		$Upload->exts      = $format;   
		$Upload->savePath  = $filePath; 
		//var_dump($Upload->savePath);
		//var_dump($Upload->rootPath);
		$info              = $Upload->uploadOne($_FILES[$imageName]);
		//var_dump($info['url']);
		if(!$info)
			return false;
		else
			return $info['url'];

	}

	public function deleteImageSae($url){
		$s = new \SaeStorage();//实例化一个sae的stroage原生类。
		$filename = str_replace(C('SAE_STORAGE_URL_PREFIX'),'',$url);
		$r=$s->delete(C('DELETE_STORAGE'), $filename); //调用删除方法删除文件。
	}

	/**
	 * [deleteImage description] 删除文章中的图片，不用云存储时可用
	 * @param  string $content 文章内容 
	 * @return void
	 */
	public function deleteImage($content){
		$pattern = "/&lt;img.*?src=&quot;(.*?)&quot;/"; 
		preg_match_all($pattern, $content,$matches);
		foreach ($matches[1] as $value) {
			$value = preg_replace("/\/.*?\/Public/", "Public", $value);
			@unlink($value);
		}
	}

	/**
	 * [uploadToBcs description]上传文件到百度云储存,详细的baidubcs类库可以查文档
	 * @param  string $imageName file标签的name属性
	 * @param  string $filePath 在bcs中的绝对路径，不含文件名
 	 * @param  array  $format  限制格式 
	 * @return mixed 错误返回或者完整文件URL
	 */
	public function uploadToBcs($imageName,$filePath,$format=array('jpg', 'gif', 'png', 'jpeg')){
		$file   = $_FILES[$imageName];
		if(!$file['name']){
			return;
		}
		import('Org.Bae.Bcs');
		import('Org.Bae.libs.requestcore.requestcore');
		import('Org.Bae.utils.mimetypes');
		$bucket = C('BUCKET_NAME'); //我已经在百度平台建好了这个bucket,就像创建目录一样
		$format = explode('.', $file['name']);
        $object = $filePath . md5(date('Y-M-d-h-i-s')) . '.' . $format[count($format)-1]; //保存到百度云的文件名
        $baiduBCS = new \BaiduBCS (C('BCS_AK'),C('BCS_SK')); //创建百度云存储对象
        $fileUpload = $file[ "tmp_name" ]; //已经上传到我服务器的文件路径
        $response = $baiduBCS->get_bucket_acl( $bucket ); //选择指定的bucket,就像切换数据库,切换目录,创建bucket可以看百度SDK里的例子
        if ($response->isOK ()) { // 切换bucket成功
                $response = $baiduBCS->create_object ( $bucket, $object, $fileUpload); //上传文件
                if (! $response->isOK ()) { //上传失败执行
                   // $this->stateInfo = $this->getStateInfo( "MOVE" );
                }
                return $this->fullName='http://bcs.duapp.com/'.C('BUCKET_NAME').$object;
            }else{
              //  $this->stateInfo = $this->getStateInfo( "MOVE" );
        }
	}

	/**
	 * [deleteImageBcs description]删除百度云储存的图片或者下载文件
	 * @param  string $imageName 文件URL
	 * @return void
	 */
	public function deleteImageBcs($imageName){
		import('Org.Bae.Bcs');
		import('Org.Bae.libs.requestcore.requestcore');
		import('Org.Bae.utils.mimetypes');
		$imageName = str_replace(C('BCS_URL_PREFIX'), '', $imageName);  //这里是替换掉了URL的前缀 只保留文件夹+文件名称
		$bucket = C('BUCKET_NAME'); //我已经在百度平台建好了这个bucket,就像创建目录一样
        $object = $imageName; //保存到百度云的文件名
        $baiduBCS = new \BaiduBCS (C('BCS_AK'),C('BCS_SK')); //创建百度云存储对象
        $response = $baiduBCS->get_bucket_acl( $bucket ); //选择指定的bucket,就像切换数据库,切换目录,创建bucket可以看百度SDK里的例子
        if ($response->isOK ()) { // 切换bucket成功
                $response = $baiduBCS->delete_object ( $bucket, $object); //上传文件
            }
	}
}
?>