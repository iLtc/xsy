<?php if (!defined('THINK_PATH')) exit();?><style type="text/css">
h1 {
	font-size: 24px;
}
</style>
	<style>
	#page-wrap .button {
		font-size:24px;
	}
	#page-wrap div {
		white-space:normal;
	}
	#page-wrap {
/*		width: 1050px;
		margin: 10px 50px;
		padding: 20px;*/
	}
	a.bm123 {
		color:#000;
		text-decoration:none
	}
	#baoming {
		display: block;
		padding: 30px;
	}
	</style>
<script src="__PUBLIC__/Js/colorbox.js"></script>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/colorbox.css" />
<script>
$(document).ready(function(){
	$(".login").colorbox({iframe:true,width:"360px", height:"100px",scrolling:false,close:"关闭"});
	$(".bm123").colorbox({iframe:true,width:"780px", height:"630px",close:"关闭"});
	$(".tongban").colorbox({iframe:true,width:"820px", height:"630px",close:"关闭"});
	if('<?php echo ($kaiguan); ?>'=='T'){
		$('#gonggao').css('display','block');
	}
})
function confirmD(delUrl,msg) {
  if (confirm(msg)) {
    document.location = delUrl;
  }
}
</script>

<div id="background">
	<div id="page-wrap">
		
		<div id="content">
		  <div id="baoming">
           	  <?php if($pub["uid"] != ''): if($pub["zt"] != 'T'): ?><div class="nfl" id="main_succeed">
<div class="f_c altw">
<div class="alert_right">
<p id="succeedmessage">欢迎，<?php echo ($name); ?>！您已具备了报名新生游活动的条件！</p>
<p id="succeedlocation" class="alert_btnleft">&nbsp;</p>
<p class="alert_btnleft"><a href="__APP__?m=Baoming&a=step1" class="bm123 pn pnc">立即报名</a></p>
</div>
</div>
</div>
					<?php else: ?>

<div class="alert alert-info" style="display:none" id="gonggao">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<h4><?php echo ($biaoti); ?></h4>
	<?php echo ($neirong); ?>
</div>

						<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">&times;</button><p>欢迎，<?php echo ($name); ?>！您已成功报名！您的报名编号是：<?php echo ($Data1["groupid"]); ?></p></div>
					  <p>以下是您的报名信息：</p>
<table width="90%" border="1" align="center" class="table table-bordered table-hover table-condensed">
      <tr>
        <td width="10%"><strong>姓名</strong></td>
        <td width="20%"><?php echo ($Data1["name"]); ?></td>
        <td width="10%"><strong>性别</strong></td>
        <td><?php echo ($Data1["sex"]); ?></td>
        <td width="10%"><strong>论坛ID</strong></td>
        <td width="20%"><?php echo ($Data1["uname"]); ?></td>
      </tr>
      <tr>
        <td><strong>手机号码</strong></td>
        <td><?php echo ($Data1["mobilNum"]); ?></td>
        <td><strong>华农短号</strong></td>
        <td><?php echo ($Data1["smobilNum"]); ?></td>
        <td><strong>QQ号码</strong></td>
        <td><?php echo ($Data1["qqNum"]); ?></td>
      </tr>
      <tr>
        <td><strong>是否为新生</strong></td>
        <td><?php echo ($Data1["xs"]); ?></td>
        <td><strong>录取学院</strong></td>
        <td width="20%"><?php echo ($Data1["college"]); ?></td>
        <td><strong>录取专业</strong></td>
        <td><?php echo ($Data1["zhuanye"]); ?></td>
      </tr>
      <tr>
        <td><strong>所在地区</strong></td>
        <td><?php echo ($Data1["diqu"]); ?></td>
        <td><strong>离开时间</strong></td>
        <td><?php echo ($Data1["shijian"]); ?></td>
        <td><strong>操作</strong></td>
        <td><a href="#" onClick="javascript:confirmD('__APP__?m=Edit&a=quxiao','您确定要取消报名吗？')" class="btn btn-danger btn-mini"> 取消报名</a></td>
      </tr>
</table>
						<p>以下是您的小伙伴信息： </p>
<table width="100%%" border="1" class="table table-bordered table-hover table-condensed">
      <tr>
        <th scope="col"><strong>姓名</strong></th>
        <th scope="col"><strong>性别</strong></th>
        <th scope="col"><strong>QQ号码</strong></th>
        <th scope="col"><strong>手机号码</strong></th>
        <th scope="col"><strong>华农短号</strong></th>
        <th scope="col"><strong>是否为新生</strong></th>
        <th scope="col"><strong>录取学院</strong></th>
        <th scope="col"><strong>录取专业</strong></th>
        <th scope="col"><strong>操作</strong></th>
      </tr>
      <?php if(is_array($Data2)): $i = 0; $__LIST__ = $Data2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
        <td style="text-align: center">&nbsp;<?php echo ($data["name"]); ?></td>
        <td style="text-align: center">&nbsp;<?php echo ($data["sex"]); ?></td>
        <td style="text-align: center">&nbsp;<?php echo ($data["qqNum"]); ?></td>
        <td style="text-align: center">&nbsp;<?php echo ($data["mobilNum"]); ?></td>
        <td style="text-align: center">&nbsp;<?php echo ($data["smobilNum"]); ?></td>
        <td style="text-align: center">&nbsp;<?php echo ($data["xs"]); ?></td>
        <td style="text-align: center">&nbsp;<?php echo ($data["college"]); ?></td>
        <td style="text-align: center">&nbsp;<?php echo ($data["zhuanye"]); ?></td>
        <td style="text-align: center"><a href="#" onClick="javascript:confirmD('__APP__?m=Edit&a=del&id=<?php echo ($data["id"]); ?>&check=<?php echo ($data["check"]); ?>','您确定要删除这位同伴吗？')" class="btn btn-danger btn-mini">删除</a></td>
      </tr><?php endforeach; endif; else: echo "" ;endif; ?>
       <tr>
        <td colspan="9" style="text-align: center"><a href="__APP__?m=Baoming&a=step3" class="tongban btn btn-primary"><?php echo ($pub["info"]); ?></a></td>
        </tr>
</table>
    <div class="alert alert-info">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <h4>你知道吗?</h4>
    我们需要统计每一位新生游活动参与者的资料，便于分组、安排饮食等，如果你不想和你的小伙伴分开，请在这里为他们添加资料，而不是让他们单独报名~
    </div><?php endif; ?>
                <?php else: ?>
                <div class="nfl" id="main_message">
<div class="f_c altw">
<div id="messagetext" class="alert_info">
<p>抱歉，您尚未登录，不能报名新生游活动！</p>
</div>
<div id="messagelogin">
<p>&nbsp;</p>
  <p>要开始报名新生游活动,请先<button class="pn pnc" id="registerformsubmit" type="submit" name="regsubmit" value="true" tabindex="1" onClick="window.location='http://hometown.scau.edu.cn/bbs/member.php?mod=logging&action=login&referer=../2013/index.php'"><strong>用红满堂社区账户登录</strong></button>
  </p>
					
					<p>反复看到这个提示？ </p>
					<ul>
						<li>请确认：您的浏览器开启了Cookies和JavaScript功能</li>
						<li>请尝试：回到<a href="http://hometown.scau.edu.cn/bbs">红满堂社区</a>，退出您的帐号并重新登录，然后再<a href="javascript:location.reload();">刷新</a>此页面查看</li>
						<li>或者：您可以尝试使用<a href="__APP__?m=Uc&a=login" class="login">备用入口</a>登录</li>
				  </ul></div>
</div>
</div><?php endif; ?>
		  </div>
	  </div>
  </div>
</div>