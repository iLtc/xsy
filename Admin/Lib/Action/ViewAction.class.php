<?php
include './config.inc.php';
include './client/client.php';
class ViewAction extends Action {
	Public function index(){
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
		$this->assign('type',3);
		$this->display('Index:top');
		echo '</br>';
		//获取页码和每页条数
		if($_GET['page']<2 || !is_numeric($_GET['page'])){
			$p=1;
		}else{
			$p=$_GET['page'];
		}
		if($_GET['num']<1 || !is_numeric($_GET['num'])){
			$n=10;
		}else{
			$n=$_GET['num'];
		}
		$m = M("Baoming");
		$w['guanxi'] = '报名人';
		if($_GET['order']=='F'){
			$duiwu = $m -> where($w) -> order('id desc')-> select();
		}else{
			$duiwu = $m -> where($w) -> order('id asc')-> select();
		}
		if((count($duiwu)/$n-floor(count($duiwu)/$n))>0){
			$temp=floor(count($duiwu)/$n)+2;
		}else{
			$temp=floor(count($duiwu)/$n)+1;
		}
		$arr['temp']=$temp;
		$arr['page']=$p;
		$arr['num']=$n;
		$arr['order']=$_GET['order'];
		$this->assign($arr);
		$this->display('View:nav');
		if(count($duiwu)<(($p-1)*$n+1)){
			echo '<p>未知错误</p>';
			exit;
		}
		//循环输出数据
		for($i=($p-1)*$n;$i<($p)*$n;$i++){
			if(count($duiwu[$i])>0){
				$this->assign('duiwu',$duiwu[$i]);
				$w1['uid']=$duiwu[$i]['uid'];
				$data = $m -> where($w1) -> order('id asc')-> select();
				$this->assign('data',$data);
				$this->assign('num',count($data));
				$this->display('View:index');
				echo '</br>';
			}
		}
		echo '</br>';
		$arr['temp']=$temp;
		$arr['page']=$p;
		$arr['num']=$n;
		$arr['order']=$_GET['order'];
		$this->assign($arr);
	$this->display('View:nav');
	}
}