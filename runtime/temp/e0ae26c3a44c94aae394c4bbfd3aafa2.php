<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:67:"D:\www\tp\elian\public/../application/admin\view\temp\editlogo.html";i:1505924587;s:65:"D:\www\tp\elian\public/../application/admin\view\public\meta.html";i:1504623373;s:63:"D:\www\tp\elian\public/../application/admin\view\temp\menu.html";i:1505885536;}*/ ?>
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

    <script src="__ADMIN__/ueditor/ueditor.config.js"></script>
    <script src="__ADMIN__/ueditor/ueditor.all.min.js"></script>
    <script src="__ADMIN__/ueditor/lang/zh-cn/zh-cn.js"></script>
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
                        <a href="#" class="homelink">首页</a> > 编辑logo
                    </div>
                    <div class="body" id="app">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="panel-title">编辑logo</h2>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <form action="" method='post' enctype="multipart/form-data" class="addagent">
                                        <input type="hidden" name='id' value="<?php echo $res['id']; ?>">
                                        <table class="table table-striped table-hover">
                                            <tr>
                                                <th>字段</th>
                                                <th>值</th>
                                            </tr>
                                            <tr>
                                                <td>模板名称</td>
                                                <td>
                                                    <input type="text" value="<?php echo $temp['tempname']; ?>" disabled class="form-control">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>logo文字名称 <span class="text-danger">*</span></td>
                                                <td>
                                                    <input type="text" class="form-control" name="logo_word" datatype="*" value="<?php echo $res['logo_word']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>logo链接</td>
                                                <td>
                                                    <input type="text" class="form-control" name="logo_link" value="<?php echo $res['logo_link']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>logo图片</td>
                                                <td>
                                                    <input type="file" class="form-control" name='logo_img'>
                                                    <img src="<?php echo $res['logo_img']; ?>" width='80' height='80' alt="">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>logo图片alt标签</td>
                                                <td>
                                                    <input type="text" class="form-control" name='logo_img_alt' value="<?php echo $res['logo_img_alt']; ?>">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>logo图片是否显示</td>
                                                <td>
                                                    <div class="radio radio-info radio-inline">
                                                        <input type="radio" id="inlineRadio1" value="1" name="logo_img_display" <?php if($res['logo_img_display'] == 1): ?>checked<?php endif; ?>>
                                                        <label for="inlineRadio1"> 显示 </label>
                                                    </div>
                                                    <div class="radio radio-inline">
                                                        <input type="radio" id="inlineRadio2" value="0" name="logo_img_display" <?php if($res['logo_img_display'] == 0): ?>checked<?php endif; ?>>
                                                        <label for="inlineRadio2"> 隐藏 </label>
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
   <!--  <div class="con" id="con">
       <button data-name="selectAll">全选</button>
       <button data-name="delete">删除</button>
       <button data-name="undo">撤销</button>
       <button data-name="print">打印</button>
       <button data-name="bold">加粗</button>
       <button data-name="italic">斜线</button>
       <button data-name="underline">下划线</button>
       <button data-name="fontsize" data-value="16px">大号字体</button>
       <button data-name="forecolor" data-value="red">红色文本</button>
       <button data-name="backcolor" data-value="gray">灰色背景</button>
       <button data-name="removeFormat">清空格式</button>
   </div> -->
    <script>
    var aCon = document.getElementById('con').getElementsByTagName('button');
    for (var i = 0; i < aCon.length; i++) {
        aCon[i].onclick = function() {
            document.execCommand(this.dataset.name, false, this.dataset.value);
        }
    }
    </script>

</body>

</html>