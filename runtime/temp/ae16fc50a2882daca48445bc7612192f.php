<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:70:"D:\www\tp\elian\public/../application/member\view\member_conf\add.html";i:1505453759;s:66:"D:\www\tp\elian\public/../application/member\view\public\meta.html";i:1505446123;s:71:"D:\www\tp\elian\public/../application/member\view\member_conf\menu.html";i:1505455073;}*/ ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>后台</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<link href="__MEMBER__/css/font-awesome.min.css" rel="stylesheet">
<link rel="stylesheet" href="__MEMBER__/css/jquery.fullPage.css">
<link href="__MEMBER__/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="__MEMBER__/layui/css/layui.css">
<link rel="stylesheet" href="__MEMBER__/css/beauty-bootstrap.css">
<link rel="stylesheet" href="__MEMBER__/css/starwood.css">
<script src="__MEMBER__/js/jquery.min.js?ver1.9.1"></script>
<script src="__MEMBER__/js/jquery.nicescroll.js"></script>
<script src="__MEMBER__/js/jquery.fullPage.min.js"></script>
<script src="__MEMBER__/js/bootstrap.min.js"></script>
<script src="__MEMBER__/layui/layui.js"></script>
<script src="__MEMBER__/js/Validform_v5.3.2_ncr_min.js"></script>
<script src="__MEMBER__/js/app.js"></script>
<!--[if lt IE 9]>
 <script src="__MEMBER__/js/html5shiv.js"></script>
 <script src="__MEMBER__/js/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <div class="wrapper">
        <div class="innerpage pageheight">
            <div class="wrapper container-fluid pageheight">
                <div class="sidebar2">
    <ul>
        <li><a class="homelink"><i class="fa fa-home"></i><span>HOME</span></a></li>
        <li><a href="<?php echo url('member_conf/conf'); ?>"><i class="fa fa-cog"></i><span>配置前台</span></a></li>
        <li><a href="<?php echo url('member_conf/lst'); ?>"><i class="fa fa-cogs"></i><span>配置后台列表</span></a></li>
        <li><a href="<?php echo url('member_conf/add'); ?>"><i class="fa fa-plus"></i><span>添加配置后台</span></a></li>
    </ul>
    <div class="logout">
        <img src="__MEMBER__/images/logo-eg.jpg" alt="用户头像">
        <a class="logoutfunc" href="<?php echo url('admin/logout2'); ?>"><span>退出登录</span></a>
    </div>
</div>
<div class="page-summary">
    <div class="userinfo">
        <img src="__MEMBER__/images/logo-eg.jpg" alt="">
        <a class="logoutfunc" href="<?php echo url('admin/logout2'); ?>"><span><?php echo \think\Request::instance()->session('username'); ?><small>退出登录</small></span></a>
    </div>
    <div class="summary">
        <h2>SUMMARY</h2>
        <div class="summary-count">
            <dl>
                <dt><?php echo $menu['agentsum']; ?></dt>
                <dd>代理数</dd>
            </dl>
            <dl>
                <dt><?php echo $menu['agentsum2']; ?></dt>
                <dd>付费数</dd>
            </dl>
        </div>
        <div class="summary-count">
            <dl>
                <dt><?php echo $menu['allpay']; ?></dt>
                <dd>代理总充值</dd>
            </dl>
            <dl>
                <dt><?php if($menu['today_pay'] == 0): ?>0<?php else: ?><?php echo $menu['today_pay']; endif; ?></dt>
                <dd>今日充值</dd>
            </dl>
        </div>
        <div class="summary-balance">
            <dl>
                <dt><?php if($menu['agent_member_sum'] == 0): ?>0<?php else: ?><?php echo $menu['agent_member_sum']; endif; ?></dt>
                <dd>代理总会员数</dd>
            </dl>
        </div>
        <div class="scount">
            <div class="heartgroup">
                <i class="fa fa-heart"></i>
                <i class="fa fa-heartbeat"></i>
                <i class="fa fa-heart"></i>
            </div>
            <dl>
                <dt><?php if($menu['today_logins'] == 0): ?>0<?php else: ?><?php echo $menu['today_logins']; endif; ?></dt>
                <dd>代理今日登陆</dd>
            </dl>
        </div>
        <div class="percentage">
            <h2>代理平台销售比</h2>
            <h2>平台销售<div class="layui-progress">
  <div class="layui-progress-bar layui-bg-green" lay-percent="<?php echo $menu['company_mem_per']; ?>%"></div>
</div></h2>
            <h2>代理销售<div class="layui-progress">
  <div class="layui-progress-bar layui-bg-orange" lay-percent="<?php echo $menu['agent_mem_per']; ?>%"></div>
</div></h2>
        </div>
    </div>
</div>

                <div class="page-content">
                    <div class="bread">
                        <i class="icon-home"></i>
                        <a href="#" class="homelink">首页</a> > 添加配置后台
                    </div>
                    <div class="body">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="panel-title">添加配置后台</h2>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" action="" method="post">
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">中文名称</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="" name="cnname" type="text" required=''>
                                        </div>
                                        <p class="help-block col-sm-4 red">* 必填</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">英文名称</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="" name="enname" type="text" required=''>
                                        </div>
                                        <p class="help-block col-sm-4 red">* 必填</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">配置类型</label>
                                        <div class="col-sm-6">
                                            <select name="type" class="form-control">
                                                <option value="0">请选择</option>
                                                <option value="1">单行文本</option>
                                                <option value="2">多行文本</option>
                                                <option value="3">单选按钮</option>
                                                <option value="4">复选框</option>
                                                <option value="5">下拉菜单</option>
                                            </select>
                                        </div>
                                        <p class="help-block col-sm-4 red">* 必填</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">可选值</label>
                                        <div class="col-sm-6">
                                            <textarea name="values" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-default">保存信息</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
