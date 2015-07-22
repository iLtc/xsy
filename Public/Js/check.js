$(document).ready(function(e) {
	error=0;
	z=0;
	numback=1;
	qnumback=1;
	snumback='E';
});
function checkName(){
	if($("input#name").val()==''){
		$("span#name").html('请填写您的姓名');
		$("div#name").removeClass('success').addClass('error');
		return 1;
	}else{
		$("span#name").html('');
		$("div#name").removeClass('error').addClass('success');
		return 0;
	}
}
function checkNum(z){
	if($("input#mobilNum").val()==''){
		$("span#mobilNum").html('请填写您的手机号码');
		$("div#mobilNum").removeClass('success').removeClass('info').addClass('error');
		return 1;
	}else{
		if(isNaN($("input#mobilNum").val())){
			$("span#mobilNum").html('手机号码必须为数字');
			$("div#mobilNum").removeClass('success').removeClass('info').addClass('error');
			return 1;
		}else{
			if($("input#mobilNum").val()<13000000000 || $("input#mobilNum").val()>19999999999){
				$("span#mobilNum").html('手机号码位数不正确');
				$("div#mobilNum").removeClass('success').removeClass('info').addClass('error');
				return 1;
			}else{
				if(z!==1){
					ajaxnum('mobile',$("input#mobilNum").val(),"mobilNum");
				}
				return 0;
			}
		}
	}
}
function checksNum(z){
	if($("input#smobilNum").val()!==''){
		if($("input#smobilNum").val()<600 || $("input#smobilNum").val()>69999999){
			$("div#smobilNum").removeClass('success').removeClass('info').addClass('error');
			$("span#smobilNum").html('华农短号位数不正确');
			return 1;
		}else{
			if(isNaN($("input#smobilNum").val())){
				$("div#smobilNum").removeClass('success').removeClass('info').addClass('error');
				$("span#smobilNum").html('华农短号必须为数字');
				return 1;
			}else{
				if(z!==1){
					ajaxnum('smobile',$("input#smobilNum").val(),"smobilNum");
				}
				return 0;
			}
		}
	}else{
		$("span#snuminfo").html('');
		$("div#smobilNum").removeClass('error').removeClass('info').addClass('success');
		snumback='E';
		return 0;
	}
}
function checkqNum(z){
	if($("input#qqNum").val()==''){
		$("span#qqNum").html('请填写您的QQ号码');
		$("div#qqNum").removeClass('success').removeClass('info').addClass('error');
		return 1;
	}else{
		if($("input#qqNum").val()<10000){
			$("span#qqNum").html('QQ号码位数不正确');
			$("div#qqNum").removeClass('success').removeClass('info').addClass('error');
			return 1;
		}else{
			if(isNaN($("input#qqNum").val())){
				$("span#qqNum").html('QQ号码必须为数字');
				$("div#qqNum").removeClass('success').removeClass('info').addClass('error');
				return 1;
			}else{
				if(z!==1){
					ajaxnum('qq',$("input#qqNum").val(),"qqNum");
				}
				return 0;
			}
		}
	}
}
function ajaxnum(type,num,div){
	$("span#"+div).html('<img src="/xsy/Public/Image/loading.gif" width="25" height="25">');
	$("div#"+div).removeClass('success').removeClass('error').addClass('info');
		$.get('/xsy/index.php?m=Baoming&a=check',{type:type,num:num},function(data){
			if(data.status<0){
				if(type=='mobile'){
					numback=1;
				}else{
					if(type=='qq'){
						qnumback=1;
					}else{
						snumback=1;
					}
				}
				if(data.status==-4){
					$("span#"+div).html('您填写的号码已被登记过');
					$("div#"+div).removeClass('success').removeClass('info').addClass('error');
				}else{
					if(data.status==-2){
						alert("您的登录信息已经丢失，可能是登录超时，请重新登录！");
						self.parent.window.location.reloading();
					}else{
						$("span#"+div).html('未知错误！');
						$("div#"+div).removeClass('success').removeClass('info').addClass('error');
					}
				}
			}else{
				if(type=='mobile'){
					numback=0;
				}else{
					if(type=='qq'){
						qnumback=0;
					}else{
						snumback=0;
					}
				}	
				$("span#"+div).html('');
				$("div#"+div).removeClass('error').removeClass('info').addClass('success');
			}
		})
}
function checkxsT(){
	xs="T";	
	if($("select#college").find("option:selected").text() == '请选择'){
		$("span#college").html('新生必选，新生点击<a href="http://zsb.scau.edu.cn/zkxx/Article-3919.aspx" target="new">这里</a>查询');
		$("div#college").removeClass('success').removeClass('error').addClass('info');
	}
	if($("select#zhuanye").find("option:selected").text() == '请选择'){
		$("span#zhuanye").html('新生必选，新生点击<a href="http://zsb.scau.edu.cn/zkxx/Article-3919.aspx" target="new">这里</a>查询');
		$("div#zhuanye").removeClass('success').removeClass('error').addClass('info');
	}
	if($("select#college").find("option:selected").text() == '非华农人'){
		$("span#college").html('新生必选，新生点击<a href="http://zsb.scau.edu.cn/zkxx/Article-3919.aspx" target="new">这里</a>查询');
		$("div#college").removeClass('success').removeClass('info').addClass('error');
	}
	if($("select#zhuanye").find("option:selected").text() == '非华农人'){
		$("span#zhuanye").html('新生必选，新生点击<a href="http://zsb.scau.edu.cn/zkxx/Article-3919.aspx" target="new">这里</a>查询');
		$("div#zhuanye").removeClass('success').removeClass('info').addClass('error');
	}
}
function checkxsF(){
	xs="F";
	if($("select#college").find("option:selected").text() == '请选择' || $("select#college").find("option:selected").text() == '非华农人'){
		$("span#college").html('(新生及在校生必选，新生<a href="http://zsb.scau.edu.cn/zkxx/Article-3919.aspx" target="new">查询</a>)');
		$("div#college").removeClass('success').removeClass('error').removeClass('info');
	}
	if($("select#zhuanye").find("option:selected").text() == '请选择' || $("select#zhuanye").find("option:selected").text() == '非华农人'){
		$("span#zhuanye").html('(新生及在校生必选，新生<a href="http://zsb.scau.edu.cn/zkxx/Article-3919.aspx" target="new">查询</a>)');
		$("div#zhuanye").removeClass('success').removeClass('error').removeClass('info');
	}
}
function checkcol(jc,bt){
	if(jc !== 1){
		major();
	}
	if($("select#college").find("option:selected").text() == '请选择'){
		if(xs=='T' || bt==2){
			$("span#college").html('新生及在校生必选，新生<a href="http://zsb.scau.edu.cn/zkxx/Article-3919.aspx" target="new">查询</a>');
			$("div#college").removeClass('success').removeClass('info').addClass('error');
			return 1;
		}else{
			$("span#college").html('(新生及在校生必选，新生<a href="http://zsb.scau.edu.cn/zkxx/Article-3919.aspx" target="new">查询</a>)');
			$("div#college").removeClass('success').removeClass('info').removeClass('error');
			return 0;
		}
	}else{
		if($("select#college").find("option:selected").text() == '非华农人' && xs=='T'){
			$("span#college").html('新生及在校生必选，新生<a href="http://zsb.scau.edu.cn/zkxx/Article-3919.aspx" target="new">查询</a>');
			$("div#college").removeClass('success').removeClass('info').addClass('error');
			return 1;
		}else{
			$("span#college").html('');
			$("div#college").removeClass('error').removeClass('info').addClass('success');
			return 0;
		}
	}
}
function checkzy(bt){
	if($("select#zhuanye").find("option:selected").text() == '请选择'){
		if(xs=='T' || bt==2){
			$("span#zhuanye").html('新生及在校生必选，新生<a href="http://zsb.scau.edu.cn/zkxx/Article-3919.aspx" target="new">查询</a>');
			$("div#zhuanye").removeClass('success').removeClass('info').addClass('error');
			return 1;
		}else{
			$("span#zhuanye").html('(新生及在校生必选，新生<a href="http://zsb.scau.edu.cn/zkxx/Article-3919.aspx" target="new">查询</a>)');
			$("div#zhuanye").removeClass('success').removeClass('info').removeClass('error');
			return 0;
		}
	}else{
		if($("select#zhuanye").find("option:selected").text() == '非华农人' && xs=='T'){
			$("span#zhuanye").html('新生及在校生必选，新生<a href="http://zsb.scau.edu.cn/zkxx/Article-3919.aspx" target="new">查询</a>');
			$("div#zhuanye").removeClass('success').removeClass('info').addClass('error');
			return 1;
		}else{
			$("span#zhuanye").html('');
			$("div#zhuanye").removeClass('error').removeClass('info').addClass('success');
			return 0;
		}
	}
}
function checkdq(){
	if($("select#diqu").find("option:selected").text() == '其他'){
			bm.diqu1.style.display='';
			bm.diqu.style.display='none';
			$("span#diqu").html('请填写您所在的地区');
			$("div#diqu").removeClass('success').removeClass('error').addClass('info');
			return 0;
	}else{
		if($("select#diqu").find("option:selected").text() == '请选择'){
			$("span#diqu").html('请选择您所在的地区');
			$("div#diqu").removeClass('success').removeClass('info').addClass('error');
			return 1;
		}else{
			$("span#diqu").html('');
			$("div#diqu").removeClass('error').removeClass('info').addClass('success');
			return 0;
		}
	}
}
function checkdq1(){
	if($("select#diqu").find("option:selected").text() == '其他'){
		if($("input#diqu1").val() == ''){
			$("span#diqu").html('请填写您所在的地区');
			$("div#diqu").removeClass('success').removeClass('info').addClass('error');
			return 1;
		}else{
			$("span#diqu").html('');
			$("div#diqu").removeClass('error').removeClass('info').addClass('success');
			return 0;
		}
	}else{
		return 0;
	}
}
function checkgx(){
	if($("input#guanxi").val() == ''){
			$("span#guanxi").html('请填写此人与您的关系');
			$("div#guanxi").removeClass('success').removeClass('info').addClass('error');
			return 1;
	}else{
			$("span#guanxi").html('');
			$("div#guanxi").removeClass('error').removeClass('info').addClass('success');
			return 0;
	}
}
function checkdz(){
	if($("select#dz").find("option:selected").text() == '请选择'){
			$("span#dz").html('请选择您了解新生游的渠道');
			$("div#dz").removeClass('success').removeClass('info').addClass('error');
			return 1;
	}else{
			$("span#dz").html('');
			$("div#dz").removeClass('error').removeClass('info').addClass('success');
			return 0;
	}
}
function checksex(){
	if($(":radio[name='sex']:checked").val()!=='男'){
		if($(":radio[name='sex']:checked").val()!=='女'){
			$("div#sex").removeClass('success').removeClass('info').addClass('error');
			return 1
		}else{
			$("div#sex").removeClass('error').removeClass('info').addClass('success');
			return 0
		}
	}else{
		$("div#sex").removeClass('error').removeClass('info').addClass('success');
		return 0
	}
}
function checkxs(){
	if($(":radio[name='xs']:checked").val()!=='是'){
		if($(":radio[name='xs']:checked").val()!=='否'){
			$("div#xs").removeClass('success').removeClass('info').addClass('error');
			return 1
		}else{
			$("div#xs").removeClass('error').removeClass('info').addClass('success');
			return 0
		}
	}else{
		$("div#xs").removeClass('error').removeClass('info').addClass('success');
		return 0
	}
}
function check(a){
	$("#submit").attr('disabled',"true");
	e=0;
	e=e+checkName();
	e=e+checksex();
	e=e+checkxs();
	e=e+checkNum(1);
	e=e+checksNum(1);
	e=e+checkqNum(1);
	if(a==1){
		e=e+checkdq();
		e=e+checkdq1();
		e=e+checkcol(1,2);
		e=e+checkzy(2);
		e=e+checkdz();
		$("div#id").removeClass('error').removeClass('info').addClass('success');
		$("div#shijian").removeClass('error').removeClass('info').addClass('success');
		
	}else{
		e=e+checkgx();
		e=e+checkcol(1,1);
		e=e+checkzy(1);
	}
	$("div#beizhu").removeClass('error').removeClass('info').addClass('success');
	if(e!==0 || numback ==1 || qnumback == 1 || snumback == 1){
		$("#info").removeClass('text-info').addClass('text-error');
		$("#info").html('请检查并更正所有错误！');
		$("#submit").removeAttr('disabled');
	}else{
		$("#info").removeClass('text-error').addClass('text-info');
		$("#info").html('正在提交报名数据，请稍候……');
		if(a==1){
			if($("select#diqu").find("option:selected").text() == '其他'){
				var dq = $("input#diqu1").val()
			}else{
				var dq = $("select#diqu").find("option:selected").text()
			}
			$.post('/xsy/index.php?m=Baoming&a=step2',{
				name:$("input#name").val(),
				sex:$(":radio[name='sex']:checked").val(),
				mobilNum:$("input#mobilNum").val(),
				smobilNum:$("input#smobilNum").val(),
				qqNum:$("input#qqNum").val(),
				xs:$(":radio[name='xs']:checked").val(),
				college:$("select#college").val(),
				zhuanye:$("select#zhuanye").find("option:selected").text(),
				diqu:dq,
				shijian:$("select#shijian").val(),
				dz:$("select#dz").find("option:selected").text(),
				beizhu:$("textarea#beizhu").val()
			},function(data){
				if(data.status<0){
					alert(data.info+"   错误代码："+data.status)
					$("#info").removeClass('text-info').addClass('text-error');
					$("#info").html(data.info);
					$("#submit").removeAttr('disabled');
				}else{
					$("#info").removeClass('text-info').removeClass('text-error').addClass('text-success');
					$("#info").html('报名成功，页面即将跳转……');
					self.parent.window.location.reload();
				}
				
			})
		}else{
			$.post('/xsy/index.php?m=Baoming&a=step4',{
				name:$("input#name").val(),
				sex:$(":radio[name='sex']:checked").val(),
				mobilNum:$("input#mobilNum").val(),
				smobilNum:$("input#smobilNum").val(),
				qqNum:$("input#qqNum").val(),
				xs:$(":radio[name='xs']:checked").val(),
				college:$("select#college").val(),
				zhuanye:$("select#zhuanye").find("option:selected").text(),
				gx:$("input#guanxi").val(),
				beizhu:$("textarea#beizhu").val()
			},function(data){
				if(data.status<0){
					alert(data.info+"   错误代码："+data.status)
					$("#info").removeClass('text-info').addClass('text-error');
					$("#info").html(data.info);
					$("#submit").removeAttr('disabled');
				}else{
					$("#info").removeClass('text-info').removeClass('text-error').addClass('text-success');
					$("#info").html('添加成功，页面即将跳转……');
					self.parent.window.location.reload();
				}
				
			})
		}
	}
}
