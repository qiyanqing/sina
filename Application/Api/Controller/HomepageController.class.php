<?php
namespace Home\Controller;
use Think\Controller;
class HomepageController extends Controller {
    public function handlelogin(){
        $result = array();
        $user_id = $_POST['user_id'];
        $user_password = $_POST['user_password'];
        $re = M('user')->where(array('user_id'=>$user_id))->find();
        if (!isset($re)) {
        	$state = 1;  //账号不存在
        }else{
        	$pd=M('user')->where(array('user_id'=>$user_id))
        				 ->field('user_password')
        				 ->find();
        		if ($pd == $user_password) {
        				 	$state = 3;  //密码正确，可以登录
        				 }else{
        				 	$state = 2;  //密码不正确
        				 }
        }
        $result['status'] = $state;
        echo json_encode($result);
	}
}