<?php if (!defined('THINK_PATH')) exit();?><form action="__APP__?m=Gonggao&a=edit" method="post" name="Gonggao" class="form-horizontal">
<div class="control-group" id="sex">
	<label for="kaiguan" class="control-label">公告板状态</label>
    <div class="controls">
    	<label class="radio inline"><input name="kaiguan" type="radio" value="T" tabindex="1" id="kaiguan"/> 开启</label>
        <label class="radio inline"><input name="kaiguan" type="radio" value="F" tabindex="1" id="kaiguan"/> 关闭</label>
    </div>
</div>
<div class="control-group" id="biaoti">
	<label for="biaoti" class="control-label">公告板标题</label>
    <div class="controls">
    	<input name="biaoti" type="text" id="biaoti" tabindex="2" value="<?php echo ($biaoti); ?>" onblur="test()" onkeyup="test()"/>
    </div>
</div>
<div class="control-group" id="neirong">
	<label for="neirong" class="control-label">公告板内容</label>
    <div class="controls">
    	<textarea name="neirong" id="neirong" tabindex="3" onkeyup="test()" onblur="test()"><?php echo ($neirong); ?></textarea>
    </div>
</div>
<div class="form-actions">
	<button type="submit" class="btn btn-primary" id="submit" tabindex="4">提交</button>
</div>
</form>
<div class="alert alert-info" id="test">
    <h4><div id="test1"><?php echo ($biaoti); ?></div></h4>
    <div id="test2"><?php echo ($neirong); ?></div></br>
    (在用户界面上显示的“公告板”还带有关闭按钮，此处省略)
</div>
<script>
function test(){
	if($("input#biaoti").val()==''){
		$("input#biaoti").val('公告板');
	}
	if($("textarea#neirong").val()==''){
		$("textarea#neirong").val('测试内容')
	}
	$("#test1").html($("input#biaoti").val());
	$("#test2").html($("textarea#neirong").val());
}
$(document).ready(function() {
	<?php if($kaiguan == 'T'): ?>$("input[value='T']").attr("checked",'checked');
	<?php else: ?>
		$("input[value='F']").attr("checked",'checked');<?php endif; ?>
});
</script>