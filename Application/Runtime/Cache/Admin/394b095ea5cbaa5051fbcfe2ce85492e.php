<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>广告列表</title>
</head>
<body>
<table border="1" cellspacing="0" cellpadding="0">
	<tr>
		<td>id</td>
		<td>图片</td>
		<td>跳转地址</td>
		<td>类型</td>
		<td>创建时间</td>
		<td>操作</td>
	</tr>
	<?php  foreach($a as $value) { ?>
	<tr>
		<td><?php echo ($value['id']); ?></td>

		<td><img src="/Public/upload/<?php echo ($value['ad_img']); ?>" height="100px" width="100px" ></td>
		<td><?php echo ($value['adress']); ?></td>
		<td><?php echo ($type[$value['type']]['name']); ?></td>
		<td><?php echo ($value['create_time']); ?></td>
		<td><a href="http://sina.wb/index.php/admin/advert/edit?id=<?php echo ($value['id']); ?>">修改</a>
			<a href="http://sina.wb/index.php/admin/advert/delete?id=<?php echo ($value['id']); ?>">删除</a>
		</td>
	</tr>
	<?php  } ?>

</table>
<a href="http://sina.wb/index.php/admin/advert/add">增加</a>
</body>
</html>