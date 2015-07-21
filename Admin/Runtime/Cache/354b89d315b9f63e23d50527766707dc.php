<?php if (!defined('THINK_PATH')) exit();?><html lang="en">
<head>
<title>红满堂新生游报名系统-管理页面</title>
<link href="__PUBLIC__/Css/bootstrap.css" rel="stylesheet" media="screen">
<link href="__PUBLIC__/Css/bootstrap-responsive.css" rel="stylesheet" media="screen">
<script type="text/javascript" src="__PUBLIC__/Js/jQuery.js"></script>
<script src="__PUBLIC__/Js/bootstrap.js"></script>
<script>
function confirmD(delUrl,msg) {
  if (confirm(msg)) {
    document.location = delUrl;
  }
}
</script>
<style>
	body {
		padding-top: 60px; /* 60px to make the container go all the way to the bottom of the topbar */
	}
</style>
</head>
<div class="navbar navbar-fixed-top">
<div class="navbar-inner">
<a class="brand"><strong>红满堂新生游报名系统-管理页面</strong></a>
<ul class="nav">
<li class="<?php if($type == 1): ?>active<?php endif; ?>"><a href="__APP__">首页</a></li>
<?php if($class >= 2): ?><li class="<?php if($type == 2): ?>active<?php endif; ?>"><a href="__APP__?m=Gonggao">修改公告</a></li><?php endif; ?>
<?php if($class >= 3): ?><li class="<?php if($type == 3): ?>active<?php endif; ?>"><a href="__APP__?m=View">查看报名记录</a></li><?php endif; ?>
<?php if($class >= 4): ?><li class="<?php if($type == 4): ?>active<?php endif; ?>"><a href="__APP__?m=Edit&a=zt">修改系统设置</a></li><?php endif; ?>
<?php if($class >= 5): ?><li class="<?php if($type == 5): ?>active<?php endif; ?>"><a href="__APP__?m=Edit&a=admin">添加、删除管理员</a></li><?php endif; ?>
<li><a href="http://hometown.scau.edu.cn/2013/">返回前台</a></li>
</ul>
</div>
</div>
<div class="container">