<?php if (!defined('THINK_PATH')) exit();?><form id="form" name="form" method="post" action="__APP__?m=Edit&a=addadmin" class="form-inline">
    <input type="text" class="input-small" placeholder="红满堂UID" name="uid" id="uid">
    <select name="qx" id="qx">
      <option value="2" selected="selected">修改公告</option>
      <option value="3">+导出报名记录</option>
      <option value="4">+修改报名状态</option>
      <option value="5">+添加删除管理员</option>
    </select>
    <input type="submit" name="tj" id="tj" value="提交" class="btn"/>
</form>
<h3>查看管理员列表</h3>
<table width="100%%" border="1" class="table table-bordered table-hover">
  <tr>
    <th scope="col">红满堂ID</th>
    <th scope="col">红满堂UID</th>
    <th scope="col">权限</th>
    <th scope="col">操作</th>
  </tr>
  <?php if(is_array($data)): $i = 0; $__LIST__ = $data;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$data): $mod = ($i % 2 );++$i;?><tr>
    <td><a href="http://hometown.scau.edu.cn/bbs/home.php?mod=space&uid=<?php echo ($data["uid"]); ?>"><?php echo ($data["uname"]); ?></a></td>
    <td><?php echo ($data["uid"]); ?></td>
    <td><?php if($data["class"] >= 2): ?>修改公告<?php endif; if($data["class"] >= 3): ?>&nbsp;+&nbsp;导出报名记录<?php endif; if($data["class"] >= 4): ?>&nbsp;+&nbsp;修改报名状态<?php endif; if($data["class"] >= 5): ?>&nbsp;+&nbsp;添加删除管理员<?php endif; ?>（<?php echo ($data["class"]); ?>）</td>
    <td align="center"><a href="#" onclick="confirmD('__APP__?m=Edit&a=deladmin&id=<?php echo ($data["id"]); ?>','你确定要删除这名管理员吗？')" class="btn btn-danger btn-small">删除</a></td>
  </tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<p>&nbsp;</p>