<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:71:"D:\www\tp\elian\public/../application/member\view\auth_groupm\edit.html";i:1505492262;s:66:"D:\www\tp\elian\public/../application/member\view\public\meta.html";i:1505492262;s:72:"D:\www\tp\elian\public/../application/member\view\member_admin\menu.html";i:1505492262;}*/ ?>
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
        <li><a href="<?php echo url('member_admin/lst'); ?>"><i class="fa fa-users"></i><span>管理员列表</span></a></li>
        <li><a href="<?php echo url('auth_groupm/lst'); ?>"><i class="fa fa-user"></i><span>用户组列表</span></a></li>
        <li><a href="<?php echo url('auth_rulem/lst'); ?>"><i class="fa fa-sort-amount-asc"></i><span>权限列表</span></a></li>
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
                        <a href="#" class="homelink">首页</a> > 用户组编辑
                    </div>
                    <div class="body">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="panel-title">用户组编辑 <a href="<?php echo url('add'); ?>" class="btn btn-info btn-xs">添加</a></h2>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" action="" method="post">
                                    <input type="hidden" name="id" value="<?php echo $authgroups['id']; ?>" />
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">用户组名称</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="" value="<?php echo $authgroups['title']; ?>" name="title" required="" type="text">
                                        </div>
                                        <p class="help-block col-sm-4 red">* 必填</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">启用状态</label>
                                        <div class="col-sm-6">
                                            <p class="help-block col-sm-4 red">
                                                <label>
                                                    <input class="checkbox-slider colored-darkorange" name="status" value="1" <?php if($authgroups['status'] == 1): ?>checked="checked" <?php endif; ?> type="checkbox">
                                                    <span class="text"></span>
                                                </label>
                                            </p>
                                        </div>
                                        <p class="help-block col-sm-4 red">* 必填</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right"></label>
                                        <div class="col-sm-6">
                                            <table class="table table-hover">
                                                <thead class="bordered-darkorange">
                                                    <tr>
                                                        <th>
                                                            配置权限
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if(is_array($authRuleRes) || $authRuleRes instanceof \think\Collection || $authRuleRes instanceof \think\Paginator): $i = 0; $__LIST__ = $authRuleRes;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$authRule): $mod = ($i % 2 );++$i;?>
                                                    <tr>
                                                        <td>
                                                            <label>
                                                                <?php echo str_repeat('&nbsp;', $authRule['level']*6);?>
                                                                <input <?php $arr=explode( ',', $authgroups[ 'rules']);if(in_array($authRule[ 'id'], $arr)){echo 'checked';};?> name="rules[]" value="<?php echo $authRule['id']; ?>" dataid="id-<?php echo $authRule['dataid']; ?>" class="inverted checkbox-parent <?php if($authRule[ 'level'] != 0): ?> checkbox-child <?php endif; ?> " type="checkbox">
                                                                <span <?php if($authRule['level'] == 0): ?> style="font-weight:bold; font-size:14px;" <?php endif; ?> class="text"><?php echo $authRule['title']; ?></span>
                                                            </label>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; endif; else: echo "" ;endif; ?>
                                                </tbody>
                                            </table>
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
    <script type="text/javascript">
    /* 权限配置 */
    $(function() {
        //动态选择框，上下级选中状态变化
        $('input.checkbox-parent').on('change', function() {
            var dataid = $(this).attr("dataid");
            $('input[dataid^=' + dataid + ']').prop('checked', $(this).is(':checked'));
        });
        $('input.checkbox-child').on('change', function() {
            var dataid = $(this).attr("dataid");
            dataid = dataid.substring(0, dataid.lastIndexOf("-"));
            var parent = $('input[dataid=' + dataid + ']');
            if ($(this).is(':checked')) {
                parent.prop('checked', true);
                //循环到顶级
                while (dataid.lastIndexOf("-") != 2) {
                    dataid = dataid.substring(0, dataid.lastIndexOf("-"));
                    parent = $('input[dataid=' + dataid + ']');
                    parent.prop('checked', true);
                }
            } else {
                //父级
                if ($('input[dataid^=' + dataid + '-]:checked').length == 0) {
                    parent.prop('checked', false);
                    //循环到顶级
                    while (dataid.lastIndexOf("-") != 2) {
                        dataid = dataid.substring(0, dataid.lastIndexOf("-"));
                        parent = $('input[dataid=' + dataid + ']');
                        if ($('input[dataid^=' + dataid + '-]:checked').length == 0) {
                            parent.prop('checked', false);
                        }
                    }
                }
            }
        });
    });
    </script>
</body>

</html>
