<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:62:"D:\www\tp\elian\public/../application/admin\view\temp\lst.html";i:1505926576;s:65:"D:\www\tp\elian\public/../application/admin\view\public\meta.html";i:1504623373;s:63:"D:\www\tp\elian\public/../application/admin\view\temp\menu.html";i:1505926576;}*/ ?>
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
    <div class="wrapper">
        <div class="innerpage pageheight">
            <div class="wrapper container-fluid pageheight">
                <div class="sidebar2">
    <ul>
        <li><a class="homelink"><i class="fa fa-home"></i><span>HOME</span></a></li>
        <li>
            <a href="<?php echo url('temp/lst'); ?>">
                            <i class="fa fa-users"></i><span>模板列表</span>
                        </a>
        </li>
        <li>
            <a href="<?php echo url('temp/add'); ?>">
                            <i class="fa fa-users"></i><span>添加模板</span>
                        </a>
        </li>
        <li>
            <a href="<?php echo url('temp/copy'); ?>">
                            <i class="fa fa-users"></i><span>复制模板</span>
                        </a>
        </li>
        <li>
            <a href="<?php echo url('temp/tplset'); ?>">
                            <i class="fa fa-users"></i><span>模板设置</span>
                        </a>
        </li>
        <li>
            <a href="<?php echo url('temp/set'); ?>">
                            <i class="fa fa-users"></i><span>模块设置</span>
                        </a>
        </li>
    </ul>
    <div class="logout">
        <img src="__ADMIN__/images/logo-eg.jpg" alt="用户头像">
        <a class="logoutfunc" href="<?php echo url('admin/logout2'); ?>"><span>退出登录</span></a>
    </div>
</div>
<div class="page-summary">
    <div class="userinfo">
        <img src="__ADMIN__/images/logo-eg.jpg" alt="">
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
                        <a href="#" class="homelink">首页</a> > 模板列表
                    </div>
                    <div class="body">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="panel-title">模板列表 <a href="<?php echo url('add'); ?>" class="btn btn-info btn-xs">添加</a></h2>
                            </div>
                            <div class="panel-body">
                                <div class="row" style="margin-bottom:15px">
                                    <div class="col-md-12">行业：<a href="<?php echo url('lst'); ?>">不限 </a>　<?php if(is_array($industry) || $industry instanceof \think\Collection || $industry instanceof \think\Paginator): $i = 0; $__LIST__ = $industry;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?> <a href="<?php echo url('lst',array('industry_id'=>$vo['id'])); ?>"><?php echo $vo['industry']; ?> </a> 　<?php endforeach; endif; else: echo "" ;endif; ?></div>
                                </div>
                                <div class="row">
                                    <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                    <div class="col-md-3" style="margin-bottom:15px">
                                        <dl>
                                            <dt><img src="<?php echo $vo['thumb']; ?>" alt="" class="img-rounded tplimg"></dt>
                                            <dd class="text-center" style="margin-bottom:5px;">
                                                <a href="<?php echo url('temp/view',array('id'=>$vo['id'])); ?>" class="btn btn-primary btn-xs">浏览</a>
                                                <a href="<?php echo url('temp/edit',array('id'=>$vo['id'])); ?>" class="btn btn-warning btn-xs">编辑</a>
                                                <a href="<?php echo url('temp/setall',array('id'=>$vo['id'])); ?>" class="btn btn-default btn-xs">设置</a>
                                            </dd>
                                            <dd class="text-center"><?php echo $vo['tempname']; ?></dd>
                                        </dl>
                                    </div>
                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <div class="fr">
                                    <?php echo $list->render(); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
