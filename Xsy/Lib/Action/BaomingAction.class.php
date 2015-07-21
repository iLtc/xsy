<?php
//引用Ucenter应用的配置和函数
include './config.inc.php';
include './client/client.php';
//定义随机字段函数
function genRandomString($len){
    $chars = array( 
        "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k",  
       	"l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v",  
       	"w", "x", "y", "z", "A", "B", "C", "D", "E", "F", "G",  
		"H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R",  
		"S", "T", "U", "V", "W", "X", "Y", "Z", "0", "1", "2",  
		"3", "4", "5", "6", "7", "8", "9" 
    ); 
    $charsLen = count($chars) - 1; 
    shuffle($chars);// 将数组打乱
    $output = ""; 
    for ($i=0; $i<$len; $i++) {
		$output .= $chars[mt_rand(0, $charsLen)]; //获得一个数组元素
	}  
	return $output;
}
//定义防SQL字段检查函数
function inject_check($sql_str) { 
	$check=eregi('select|insert|update|delete|\'|\/\*|\*|\.\.\/|\.\/|union|into|load_file|outfile', $sql_str);     // 进行过滤 
	if($check){ 
		return 1;
	}else{ 
		return 0; 
	} 
}
class BaomingAction extends Action {
	public function index(){
		redirect(U('Baoming/step1'), 0);
	}

	public function step1(){
		//检查是否已登录
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
		} else {
			$this -> error(请重新登录,'javascript:self.parent.window.location.reload();');
		}
		//用户已登录
		//判断当前是否允许报名
		$m123=M("Info");
		$data123=$m123->where('id=1')->find();
		if($data123['class']!=='T'){
			$this->error('现在不是报名时间，不能报名','javascript:self.parent.window.location.reload();');
		}
		//判断是否已登记
		$m=M('Baoming');
		$parameter['uid']=$Xsy_uid;
		$data=$m->where($parameter)->find();
		if($data==NULL){
			//未登记，显示报名页面
			$this->assign('name',$Xsy_username);
			$this->display();
		}else{
			//已登记
			$this -> error('请勿重复报名','javascript:self.parent.window.location.reload();');
		}
	}
	public function step2(){
		//检查是否登录
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
		} else {
			$this -> ajaxReturn(-1,'请先登录',-1);
		}
		//判断是否已登记
		$m=M('Baoming');
		$parameter['uid']=$Xsy_uid;
		$data=$m->where($parameter)->find();
		if($data !== NULL){
			//已登记
			$this -> ajaxReturn(-2,'请勿重复报名',-2);
		}
		//检查提交方式是否正确
		if (!$this->isPost()){
			$this -> ajaxReturn(-3,'非法请求',-3);
		}
		//检查是否有非法字符
		$a=0;
		$a=$a+inject_check($_POST['name']);
		$a=$a+inject_check($_POST['mobilNum']);
		$a=$a+inject_check($_POST['smobilNum']);
		$a=$a+inject_check($_POST['qqNum']);
		$a=$a+inject_check($_POST['zhuanye']);
		$a=$a+inject_check($_POST['diqu']);
		$a=$a+inject_check($_POST['beizhu']);
		if(!$a==0){
			$this -> ajaxReturn(-4,'输入的内容存在非法字符',-4);
		}
		//检查是否有未填项
		//先检查所有人都要填的
		if($_POST['name']==NULL || $_POST['mobilNum']==NULL || $_POST['qqNum']==NULL){
			$this -> ajaxReturn(-5,'请填写所有必填的项目'.-5);
		}
		if($_POST['diqu']=='请选择' || $_POST['diqu']==''){
			$this->ajaxReturn(-6,'请选择您所在的地区',-6);
		}
		//再检查新生必填项
		if($_POST['xs']=='是'){
			if($_POST['college']=='error'){
				$this->ajaxReturn(-7,'新生请选择录取学院',-7);
			}
			if($_POST['zhuanye']=='请选择'){
				$this->ajaxReturn(-8,'新生请填写录取专业',-8);
			}
		}
		//检查QQ和手机是否为数字
		if(!is_numeric($_POST['mobilNum']) || !is_numeric($_POST['qqNum'])){
			$this->ajaxReturn(-9,'手机号码和QQ号码只能为数字',-9);
		}
		//检查短号（可不填）是否为数字
		if($_POST['smobilNum']!==''){
			if(!is_numeric($_POST['smobilNum'])){
				$this->ajaxReturn(-10,'短号只能为数字'-10);
			}
		}
		//通过手机号码判断是否存在重复报名的情况
			$m=M('Baoming');
			$w['mobilNum']=$_POST['mobilNum'];
			$data=$m->where($w)->find();
			if(count($data) !== 0){
				$this -> ajaxReturn(-11,'手机号码已存在，请勿重复报名，若您确定未用此手机号码报名，请与薯藤队长联系',-11);
			}
		//还要限制一些号码的长短,避免乱输
		if($_POST['smobilNum']!==''){
			if($_POST['smobilNum']<600 || $_POST['smobilNum']>69999999){
				$this->ajaxReturn(-12,'短号格式不正确',-12);
			}
		}
		if($_POST['mobilNum']<13000000000 || $_POST['mobilNum']>19999999999){
				$this->ajaxReturn(-13,'手机号码格式不正确',-13);
		}
		if($_POST['qqNum']<10000){
				$this->ajaxReturn(-14,'QQ号码格式不正确',-14);
		}
		//获取组号
		$groupid = M('Groupid');
		$data1 = $groupid -> find();
		$data1['groupid'] = $data1['groupid'] + 1;
		$groupid->where('id=1')->save($data1); 
		//数据检查通过，开始写入数据库
		$baoming=M('Baoming');
		$data['name'] = $_POST['name'];
		$data['sex'] = $_POST['sex'];
		$data['xs'] = $_POST['xs'];
		$data['mobilNum'] = $_POST['mobilNum'];
		if($_POST['smobilNum']==''){
			$data['smobilNum']='无';
		}else{
		$data['smobilNum'] = $_POST['smobilNum'];
		}
		$data['qqNum'] = $_POST['qqNum'];
		if($_POST['college']=='error'){
			$data['college'] = '无';
		}else{
			$data['college'] = $_POST['college'];
		}
		if($_POST['zhuanye']=='请选择'){
			$data['zhuanye']='无';
		}else{
		$data['zhuanye'] = $_POST['zhuanye'];
		}
		$data['guanxi'] = '报名人';
		if($_POST['diqu']=='qt'){
			$data['diqu'] = $_POST['diqu1'];
		}else{
			$data['diqu'] = $_POST['diqu'];
		}
		$data['shijian'] = $_POST['shijian'];
		$data['dz'] = $_POST['dz'];
		$data['beizhu'] = $_POST['beizhu'];
		$data['groupid'] = $data1['groupid'];
		$data['time'] = date("Y-m-d H:i:s");	//获取提交时间
		$data['uname'] = $Xsy_username;		//获取UC中的用户名
		$data['uid'] = $Xsy_uid;			//获取UC中的uid
		$data['ip'] = get_client_ip();			//获取IP
		$data['check'] = 1234567;
		$baoming->create($data);
		if($baoming->add()) {
			$this->ajaxReturn(0,'成功',0);
		}else{
			$this->ajaxReturn(-15,'写入错误！若反复看到此提示，请与薯仔队长联系',-15);
		}
	}
	public function step3(){
		//判断用户是否已登录
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
		} else {
			$this -> error('请先登录','javascript:self.parent.window.location.reload()');
		}
		//判断当前是否允许报名
		$m123=M("Info");
		$data123=$m123->where('id=1')->find();
		if($data123['class']!=='T'){
			$this->error('现在不是报名时间，不能报名','javascript:self.parent.window.location.reload();');
		}
		//判断是否已登记
		$m=M('Baoming');
		$parameter['uid']=$Xsy_uid;
		$data=$m->where($parameter)->find();
		if($data==NULL){
			//未登记，提示错误
			$this->error('未报名不能填写同伴资料','javascript:self.parent.window.location.reload();');
		}else{
			//已登记
			$this->assign('name',$Xsy_username);
			$this->display();
		}
	}
	public function step4(){
		//判断用户是已登录
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
		} else {
			$this -> ajaxReturn(-1,'请先登录',-1);
		}
		//检查提交方式
		if (!$this->isPost()){
			$this -> ajaxReturn(-3,'非法请求',-3);
		}
		//判断是否已登记
		$m=M('Baoming');
		$parameter['uid']=$Xsy_uid;
		$data123=$m->where($parameter)->find();
		if($data123==NULL){
			//未登记，提示错误
			$this->ajaxReturn(-2,'未报名不能填写同行人资料，将转到报名页面',-2);
			exit;
		}
		//检查是否有非法字符
		$a=0;
		$a=$a+inject_check($_POST['name']);
		$a=$a+inject_check($_POST['mobilNum']);
		$a=$a+inject_check($_POST['smobilNum']);
		$a=$a+inject_check($_POST['qqNum']);
		$a=$a+inject_check($_POST['zhuanye']);
		$a=$a+inject_check($_POST['beizhu']);
		$a=$a+inject_check($_POST['gx']);
		if(!$a==0){
			$this -> ajaxReturn(-4,'输入的内容存在非法字符',-4);
		}
		//检查是否有未填项
		//先检查所有人都要填的
		if($_POST['name']=='' || $_POST['mobilNum']=='' || $_POST['qqNum']=='' || $_POST['gx']==''){
			$this -> ajaxReturn(-5,'请填写所有必填的项目',-5);
		}
		//再检查新生必填项
		if($_POST['xs']=='是'){
			if($_POST['college']=='error'){
				$this->ajaxReturn(-7,'新生请选择录取学院',-7);
			}
			if($_POST['zhuanye']=='请选择'){
				$this->ajaxReturn(-8,'新生请填写录取专业',-8);
			}
		}
		//检查QQ和手机是否为数字
		if(!is_numeric($_POST['mobilNum']) || !is_numeric($_POST['qqNum'])){
			$this->ajaxReturn(-9,'手机号码和QQ号码只能为数字',-9);
		}
		//检查短号（可不填）是否为数字
		if($_POST['smobilNum']!==''){
			if(!is_numeric($_POST['smobilNum'])){
				$this->ajaxReturn(-10,'短号只能为数字',-10);
			}
		}
		//通过手机号码判断是否存在重复报名的情况
			$m=M('Baoming');
			$w['mobilNum']=$_POST['mobilNum'];
			$data=$m->where($w)->find();
			if(count($data) !== 0){
				$this->assign('waitSecond','7');
				$this -> ajaxReturn(-11,'手机号码已存在，请勿重复报名，若您确定未用此手机号码报名，请与薯藤队长联系',-11);
			}
		//还要限制一些号码的长短,避免乱输
		if($_POST['smobilNum']!==''){
			if($_POST['smobilNum']<600 || $_POST['smobilNum']>69999999){
				$this->ajaxReturn(-12,'短号格式不正确',-12);
			}
		}
		if($_POST['mobilNum']<13000000000 || $_POST['mobilNum']>19999999999){
				$this->ajaxReturn(-13,'手机号码格式不正确',-13);
		}
		if($_POST['qqNum']<10000){
				$this->ajaxReturn(-14,'QQ号码格式不正确',-14);
		}
		//数据检查通过，开始写入数据库
		$baoming=M('Baoming');
		$data['name'] = $_POST['name'];
		$data['sex'] = $_POST['sex'];
		$data['xs'] = $_POST['xs'];
		$data['mobilNum'] = $_POST['mobilNum'];
		if($_POST['smobilNum']==''){
			$data['smobilNum']='无';
		}else{
		$data['smobilNum'] = $_POST['smobilNum'];
		}
		$data['qqNum'] = $_POST['qqNum'];
		if($_POST['college']=='error'){
			$data['college'] = '无';
		}else{
			$data['college'] = $_POST['college'];
		}
		if($_POST['zhuanye']=='请选择'){
			$data['zhuanye']='无';
		}else{
			$data['zhuanye'] = $_POST['zhuanye'];
		}
		$data['beizhu'] = $_POST['beizhu'];
		$data['guanxi'] = $_POST['gx'];
		$data['diqu'] = $data123['diqu'];
		$data['groupid'] = $data123['groupid'];
		$data['time'] = date("Y-m-d H:i:s");	//获取提交时间
		$data['uname'] = $Xsy_username;		//获取UC中的用户名
		$data['uid'] = $Xsy_uid;			//获取UC中的uid
		$data['ip'] = get_client_ip();			//获取IP
		$data['check'] = genRandomString(7);			//通过随机函数获取随机值，用于修改记录时的验证
		$baoming->create($data);
		$result = $baoming->add();
		if($result) {	
			$this->ajaxReturn(0,'报名成功',0);
		}else{
			$this->ajaxReturn(-15,'写入错误！若反复看到此提示，请与薯藤队长联系',-15);
		}
	}
	public function check(){
		if(!empty($_COOKIE['Xsy_auth'])) {
			list($Xsy_uid, $Xsy_username) = explode("\t", uc_authcode($_COOKIE['Xsy_auth'], 'DECODE'));
		} else {
			$this -> ajaxReturn(-2,"登录信息丢失，请重新登录",-2);
			exit;
		}
		$m=M('Baoming');
		if($_GET['type']=='mobile'){
			$w['mobilNum']=$_GET['num'];
		}elseif($_GET['type']=='smobile'){
			$w['smobilNum']=$_GET['num'];
		}elseif($_GET['type']=='qq'){
			$w['qqNum']=$_GET['num'];
		}else{
			$this -> ajaxReturn(-3,"参数错误1",-3);
			exit;
		}
		if($_GET['num']==''){
			$this -> ajaxReturn(-3,"参数错误2",-3);
			exit;
		}
		$data=$m->where($w)->find();
		if(count($data) !== 0){
			$this -> ajaxReturn(-4,"已存在",-4);
			exit;
		}else{
			$this -> ajaxReturn(0,"通过",0);
			exit;
		}
		
	}
}