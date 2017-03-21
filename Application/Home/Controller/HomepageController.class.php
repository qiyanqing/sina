<?php
namespace Home\Controller;
use Think\Controller;
class HomepageController extends Controller {
    public function handlelogin(){
        $user = M('user')->select();
        // $this->assign();
        $this->display();
    }
}