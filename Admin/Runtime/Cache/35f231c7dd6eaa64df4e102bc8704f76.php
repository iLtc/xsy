<?php if (!defined('THINK_PATH')) exit();?><div class="pagination  span3">
	<ul>
    	<?php if($page != 1): ?><li><a href="__APP__?m=View&page=<?php echo ($page - 1); ?>&num=<?php echo ($num); ?>&order=<?php echo ($order); ?>">上一页</a></li><?php endif; ?>
        <?php for($i=1;$i<$temp;$i++){ if($i == $page){ echo '<li><a class="active"><strong>'.$i.'</strong></a></li>'; }else{ echo '<li><a href="__APP__?m=View&page='.$i.'&num='.$num.'&order='; if($order=='F'){ echo 'F'; } echo '">'.$i.'</a></li>'; }; } if($page<$temp-1){ echo '<li><a href="__APP__?m=View&page='; echo $page+1 ; echo '&num='.$num.'&order='; if($order=='F'){ echo 'F'; } echo '">下一页</a></li>'; } ?>
</ul>
</div>
<div class="btn-group span3">
	<?php if($order=='F'){ ?>
		<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">倒序排列 <span class="caret"></span></button>
			<ul class="dropdown-menu">
				<li><a href="__APP__?m=View&page=<?php echo ($page); ?>&num=<?php echo ($num); ?>&order=">正序排列</a></li>
			</ul>
    <?php }else{ ?>
		<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">正序排列 <span class="caret"></span></button>
			<ul class="dropdown-menu">
				<li><a href="__APP__?m=View&page=<?php echo ($page); ?>&num=<?php echo ($num); ?>&order=F">倒序排列</a></li>
			</ul>
    <?php } ?>
</div>
<div class="btn-group span3">
	<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">每页显示 <span class="caret"></span></button>
    	<ul class="dropdown-menu">
			<li><a href="__APP__?m=View&page=1&num=5&order=<?php echo ($order); ?>">5</a></li>
			<li><a href="__APP__?m=View&page=1&num=10&order=<?php echo ($order); ?>">10</a></li>
            <li><a href="__APP__?m=View&page=1&num=15&order=<?php echo ($order); ?>">15</a></li>
			<li><a href="__APP__?m=View&page=1&num=20&order=<?php echo ($order); ?>">20</a></li> 
		</ul>
</div>
<div class="btn-group span3">
	<button class="btn btn-primary dropdown-toggle" data-toggle="dropdown">导出数据 <span class="caret"></span></button>
	<ul class="dropdown-menu">
		<li><a href="__APP__?m=Edit&a=daochu1" target="new">出口一</a></li>
		<li><a href="__APP__?m=Edit&a=daochu2" target="new">出口二</a></li>
	</ul>
</div>