<?php
return array(
	//'配置项'=>'配置值'
	'DEFAULT_COVER' => '/Public/images/system/default.gif',
	//AK 公钥
	'BCS_AK' => 'M88KLspLQnNq6VXTPMdYTbMA' ,
//SK 私钥
	'BCS_SK' => 'q6K8PVTFc2RhcQRWreYXb5NtVOGczhyZ' ,
//bucket name
	'BUCKET_NAME' => 'zhixing-images',
//superfile 每个object分片后缀
	'BCS_SUPERFILE_POSTFIX' => '_bcs_superfile_' ,
//sdk superfile分片大小 ，单位 B（字节）
    'BCS_SUPERFILE_SLICE_SIZE' => 1024 * 1024 ,
    //BCS图片前缀
    'BCS_URL_PREFIX' => 'http://bcs.duapp.com/zhixing-images',
);