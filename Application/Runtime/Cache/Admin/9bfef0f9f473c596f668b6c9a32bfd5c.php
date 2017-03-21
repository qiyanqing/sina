<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>分类列表</title>
</head>
<body>
<table border="1" cellpadding="0" cellspacing="0">
	<tr>
		<td>id</td>
		<td>logo</td>
		<td>分类名</td>
		<td>parent_id</td>
		<td>操作</td>
	</tr>
	<?php foreach ($list as $value) { ?>
	<tr>
		<td><?php echo ($value['id']); ?></td>
		<td><?php echo ($value['logo']); ?></td>
		<td><?php echo ($value['name']); ?></td>
		<td><?php echo ($value['parent_id']); ?></td>
		<td><a href="http://sina.wb/index.php/admin/category/edit?id=<?php echo ($value[id]); ?>">修改</a>
			<a href="http://sina.wb/index.php/admin/category/delete?id=<?php echo ($value[id]); ?>">删除</a>
			</td>
	</tr>
	<?php } ?>
</table>
</body>
</html>