<?php
namespace Admin\Controller;
use Think\Controller;
class AdvertController extends Controller {
    public function index(){//广告列表
    	$a = M('advert')->select();
    	$this->assign('type',$this->type);
    	$this->assign('a',$a);
    	$this->display();
    }
    public $type = array(
    	'middle' =>array('name'=>'主广告'),
    	'side'   =>array('name'=>'侧边广告'),
    	);
    public function add(){//增加广告
    	$this->assign('type',$this->type);
    	$this->display();
    }
    public function handleadd(){
    	$data = array();
    	$info = upload('image','advert');
    	if ($info['status'] == 'error') {
    		$this->error('上传失败！');
    	}else{
    		$data['ad_img'] = $info['path'];
    	}
    	$data['type'] = $_POST['type'];
    	$data['adress'] = $_POST['adress'];
    	$data['create_time'] = date('Y-m-d H:i:s');
    	$status = M('advert')->add($data);
    	if ($status > 0) {
			$this->success('ok',U('admin/advert/index'));
		}else{
			$this->error('no',U('admin/advert/index'));
		}
	}		
	public function edit(){
		
		$this ->assign('type',$this->type);
		$i = $_GET['id'];
		$ad_info = M('advert')->where(array('id'=>$i))->find();
		$this->assign('ad',$ad_info);
		$this->display();
	}
	public function handleedit(){
		$data = array();
		$info = upload('image','category');
		if($info['status']=='error'){
			$this->error('上传失败！');
		}else{
			$data['ad_img'] = $info['path'];
		}
		$i = $_POST['id'];
		$data['adress'] = $_POST['adress'];
		$data['type'] = $_POST['type'];
		$c = M('advert')->where(array('id'=>$i))->save($data);
		if ($c > 0) {
			$this->success('ok',U('admin/advert/index'));
		}else{
			$this->error('no',U('admin/advert/index'));
		}	
	}
	public function delete(){
		$i = $_GET['id'];
		$c = M('advert')->where(array('id'=>$i))->delete();
		if ($c > 0) {
			$this->success('ok',U('admin/advert/index'));
		}else{
			$this->error('no',U('admin/advert/index'));
		}
		
	}
    
}    