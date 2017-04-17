<?php
namespace Home\Controller;
use Think\Controller;
class RegisterController extends Controller {
    public function userregister(){
        $user = M('user')->select();
        // $this->assign();
        $this->display();
    }
}