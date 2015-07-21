<?php
//引用Ucenter应用的配置和函数
include './config.inc.php';
include './client/client.php';

class UcAction extends Action {
    public function index(){
		redirect(U('/Uc/login'), 0);
    }
	
	public function login(){
		//判断用户是否已登录
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
			//检查是否具有管理员权限
			$admin=M("admininfo");
			$where['uid']=$Xsy_uid;
			$data=$admin->where($where)->find();
			if($data==''){
					$this->error('您没有权限访问管理页面','http://hometown.scau.edu.cn');
			}else{
				if($_GET['return']==''){
					$this->success(登录成功,U('Index/index'));
				}else{
					$url='Uc/return1?id='.$_GET['return'];
					$this->success(登录成功,U($url));
				}
			}
		} else {
			redirect('http://hometown.scau.edu.cn/bbs/member.php?mod=logging&action=login&referer=/xsy/sso.php?r=1');
		}
}

public function logout(){
	cookie('Xsy_auth', 'logout',-3600);
	//生成同步退出的代码
	echo uc_user_synlogout();
	$this->success('退出成功',U('Index/index'));
}

public function return1(){
	//以下是登录成功后自动跳转回指定页面的代码
	$id=$_GET['id'];
	if($id==1){
	redirect(U('/Baoming/step1'));
	}elseif($id==2){
	redirect(U('/Baoming/step3'));
	}elseif($id==3){
	redirect(U('/Edit/quxiao'));
	}else{
	redirect(U('/Index/index'));
	}
}
}