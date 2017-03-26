<?php
namespace Api\Controller;
use Think\Controller;
class HomepageController extends Controller {
    public function handlelogin(){
        $result = array();
        $user_login = $_POST['user_id'];
        $user_password = $_POST['user_password'];
        $re = M('user')->where(array('user_login'=>$user_login))->find();
        if (!$user_login) {
           $state = 1;  //账号未输入！
        }elseif(!isset($re)) {
        	$state = 2;  //账号不存在!
        }elseif(isset($re){
        	$pd=M('user')->where(array('user_login'=>$user_login))
        				 ->field('user_password')
        				 ->find();
        		if (!$user_password) {
        				 	$state = 3;  //密码未输入！
        				 }elseif($pd ！== $user_password){
                            $state = 4;  //密码错误！
                         }elseif($pd == $user_password){
        				 	$state = 5;  //账号密码匹配，登陆成功！
        				 }
        }
        $result['status'] = $state;
        echo json_encode($result);
	}
}