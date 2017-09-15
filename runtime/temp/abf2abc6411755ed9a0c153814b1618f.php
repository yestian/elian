<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:69:"D:\www\tp\elian\public/../application/member\view\member_pay\lst.html";i:1505473563;s:66:"D:\www\tp\elian\public/../application/member\view\public\meta.html";i:1505446123;s:70:"D:\www\tp\elian\public/../application/member\view\member_pay\menu.html";i:1505474046;}*/ ?>
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
        <li><a href="<?php echo url('member_pay/add'); ?>"><i class="fa fa-money"></i><span>在线充值</span></a></li>
        <li><a href="<?php echo url('member_pay/lst'); ?>"><i class="fa fa-list"></i><span>订单列表</span></a></li>
        <li><a href="<?php echo url('member_buy/record'); ?>"><i class="fa fa-file-text-o"></i><span>购买记录</span></a></li>
        <li><a href="<?php echo url('member_pay/record'); ?>"><i class="fa fa-file-text-o"></i><span>充值记录</span></a></li>
    </ul>
    <div class="logout">
        <img src="__MEMBER__/images/logo-eg.jpg" alt="用户头像">
        <a class="logoutfunc" href="<?php echo url('MEMBER/logout2'); ?>"><span>退出登录</span></a>
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
                        <a href="#" class="homelink">首页</a> > 订单列表
                    </div>
                    <div class="body">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="panel-title">订单列表</h2>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover text-center">
                                        <tr>
                                            <th width='100px'>订单号</th>
                                            <th>公司名称</th>
                                            <th><a href="<?php echo url('lst',array('fld'=>'money','way'=>'desc')); ?>">充值金额 <i class="fa fa-caret-down"></i></a></th>
                                            <th><a href="<?php echo url('lst',array('fld'=>'payway','way'=>'desc')); ?>">充值方式 <i class="fa fa-caret-down"></i></a></th>
                                            <th><a href="<?php echo url('lst',array('fld'=>'time','way'=>'desc')); ?>">充值时间 <i class="fa fa-caret-down"></a></th>
                                            <th><a href="<?php echo url('lst',array('fld'=>'status','way'=>'desc')); ?>">状态 <i class="fa fa-caret-down"></i></a></th>
                                            <th width='140px'>操作</th>
                                        </tr>
                                       <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                        <tr>
                                            <td></td>
                                            <td><?php echo $vo['company']; ?></td>
                                            <td><?php echo $vo['money']; ?></td>
                                            <td><?php if($vo['payway'] == 0): ?>官方代充<?php elseif($vo['payway'] == 1): ?>支付宝<?php elseif($vo['payway'] == 2): ?>微信<?php elseif($vo['payway'] == 3): ?>银行卡<?php elseif($vo['payway'] == 4): ?>paypal<?php endif; ?></td>
                                            <td><?php echo date("y-m-d H:i:s",$vo['time']); ?></td>
                                            <td>成功</td>
                                            <td>
                                                <a href="<?php echo url('del',array('id'=>$vo['id'])); ?>" class="btn btn-danger btn-sm">删除</a></td>
                                        </tr>
                                       <?php endforeach; endif; else: echo "" ;endif; ?>
                                    </table>
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
