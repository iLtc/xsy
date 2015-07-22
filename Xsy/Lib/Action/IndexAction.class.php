<?php
class IndexAction extends Action {
	public function index(){
		//通过检查cookie判断是否登陆
		if(!empty($_COOKIE['Xsy_auth'])) {
			//用户已登录，解密cookie内容
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
		} else {
			//用户未登录，输出登录提示
			$pub['title']='首页';
			$pub['uc']=UC_API;
			$pub['uid']=$Xsy_uid;
			$pub['uname']=$Xsy_username;
			$this->assign('pub',$pub);
			$this->display('Index:toper');
			$this -> display('Index:index');
			$this->display('Index:footer');
			exit;
		}
		$this->assign('name',$Xsy_username);//发送用户名
		//判断是否已登记
		$m=M('Baoming');
		$parameter['uid']=$Xsy_uid;
		$parameter['guanxi']='报名人';
		$data=$m->where($parameter)->find();
		if($data!==NULL){
			$pub['zt']='T';
		}
		$pub['title']='首页';
		$pub['uc']=UC_API;
		$pub['uid']=$Xsy_uid;
		$pub['uname']=$Xsy_username;
		$this->assign('Data1',$data);
		//查询并输出同行人信息
		$m=M('Baoming');
		$parameter2['uid']=$Xsy_uid;
		$parameter2['guanxi']=array('NEQ','报名人');
		$data2=$m->where($parameter2)->select();
		$this->assign('Data2',$data2);
		if($data2==NULL){
			$pub['info']='添加小伙伴资料';
		}else{
			$pub['info']='继续添加小伙伴资料';
		}
		$this->assign('pub',$pub);
			//检查公告板
			$m=M("Gonggao");
			$data=$m->order('id desc')->find();
			$arr['biaoti']=$data['biaoti'];
			$arr['neirong']=$data['neirong'];
			$arr['kaiguan']=$data['kaiguan'];
			$this->assign($arr);
		$this->display('Index:toper');
		$this -> display('Index:index');
		$this->display('Index:footer');
	}
}