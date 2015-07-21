<?php if (!defined('THINK_PATH')) exit();?><table width="100%" class="table table-bordered table-hover table-condensed" border="1">
  <tr>
    <td width="20%"><strong>报名编号：</strong><?php echo ($duiwu["groupid"]); ?></td>
    <td width="20%"><strong>ID：</strong><a href="http://hometown.scau.edu.cn/bbs/home.php?mod=space&amp;uid=<?php echo ($duiwu["uid"]); ?>"><?php echo ($duiwu["uname"]); ?></a></td>
    <td width="20%"><strong>UID：</strong><?php echo ($duiwu["uid"]); ?></td>
    <td width="20%"><strong>地区：</strong><?php echo ($duiwu["diqu"]); ?></td>
    <td width="20%"><strong>离开时间：</strong><?php echo ($duiwu["shijian"]); ?></td>
  </tr></table>
<table width="100%%" border="1" class="table table-bordered table-hover table-condensed">
  <tr>
    <th width="6%" scope="col" style="text-align: center">姓名</th>
    <th width="4%" scope="col" style="text-align: center">性别</th>
    <th width="4%" scope="col" style="text-align: center">新生</th>
    <th width="8%" scope="col" style="text-align: center">QQ号码</th>
    <th width="7%" scope="col" style="text-align: center">短号</th>
    <th width="9%" scope="col" style="text-align: center">手机号码</th>
    <th width="12%" scope="col" style="text-align: center">学院</th>
    <th width="14%" scope="col" style="text-align: center">专业</th>
    <th width="10%" scope="col" style="text-align: center">关系</th>
    <th width="8%" scope="col" style="text-align: center">得知</th>
    <th width="14%" scope="col" style="text-align: center">备注</th>
    <th width="5%" scope="col" style="text-align: center">操作</th>
  </tr>
  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
  <td style="text-align: center">&nbsp;<?php echo ($data["name"]); ?></td>
  <td style="text-align: center">&nbsp;<?php echo ($data["sex"]); ?></td>
  <td style="text-align: center">&nbsp;<?php echo ($data["xs"]); ?></td>
  <td style="text-align: center">&nbsp;<?php echo ($data["qqNum"]); ?></td>
  <td style="text-align: center">&nbsp;<?php echo ($data["smobilNum"]); ?></td>
  <td style="text-align: center">&nbsp;<?php echo ($data["mobilNum"]); ?></td>
  <td style="text-align: center">&nbsp;<?php echo ($data["college"]); ?></td>
  <td style="text-align: center">&nbsp;<?php echo ($data["zhuanye"]); ?></td>
  <td style="text-align: center">&nbsp;<?php echo ($data["guanxi"]); ?></td>
  <td style="text-align: center">&nbsp;<?php echo ($data["dz"]); ?></td>
  <td style="text-align: center">&nbsp;<?php echo ($data["beizhu"]); ?></td>
  <td style="text-align: center"><?php if($data["guanxi"] != '报名人'): ?><a class="btn btn-danger btn-small" onclick="confirmD('__APP__?m=Del&a=tb&id=<?php echo ($data["id"]); ?>&num=<?php echo ($data["mobilNum"]); ?>','确定要删除这位同伴吗？')">删除</a><?php endif; ?></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<p style="text-align: right">此组共计&nbsp;<?php echo ($num); ?>&nbsp;人&nbsp;&nbsp;&nbsp;<a class="btn btn-danger btn-small" onclick="confirmD('__APP__?m=Del&a=z&uname=<?php echo ($duiwu["uname"]); ?>&uid=<?php echo ($duiwu["uid"]); ?>','确定要删除这一组吗？')">删除</a></p>