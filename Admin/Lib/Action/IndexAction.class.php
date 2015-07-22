<?php
class IndexAction extends Action {
    public function index(){
		//判断用户是否已登录
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
			//检查是否具有管理员权限
			$admin=M("Admininfo");
			$where['uid']=$Xsy_uid;
			$data=$admin->where($where)->find();
			if($data==''){
				$this->error('您没有权限访问管理页面','http://hometown.scau.edu.cn');
			}else{
				$this->assign('class',$data['class']);//输出管理权限级别
			}	
		} else {
			$this -> error(请重新登录,U('Uc/login'));
		}
		//统计报名信息
		$baoming=M("Baoming");
		$data=$baoming->select();
		$this->assign('allnum',count($data));//输出总人数
		$data=$baoming->where('guanxi="报名人"')->select();
		$this->assign('bmnum',count($data));//输出组数
		$this->assign('type',1);
		$this->display('Index:top');
		$this->display();
    }
}