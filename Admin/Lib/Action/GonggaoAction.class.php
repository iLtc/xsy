<?php
include './config.inc.php';
include './client/client.php';

class GonggaoAction extends Action {
	Public function index(){
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
			//检查是否具有管理员权限
			$admin=M("Admininfo");
			$where['uid']=$Xsy_uid;
			$data=$admin->where($where)->find();
			if($data=='' || $data['class']<2){
				$this->error('您没有权限访问此页面');
			}else{
				$this->assign('class',$data['class']);//输出管理权限级别
			}	
		} else {
			$this -> error(请重新登录,U('Uc/login?return=3'));
		}
		$m=M("Gonggao");
		$data=$m->order('id desc')->find();
		$arr['type']=2;
		$arr['biaoti']=$data['biaoti'];
		$arr['neirong']=$data['neirong'];
		$arr['kaiguan']=$data['kaiguan'];
		$this->assign($arr);
		$this->display('Index:top');
		$this->display();
	}
	Public function edit(){
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
			//检查是否具有管理员权限
			$admin=M("Admininfo");
			$where['uid']=$Xsy_uid;
			$data=$admin->where($where)->find();
			if($data=='' || $data['class']<2){
				$this->error('您没有权限访问此页面');
			}else{
				$this->assign('class',$data['class']);//输出管理权限级别
			}	
		} else {
			$this -> error(请重新登录,U('Uc/login?return=3'));
		}
		$m=M("Gonggao");
		$data['kaiguan']=$_POST['kaiguan'];
		$data['biaoti']=$_POST['biaoti'];
		$data['neirong']=$_POST['neirong'];
		if($m->data($data)->add()){
			$this->success('公告板修改成功');
		}else{
			$this->error('错误，请重试');
		}
	}
}