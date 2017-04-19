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
    public function category_left(){//微博左侧分类
        $result = array();
        $cate_l = M('category')->where(array('parent_id'=>1))->field('name')->select();
        foreach ($cate_l as $key => $value) {
            $result['names'][] = $value['name'];
        }
        $result['status'] = 'success';
        //var_dump($result);
        echo json_encode($result);
    }
    public function category_right(){//微博右侧分类
        $result = array();
        $cate_r = M('category')->where(array('parent_id'=>2))->select();
        foreach ($cate_r as $key => $value) {
            $cate_c = M('category')->where(array('parent_id'=>$value['id']))->select();
            $cate_r[$key]['child'] = $cate_c; 
            $result['names'] = $cate_r;
        }
        $result['status'] = 'success';
        //var_dump($result);
        echo json_encode($result);
    }
    public function register(){//用户注册
        $result = array();
        $data['user_login'] = $_POST['email'];
        $data['user_password'] = $_POST['password'];
        $data['email'] = $data['user_login'];
        $data['create_time'] = date('Y-m-d H:i:s');
        $ist_email = M('user')->where(array('email'=>$email))->find();
        if ($ist_email) {
            $status = 1 ; //邮箱已存在
        }else{
            M('user')->add($data);
            $status = 2 ; //账号注册成功
        }
        var_dump($result);
        $result['status'] = $status;
    }
}