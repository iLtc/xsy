<?php
class EditAction extends Action {
	Public function del(){
		//判断用户是否已登录
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
		} else {
			//用户未登录
			$this -> error('请重新登录',U('Index/index'));
		}
		//判断当前是否允许报名
		$m123=M("Info");
		$data123=$m123->where('id=2')->find();
		if($data123['class']!=='T'){
			$this->error('现在不能删除小伙伴');
		}
		if($_GET['check'] == 1234567){
			$this->error('未知错误');
		}
		if($_GET['id']=='' || $_GET['check']==''){
			$this->error('参数错误');
		}
		//检查参数是否含有敏感字符
		$a=0;
		$a=$a+inject_check($_GET['id']);
		$a=$a+inject_check($_GET['check']);
		if(!$a==0){
			$this -> error('非法请求！！！');
		}
		$User = M('Baoming');
		$where['id']=$_GET['id'];
		$where['check']=$_GET['check'];
		if($User->where($where)->delete()){
			$this->redirect('Index/index');
		}else{
			$this->error('未知错误');
		}
	}
	Public function quxiao(){
		//判断用户是否已登录
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
		} else {
			//用户未登录
			$this -> error('请重新登录',U('Index/index'));
		}
		//判断当前是否允许报名
		$m123=M("Info");
		$data123=$m123->where('id=2')->find();
		if($data123['class']!=='T'){
			$this->error('现在不能取消报名');
		}
		$User = M('Baoming');
		$where['uid']=$Xsy_uid;
		if($User->where($where)->delete()){
			$this->success('报名已取消',U('Index/index'));
		}else{
			$this->error('未知错误');
		}
}
}