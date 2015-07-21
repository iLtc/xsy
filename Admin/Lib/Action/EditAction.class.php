<?php
include './config.inc.php';
include './client/client.php';
//定义数据库导出函数
function exportexcel($data=array(),$title=array(),$filename='report'){
    header("Content-type:application/octet-stream");
    header("Accept-Ranges:bytes");
    header("Content-type:application/vnd.ms-excel");  
    header("Content-Disposition:attachment;filename=".$filename.".csv");
    header("Pragma: no-cache");
    header("Expires: 0");
    //导出xls 开始
    if (!empty($title)){
        foreach ($title as $k => $v) {
            $title[$k]=iconv("UTF-8", "UTF-8",$v);
        }
        $title= implode("\t", $title);
        echo "$title\n";
    }
    if (!empty($data)){
        foreach($data as $key=>$val){
            foreach ($val as $ck => $cv) {
                $data[$key][$ck]=iconv("UTF-8", "UTF-8", $cv);
            }
            $data[$key]=implode("\t", $data[$key]);
            
        }
        echo implode("\n",$data);
    }
}
class EditAction extends Action {
	Public function daochu1(){
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
			//检查是否具有管理员权限
			$admin=M("Admininfo");
			$where['uid']=$Xsy_uid;
			$data=$admin->where($where)->find();
			if($data=='' || $data['class']<3){
				$this->error('您没有权限访问此页面');
			}else{
				$this->assign('class',$data['class']);//输出管理权限级别
			}	
		} else {
			$this -> error(请重新登录,U('Uc/login?return=3'));
		}
		//导出数据	
		$stu = M ('Baoming');
		$arr = $stu -> order('id asc') -> select();
		exportexcel($arr,array('id','姓名','性别','是否为新生','手机号码','短号','QQ号','学院','专业','关系','所在地区','离开时间','备注','报名编号','所在队号','时间','红满堂ID','UID','IP','校验值'),'Xsy');
	}
	Public function daochu2(){
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
			//检查是否具有管理员权限
			$admin=M("Admininfo");
			$where['uid']=$Xsy_uid;
			$data=$admin->where($where)->find();
			if($data=='' || $data['class']<3){
				$this->error('您没有权限访问此页面');
			}else{
				$this->assign('class',$data['class']);//输出管理权限级别
			}	
		} else {
			$this -> error(请重新登录,U('Uc/login?return=3'));
		}
		$stu = M ('Baoming');
		$arr = $stu -> order('id asc') -> select();
		$this->assign('data',$arr);
		$this->display();
	}
	Public function a(){
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
			$this -> error(请重新登录,U('Uc/login?return=2'));
		}
		$this->assign('type',2);
		$content = $this->fetch('Index:top');
		echo $content;
		$this->display();
	}
	Public function check(){
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
			$this -> error(请重新登录,U('Uc/login?return=2'));
		}
		$m=M('Baoming');
		$parameter['guanxi']='报名人';
		$parameter['id']=$_GET['id'];
		$data=$m->where($parameter)->find();
		if($data == ''){
			$this->error('未知错误',U('Edit/a'));
		}
		if($_GET['class']=='T'){
			$data['partid']='T';
		}elseif($_GET['class']=='N'){
			$data['partid']='N';
		}
		if($m->where($parameter)->save($data)){
			$this->redirect('Edit/a');
		}else{
			$this->error(状态修改失败，请重试);
		}
	}
	Public function zt(){
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
			$this -> error(请重新登录,U('Uc/login?return=4'));
		}
		$m=M("Info");
		$data=$m->where('name="bm"')->find();
		if($data['class']=='T'){
			$this->assign('zt1','T');
		}else{
			$this->assign('zt1','F');
		}
		$data=$m->where('name="qx"')->find();
		if($data['class']=='T'){
			$this->assign('zt2','T');
		}else{
			$this->assign('zt2','F');
		}
		$this->assign('type',4);
		$content = $this->fetch('Index:top');
		echo $content;
		$this->display();
	}
	Public function chzt(){
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
			$this -> error(请重新登录,U('Uc/login?return=4'));
		}
		$m=M("Info");
		if($_GET['class']=='bm'){
			if($_GET['zt']=='T'){
				$m->where('id=1')->setField('class','T');
			}else{
				$m->where('id=1')->setField('class','F');
			}
		}elseif($_GET['class']=='qx'){
			if($_GET['zt']=='T'){
				$m->where('id=2')->setField('class','T');
			}else{
				$m->where('id=2')->setField('class','F');
			}
		}
		$this->redirect('Edit/zt');	
	}
	Public function admin(){
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
			//检查是否具有管理员权限
			$admin=M("Admininfo");
			$where['uid']=$Xsy_uid;
			$data=$admin->where($where)->find();
			if($data=='' || $data['class']<5){
				$this->error('您没有权限访问此页面');
			}else{
				$this->assign('class',$data['class']);//输出管理权限级别
			}	
		} else {
			$this -> error(请重新登录,U('Uc/login?return=2'));
		}
		$m=M("Admininfo");
		$data=$m->select();
		$this->assign('data',$data);
		$this->assign('type',5);
		$content = $this->fetch('Index:top');
		echo $content;
		$this->display();
	}
	public function addadmin(){
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
			//检查是否具有管理员权限
			$admin=M("Admininfo");
			$where['uid']=$Xsy_uid;
			$data=$admin->where($where)->find();
			if($data=='' || $data['class']<5){
				$this->error('您没有权限访问此页面');
			}else{
				$this->assign('class',$data['class']);//输出管理权限级别
			}	
		} else {
			$this -> error(请重新登录,U('Uc/login?return=2'));
		}
		//添加管理员
		if($_POST !== NULL){
			list($add_uid, $add_username, $add_email)=uc_get_user($_POST['uid'],1);
			if($add_uid==''){
				$this->error(此UID对应的账户不存在);
			}
			$admin1=M("Admininfo");
			$where['uid']=$add_uid;
			$data=$admin1->where($where)->find();
			if($data !== NULL){
				$this->error('此UID对应的管理员已存在');
			}
			$admin2=M("Admininfo");
			$data1['uid']=$add_uid;
			$data1['uname']=$add_username;
			$data1['class']=$_POST['qx'];
			if($admin2->data($data1)->add()){
				$this->redirect('Edit/admin');
			}else{
				$this->error(添加管理员失败);
			}
		}
	}
	public function deladmin(){
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
			//检查是否具有管理员权限
			$admin=M("Admininfo");
			$where['uid']=$Xsy_uid;
			$data=$admin->where($where)->find();
			if($data=='' || $data['class']<5){
				$this->error('您没有权限访问此页面');
			}else{
				$this->assign('class',$data['class']);//输出管理权限级别
			}	
		} else {
			$this -> error(请重新登录,U('Uc/login?return=2'));
		}
		$m=M("Admininfo");
		$where1['id']=$_GET['id'];
		$data1=$m->where($where1)->find();
		if($data1 == NULL){
			$this->error(指定的管理员不存在);
		}
		if($data['class'] <= $data1['class']){
			$this->error('不能删除比您权限高的管理员……');
		}
		if($m->where($where1)->delete()){
			$this->redirect('Edit/admin');
		}else{
			$this->error(删除管理员失败，请重试);
		}
	}
	public function csh(){
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
			//检查是否具有管理员权限
			$admin=M("Admininfo");
			$where['uid']=$Xsy_uid;
			$data=$admin->where($where)->find();
			if($data=='' || $data['class']<100){
				$this->error('您没有权限访问此页面');
			}else{
				$this->assign('class',$data['class']);//输出管理权限级别
			}	
		} else {
			$this -> error(请重新登录,U('Uc/login?return=2'));
		}
		$groupid = M('Groupid');
		if($groupid->where('id=1')->setField('groupid','0')){
			$this->success('初始化组号成功',U('Edit/zt'));
		}else{
			$this->error('失败，请重新尝试');
		}
	}
	
}