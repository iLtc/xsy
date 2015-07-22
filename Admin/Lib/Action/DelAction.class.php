<?php
class DelAction extends Action {
	Public function z(){
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
			//检查是否具有管理员权限
			$admin=M("Admininfo");
			$where['uid']=$Xsy_uid;
			$data=$admin->where($where)->find();
			if($data=='' || $data['class']<4){
				$this->error('您没有权限访问此页面');
			}else{
				$this->assign('class',$data['class']);//输出管理权限级别
			}	
		} else {
			$this -> error(请重新登录,U('Uc/login?return=3'));
		}
		$User = M('Baoming');
		$where1['uid']=$_GET['uid'];
		$where1['uname']=$_GET['uname'];
		if($User->where($where1)->delete()){
			$this->redirect('View/index');
		}else{
			$this->error('未知错误');
		}
	}
	Public function tb(){
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
			//检查是否具有管理员权限
			$admin=M("Admininfo");
			$where['uid']=$Xsy_uid;
			$data=$admin->where($where)->find();
			if($data=='' || $data['class']<4){
				$this->error('您没有权限访问此页面');
			}else{
				$this->assign('class',$data['class']);//输出管理权限级别
			}	
		} else {
			$this -> error(请重新登录,U('Uc/login?return=3'));
		}
		$User = M('Baoming');
		$where1['id']=$_GET['id'];
		$where1['mobilNum']=$_GET['num'];
		if($User->where($where1)->delete()){
			$this->redirect('View/index');
		}else{
			$this->error('未知错误');
		}
	}
}