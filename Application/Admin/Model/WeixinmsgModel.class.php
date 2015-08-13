<?php
namespace Admin\Model;
use Think\Model;
/**
 * 因为中间出了一些奇怪的bug所以没有用框架给定的数据库读写函数进行开发
 */
class WeixinmsgModel extends Model{
	public function saveMsg($respon,$keyword,$fromUsername,$date){
        $MSG = M('weixinmsg');
        // $MSG->query("INSERT INTO " . C('DB_PREFIX') . "weixinmsg SET " 
        // 		    . " openid='" . $data['openid'] . "',"
        // 		    . " content='" . $data['content'] . "',"
        // 		    . " respon='" . $data['respon'] . "',"
        // 		    . "date='" . $data['date'] . "'");
        $data = array();
        $data['respon'] = $respon;
      	$data['content']= $keyword;
      	$data['openid'] = (string)$fromUsername;
      	$data['date']   = $date;
        $MSG->add($data);
     //   $MSG->where('id=' . $id)->setField('openid',$fromUsername);

    }
}
?>