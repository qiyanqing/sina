<?php
namespace Api\Controller;
use Think\Controller;
class UserpageController extends Controller {
	public function category(){//用户页面左侧分类
        $result = array();
        $cate_l = M('category')->where(array('parent_id'=>63))->select();
        foreach ($cate_l as $key => $value) {
            $result['name'][] = $value;
        }
        $result['status'] = 'success';
        // var_dump($result);
        echo json_encode($result);
    }

}