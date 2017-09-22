<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:63:"D:\www\tp\elian\public/../application/admin\view\tpl\index.html";i:1506017078;s:65:"D:\www\tp\elian\public/../application/admin\view\public\meta.html";i:1504623373;}*/ ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>后台</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link href="__ADMIN__/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="__ADMIN__/css/jquery.fullPage.css">
<link href="__ADMIN__/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="__ADMIN__/layui/css/layui.css">
<link rel="stylesheet" href="__ADMIN__/css/beauty-bootstrap.css">
<link rel="stylesheet" href="__ADMIN__/css/starwood.css">
<script src="__ADMIN__/js/jquery.min.js?ver1.9.1"></script>
<script src="__ADMIN__/js/jquery.nicescroll.js"></script>
<script src="__ADMIN__/js/jquery.fullPage.min.js"></script>
<script src="__ADMIN__/js/bootstrap.min.js"></script>
<script src="__ADMIN__/layui/layui.js"></script>
<script src="__ADMIN__/js/Validform_v5.3.2_ncr_min.js"></script>
<script src="__ADMIN__/js/app.js"></script>
<!--[if lt IE 9]>
 <script src="__ADMIN__/js/html5shiv.js"></script>
 <script src="__ADMIN__/js/respond.min.js"></script>
<![endif]-->

</head>

<body>
	<div class="box" style="width:600px;margin:0 auto;padding-top:300px;">
   <h1>模板站展示</h1>
   <p>展示只需要正常的代码即可，去除所有编辑时期产生的代码，从数据库中调用，拼接而成</p>
   <br/>根据模板id，显示对应的内容，默认展示id=1的内容
   <br/>浏览页面，无需权限，只有新建模块，或者不继承common
		<br/>展示内容是所有人都可以看的，因此路由必须重新配置，看起来像是根目录的如：
		<br/>tpl-1/index
		<br/>tpl-1/cateid-3
		<br/>tpl-1/article-12.html
		</div>
</body>

</html>
