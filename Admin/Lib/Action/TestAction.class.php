<?php
include './config.inc.php';
include './client/client.php';

class TestAction extends Action {
	Public function index(){
		$num = 0;
		$m=M("Baoming");
		$data=$m->where('guanxi = "报名人"')->select();
		for($i=0;$i<count($data);$i++){
			$w['uid']=$data[$i]['uid'];
			$data1=$m->where($w)->select();
			if(count($data1)>1){
				for($j=0;$j<count($data1);$j++){
					if($data1[$j]['guanxi'] == '报名人'){
						$groupid=$data1[$j]['groupid'];
						$diqu=$data1[$j]['diqu'];
					}
				}
				for($j=0;$j<count($data1);$j++){
					if($data1[$j]['guanxi'] !== '报名人'){
						if($data1[$j]['groupid'] == '' || $data1[$j]['diqu'] == ''){
							$where['id']=$data1[$j]['id'];
							$data2 = array('groupid'=>$groupid,'diqu'=>$diqu);
							$m->where($where)->setField($data2);
							$num = $num + 1;
						}
					}
				}
			}
		}
		echo '成功更新&nbsp;'.$num.'&nbsp;条数据！';
	}
}