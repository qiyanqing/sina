<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller {
	public function index(){
		$list = M('category')->select();
		$this->assign('list',$list);
		$this->display();
	}
	public function add(){
		$category = M('category')->select();
		getTree($category,0,$result);
		$this->assign('category',$result);
		$this->display();
	}
	public function handleadd(){
		$data = array();
		$info = upload('logo','category');
		if($info['status']=='error'){
			$this->error('上传失败！');
		}else{
			$data['logo'] = $info['path'];
		}
		$data['name'] = $_POST['name'];
		$data['parent_id'] = $_POST['parent'];
		$c = M('category')->add($data);
		if ($c > 0) {
			$this->success('ok',U('admin/category/add'));
		}else{
			$this->error('no',U('admin/category/add'));
		}
	}
	public function edit(){
		$category = M('category')->select();
		$this ->assign('category',$category);
		$i = $_GET['id'];
		$c_info = M('category')->where(array('id'=>$i))->find();
		$this->assign('a',$c_info);
		$this->display();
	}
	public function handleedit(){
		$data = array();
		$info = upload('logo','category');
		if($info['status']=='error'){
			$this->error('上传失败！');
		}else{
			$data['logo'] = $info['path'];
		}
		$i = $_POST['id'];
		$data['name'] = $_POST['name'];
		$data['parent_id'] = $_POST['parent'];
		$c = M('category')->where(array('id'=>$i))->save($data);
		if ($c > 0) {
			$this->success('ok',U('admin/category/index'));
		}else{
			$this->error('no',U('admin/category/index'));
		}	
	}
	public function delete(){
		$i = $_GET['id'];
		$c = M('category')->where(array('id'=>$i))->delete();
		if ($c > 0) {
			$this->success('ok',U('admin/category/index'));
		}else{
			$this->error('no',U('admin/category/index'));
		}
		
	}
}