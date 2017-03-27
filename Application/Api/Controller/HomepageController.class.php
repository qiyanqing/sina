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
        
        }else{
        	$pd=M('user')->where(array('user_login'=>$user_login))
        				 ->field('user_password')
        				 ->find();
                   foreach ($pd as $key => $value) {
                       $a = $value;
                   }
                   // var_dump($a);
                   // var_dump($user_password);
        		if(!$user_password) {
        			$state = 3;  //密码未输入！
        		}
                else{
                    if($a !== $user_password){
                        $state = 4;  
                         //密码错误 ！
                    }
                    else{
                       $state = 5;  //账号密码匹配，登陆成功
                    }
                }
        }
        $result['status'] = $state;
        echo json_encode($result);
	}
    public function category_left(){
        $cate_l = M('category')->where(array('parent_id'=>1))->select();
        print_r($cate_l);
    }
}