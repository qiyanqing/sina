<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>增加微博分类</title>
</head>
<body>
	<form action="<?php echo U('admin/category/handleadd');?>" method="post" enctype="multipart/form-data">
	分类 :<select name="parent">
			<option value="0">顶级分类</option>
			<?php foreach($category as $v) { ?>
			<?php echo ($v); ?>
			<?php } ?> 
		</select>
		<br><br>
	名字 :
		<input type="text" name="name"><br>
		<br><br>
	logo :
		<input type="file" name="logo"><br>
		<br><br>
		<input type="submit" name=""><br>
	</form>
</body>
</html>