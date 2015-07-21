<?php if (!defined('THINK_PATH')) exit();?><table width="100%%" border="1">
  <tr>
    <th scope="col">ID</th>
    <th scope="col">报名编号</th>
    <th scope="col">姓名</th>
    <th scope="col">性别</th>
    <th scope="col">新生</th>
    <th scope="col">手机</th>
    <th scope="col">短号</th>
    <th scope="col">QQ</th>
    <th scope="col">学院</th>
    <th scope="col">专业</th>
    <th scope="col">地区</th>
    <th scope="col">离开时间</th>
    <th scope="col">关系</th>
    <th scope="col">备注</th>
    <th scope="col">TIME</th>
    <th scope="col">IP</th>
    <th scope="col">UNAME</th>
    <th scope="col">UID</th>
  </tr>
  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
    <td><?php echo ($vo["id"]); ?></td>
    <td><?php echo ($vo["groupid"]); ?>&nbsp;</td>
    <td><?php echo ($vo["name"]); ?>&nbsp;</td>
    <td><?php echo ($vo["sex"]); ?>&nbsp;</td>
    <td><?php echo ($vo["xs"]); ?>&nbsp;</td>
    <td><?php echo ($vo["mobilNum"]); ?>&nbsp;</td>
    <td><?php echo ($vo["smobilNum"]); ?>&nbsp;</td>
    <td><?php echo ($vo["qqNum"]); ?>&nbsp;</td>
    <td><?php echo ($vo["college"]); ?>&nbsp;</td>
    <td><?php echo ($vo["zhuanye"]); ?>&nbsp;</td>
    <td><?php echo ($vo["diqu"]); ?>&nbsp;</td>
    <td><?php echo ($vo["shijian"]); ?>&nbsp;</td>
    <td><?php echo ($vo["guanxi"]); ?>&nbsp;</td>
    <td><?php echo ($vo["beizhu"]); ?>&nbsp;</td>
    <td><?php echo ($vo["time"]); ?>&nbsp;</td>
    <td><?php echo ($vo["ip"]); ?>&nbsp;</td>
    <td><?php echo ($vo["uname"]); ?>&nbsp;</td>
    <td><?php echo ($vo["uid"]); ?>&nbsp;</td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>