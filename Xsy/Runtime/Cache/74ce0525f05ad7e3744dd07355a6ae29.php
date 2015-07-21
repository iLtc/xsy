<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script src="__PUBLIC__/Js/jQuery.js"></script>
<script src="__PUBLIC__/Js/zhuanye.js"></script>
<script src="__PUBLIC__/Js/check.js"></script>
<script src="__PUBLIC__/Js/bootstrap.js"></script>
<link href="__PUBLIC__/Css/bootstrap.css" rel="stylesheet" media="screen">
<link href="__PUBLIC__/Css/bootstrap-responsive.css" rel="stylesheet" media="screen">
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/bootstrap-ie6.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/ie.css">
<script type="text/javascript" src="__PUBLIC__/Js/bootstrap-ie.js"></script>
<![endif]-->
<script src="__PUBLIC__/Js/jQuery.js"></script>
<script>
$(document).ready(function(){
	$(".login").click(function(){
		if($("#username").val()=='' || $("#password").val()==''){
			alert("请输入用户名和密码！");
		}else{
			$("#login").css('display','none');
			$("#info").css('display','block');
			$("#info").html('登录中……');
			var name=$("input#username").val();
			var pass=$("input#password").val();
			$.post('__APP__?m=Uc&a=login1',{username:name,password:pass},function(data){
				if(data.status<0){
					alert(data.info);
					$("#info").css('display','none');
					$("#login").css('display','block');
				}else{
					$("#info").html('登录成功，页面即将跳转……');
					self.parent.window.location.reload();
				}
			})
		}
	})
})
</script>
<div id="login">
<form name="login" class="form-inline">
<input type="text" name="username" id="username" tabindex="1" class="input-small" placeholder="红满堂账户"/>
<input name="password" type="password" id="password" tabindex="2" class="input-small" placeholder="密码"/>
<button class="login btn" type="button">登录</button>
</form>
</div>
<div id="info" style="display:none"></div>