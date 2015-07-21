<?php
//引用Ucenter应用的配置和函数
include './config.inc.php';
include './client/client.php';
class UcAction extends Action {
	public function index(){
		redirect(U('/Uc/login'), 0);
    }
	public function login1(){
		if(!$this->isPost()){
			$this->ajaxReturn(-5,"非法请求",-5);
		}else{
			if($_POST['username']=='' | $_POST['password']=='')
			{
				$this->ajaxReturn(-1,"参数错误",-1);

			}
            //通过接口判断登录帐号的正确性，返回值为数组
			list($uid, $username, $password, $email) = uc_user_login($_POST['username'], $_POST['password'],0);
			cookie('Xsy_auth', '');
			if($uid > 0) {
				//用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数
				cookie('Xsy_auth', uc_authcode($uid."\t".$username, 'ENCODE'));
				//生成同步登录的代码
				$this->ajaxReturn($uid,"登录成功",$uid);
			} elseif($uid == -1) {
				$this->ajaxReturn(-2,"用户不存在，或者被删除",-2);
			} elseif($uid == -2) {
				$this->ajaxReturn(-3,"密码错误",-3);
			} else {
				$this->ajaxReturn(-4,"未知错误",-4);
			}
		}
	}
	public function login(){
			//登录表单
			$this->assign('return',$_GET['return']);
			$this->display();
	}
	public function logout(){
		cookie('Xsy_auth', 'logout',-3600);
		//生成同步退出的代码
		echo uc_user_synlogout();
		$this -> success(退出成功,U('Index/index'));
	}
}