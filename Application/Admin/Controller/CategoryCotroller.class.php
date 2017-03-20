<?php
namespace Home\Controller;
use Think\Controller;
class CategoryController extends Controller {
	public function index(){
		$list = M('category')->select();
		$this->assign('list',$list);
		$this->display();
	}
	public function add(){
		$this->display();
	}
	public function handleadd(){
		$data['name'] = $_POST['name'];
		$data['parent_id'] = $_POST['parent_id'];
		M('category')->add($data);
		$this->success('ok',U('admin/category/add'));
	}
	public function edit(){
		
	}
}