<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<script src="__PUBLIC__/Js/jQuery.js"></script>
<script src="__PUBLIC__/Js/zhuanye.js?<?php echo mktime(); ?>"></script>
<script src="__PUBLIC__/Js/check.js?<?php echo mktime(); ?>"></script>
<script src="__PUBLIC__/Js/bootstrap.js"></script>
<link href="__PUBLIC__/Css/bootstrap.css" rel="stylesheet" media="screen">
<link href="__PUBLIC__/Css/bootstrap-responsive.css" rel="stylesheet" media="screen">
<!--[if lte IE 6]>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/bootstrap-ie6.css">
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/ie.css">
<script type="text/javascript" src="__PUBLIC__/Js/bootstrap-ie.js"></script>
<![endif]-->

<form action="__APP__?m=Baoming&a=step4" class="form-horizontal" id="bm">
<div class="control-group" id="name">
	<label for="name" class="control-label">姓名</label>
    <div class="controls">
    	<input name="name" type="text" id="name" tabindex="1" maxlength="5" onBlur="checkName()"/>
        <span class="help-inline" id="name">(必填，请填写真实姓名)</span>
    </div>
</div>
<div class="control-group" id="sex">
	<label for="sex" class="control-label">性别</label>
    <div class="controls">
    	<label class="radio inline"><input name="sex" type="radio" value="男" tabindex="2" id="sex1"/> 男</label>
        <label class="radio inline"><input name="sex" type="radio" value="女" tabindex="2" id="sex2"/> 女</label>
    </div>
</div>
<div class="control-group" id="xs">
	<label for="xs" class="control-label">是否为新生</label>
    <div class="controls">
    	<label class="radio inline"><input name="xs" type="radio" value="是" tabindex="3" onchange="checkxsT()" id="xs1"/> 是</label>
        <label class="radio inline"><input name="xs" type="radio" value="否" tabindex="3" onchange="checkxsF()" id="xs2"/> 否</label>
	</div>
</div>
<div class="control-group" id="mobilNum">
	<label for="mobilNum" class="control-label">手机号码</label>
    <div class="controls">
    	<input name="mobilNum" type="text" id="mobilNum" tabindex="4" maxlength="11" onBlur="checkNum()"/>
        <span class="help-inline" id="mobilNum">(必填)</span>
    </div>
</div>
<div class="control-group" id="smobilNum">
	<label for="smobilNum" class="control-label">华农短号</label>
    <div class="controls">
		<input name="smobilNum" type="text" id="smobilNum" tabindex="5" maxlength="8" onBlur="checksNum()"/>
        <span class="help-inline" id="smobilNum">(选填，华农短号开通方法请点击<a href="http://hometown.scau.edu.cn/bBS/forum.php?mod=redirect&goto=findpost&ptid=92849&pid=1423674&fromuid=294940" target="new">这里</a>)</span>
    </div>
</div>
<div class="control-group" id="qqNum">
	<label for="qqNum" class="control-label">QQ号码</label>
    <div class="controls">
    	<input name="qqNum" type="text" id="qqNum" tabindex="6" maxlength="12" onBlur="checkqNum()"/>
        <span class="help-inline" id="qqNum">(必填)</span>
    </div>
</div>
<div class="control-group" id="college">
	<label for="college" class="control-label">录取学院</label>
    <div class="controls">
      <select name="college" tabindex="7" onChange="checkcol(0,1)" class="college" id="college">
          <option value="error" selected>请选择</option>
          <option name="经济管理学院">经济管理学院
          <option name="外国语学院">外国语学院
          <option name="水利与土木工程学院">水利与土木工程学院
          <option name="理学院">理学院
          <option name="农学院">农学院
          <option name="兽医学院">兽医学院
          <option name="人文与法学学院">人文与法学学院
          <option name="生命科学学院">生命科学学院
          <option name="信息学院、软件学院">信息学院、软件学院
          <option name="食品学院">食品学院
          <option name="园艺学院">园艺学院
          <option name="动物科学学院">动物科学学院
          <option name="公共管理学院">公共管理学院
          <option name="工程学院">工程学院
          <option name="资源环境学院">资源环境学院
          <option name="林学院">林学院
          <option name="艺术学院">艺术学院
          <option name="学院未知">学院未知
          <option>非华农人</option>
      </select>
        <span class="help-inline">(新生及在校生必选，13级<a href="http://zsb.scau.edu.cn/wenzi/2013pglqcx.htm" target="new">查询</a>)</span></div>
</div>
<div class="control-group" id="zhuanye">
	<label for="zhuanye" class="control-label">录取专业</label>
    <div class="controls" id="zhuanye2">
   	  <select name="zhuanye" id="zhuanye" tabindex="8" onchange="checkzy(1)">
            <option value="error">请选择</option>
        </select>
    	<span class="help-inline">(新生及在校生必选，13级<a href="http://zsb.scau.edu.cn/wenzi/2013pglqcx.htm" target="new">查询</a>)</span></div>
</div>
<div class="control-group" id="guanxi">
	<label for="guanxi" class="control-label">与报名人的关系</label>
    <div class="controls">
    	<input name="guanxi" type="text" id="guanxi" tabindex="9" maxlength="10" onBlur="checkgx()">
        <span class="help-inline" id="guanxi">(必填)</span>
    </div>
</div>
<div class="control-group" id="beizhu">
	<label for="beizhu" class="control-label">备注</label>
    <div class="controls">
    	<textarea name="beizhu" id="beizhu" cols="30" rows="5" tabindex="12" maxlength="150"></textarea>
        <span class="help-inline" id="beizhu">(选填，还有什么想要告诉薯藤队长的吗？<br />可以写在这里哦，限填150字)</span>
    </div>
</div>
<div class="form-actions">
	<button type="button" class="btn btn-primary" id="submit" onclick="check(2)" tabindex="13">提交</button><span id="info"></span>
</div>
</form>