<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"D:\www\tp\elian\public/../application/admin\view\temp\edittemp.html";i:1506014424;s:65:"D:\www\tp\elian\public/../application/admin\view\public\meta.html";i:1504623373;s:63:"D:\www\tp\elian\public/../application/admin\view\temp\menu.html";i:1505996654;}*/ ?>
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
            <a href="<?php echo url('temp/templst'); ?>">
                            <i class="fa fa-users"></i><span>模板列表</span>
                        </a>
        </li>
        <li>
            <a href="<?php echo url('temp/addtemp'); ?>">
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
                        <a href="#" class="homelink">首页</a> > 编辑模板
                    </div>
                    <div class="body">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="panel-title">编辑模板</h2>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <form action="" method='post' enctype="multipart/form-data" class="addagent">
                                        <input type="hidden" name="id" value="<?php echo $res['id']; ?>">
                                        <table class="table table-striped table-hover">
                                            <tr>
                                                <th>字段</th>
                                                <th>值</th>
                                            </tr>
                                            <tr>
                                                <td>模板名称 <span class="text-danger">*</span></td>
                                                <td>
                                                    <input type="text" class="form-control" name="tempname" datatype="*4-12" errormsg="4-12个字符" value="<?php echo $res['tempname']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>模板颜色 <span class="text-danger">*</span></td>
                                                <td>
                                                    <select name="color_id" id="" datatype="*" class="form-control">
                                                        <option value>请选择</option>
                                                        <?php if(is_array($color) || $color instanceof \think\Collection || $color instanceof \think\Paginator): $i = 0; $__LIST__ = $color;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                        <option value="<?php echo $vo['id']; ?>" <?php if($vo['id'] == $res['color_id']): ?>selected<?php endif; ?>><?php echo $vo['color']; ?></option>
                                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>模板行业 <span class="text-danger">*</span></td>
                                                <td>
                                                    <select name="industry_id" id="" datatype="*" class="form-control">
                                                        <option value>请选择</option>
                                                        <?php if(is_array($industry) || $industry instanceof \think\Collection || $industry instanceof \think\Paginator): $i = 0; $__LIST__ = $industry;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                                                        <option value="<?php echo $vo['id']; ?>" <?php if($vo['id'] == $res['industry_id']): ?>selected<?php endif; ?>><?php echo $vo['industry']; ?></option>
                                                        <?php endforeach; endif; else: echo "" ;endif; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                             <tr>
                                                <td>售价</td>
                                                <td>
                                                    <input type="text" class="form-control" name="prize" value="<?php echo $res['prize']; ?>">
                                                </td>
                                            </tr>
                                           
                                            <tr>
                                                <td>模板缩略图</td>
                                                <td>
                                                    <input type="file" class="form-control" name='thumb'> <span class="text-muted">尺寸比例为1:1</span><img src="<?php echo $res['thumb']; ?>" width='80' height='80' alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>模板状态</td>
                                                <td>
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="inlineRadio1" value="1" name="status" <?php if($res['status'] == 1): ?>checked<?php endif; ?>>
                                                        <label for="inlineRadio1"> 开启 </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input type="radio" id="inlineRadio2" value="0" name="status" <?php if($res['status'] == 0): ?>checked<?php endif; ?>> 
                                                        <label for="inlineRadio2"> 关闭 </label>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <button class="btn btn-primary" type="submit">提交</button>
                                                     <a href="<?php echo url('temp/editpanel',array('id'=>$res['id'])); ?>" class="btn btn-warning btn-sm">返回编辑列表</a>
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
