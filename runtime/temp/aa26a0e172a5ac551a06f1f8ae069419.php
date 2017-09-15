<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:64:"D:\www\tp\elian\public/../application/admin\view\member\add.html";i:1504509244;s:65:"D:\www\tp\elian\public/../application/admin\view\public\meta.html";i:1504623373;s:65:"D:\www\tp\elian\public/../application/admin\view\member\menu.html";i:1504509244;}*/ ?>
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
        <li><a href="<?php echo url('member/lst'); ?>"><i class="fa fa-users"></i><span>会员列表</span></a></li>
        <li><a href="<?php echo url('member/add'); ?>"><i class="fa fa-user-plus"></i><span>会员添加</span></a></li>
        <li><a href="<?php echo url('file/lst',array('ctr'=>'Member')); ?>"><i class="fa fa-file-word-o"></i><span>会员文档</span></a></li>
        <li><a href="<?php echo url('member_pay/lst'); ?>"><i class="fa fa-money"></i><span>订单列表</span></a></li>
        <li><a href="<?php echo url('member_buy/lst'); ?>"><i class="fa fa-cny"></i><span>消费记录</span></a></li>
        <li><a href="#"><i class="fa fa-desktop"></i><span>会员站点</span></a></li>
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
                        <a href="#" class="homelink">首页</a> > 添加会员
                    </div>
                    <div class="body">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="panel-title">添加会员</h2>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <form action="" method='post' enctype="multipart/form-data" class="addagent">
                                        <table class="table table-striped table-hover">
                                            <tr>
                                                <th>字段</th>
                                                <th>值</th>
                                            </tr>
                                            <tr>
                                                <td>登录用户名 <span class="text-danger">*</span></td>
                                                <td>
                                                    <input type="text" class="form-control" name="username" datatype="*4-12" errormsg="4-12个字符" placeholder="4-12个字符">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>登录密码 <span class="text-danger">*</span></td>
                                                <td>
                                                    <input type="text" class="form-control" name="password" datatype="*6-30" errormsg="6-30个字符" placeholder="6-30个字符">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>公司名称 <span class="text-danger">*</span></td>
                                                <td>
                                                    <input type="text" class="form-control" name="company" datatype="*4-30" errormsg="4-30个字符" placeholder="4-30个字符">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>绑定域名</td>
                                                <td>
                                                    <input type="text" class="form-control" name='domain' placeholder="如：www.abc.com">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>联系人</td>
                                                <td>
                                                    <input type="text" class="form-control" name='linkman' placeholder="网站联系人姓名">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>手机号码</td>
                                                <td>
                                                    <input type="text" class="form-control" name='phone' placeholder="联系手机号码">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>座机</td>
                                                <td>
                                                    <input type="text" class="form-control" name='tel' placeholder="如：00853-63000205">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>传真</td>
                                                <td>
                                                    <input type="text" class="form-control" name='fax' placeholder="如：00853-63000205">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>微信号</td>
                                                <td>
                                                    <input type="text" class="form-control" name='wechat' placeholder="5-30个字符">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>qq号码</td>
                                                <td>
                                                    <input type="text" class="form-control" name='qq' placeholder="请输入正确格式的qq号码">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>联系地址</td>
                                                <td>
                                                    <input type="text" class="form-control" name='address' placeholder="请填写详细的联系地址">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>代理商id</td>
                                                <td>
                                                    <input type="text" class="form-control" name='aid' placeholder="如没有，请留空">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>用户头像</td>
                                                <td>
                                                    <input type="file" class="form-control" name='thumb'> <span class="text-muted">尺寸比例为1:1</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>代理状态</td>
                                                <td>
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="inlineRadio1" value="1" name="state" checked="">
                                                        <label for="inlineRadio1"> 开启 </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input type="radio" id="inlineRadio2" value="0" name="state">
                                                        <label for="inlineRadio2"> 关闭 </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <button class="btn btn-primary" type="submit">提交</button>
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
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
