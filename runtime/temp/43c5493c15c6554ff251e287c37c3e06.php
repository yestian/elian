<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:74:"D:\www\tp\elian\public/../application/member\view\member_article\edit.html";i:1505465331;s:66:"D:\www\tp\elian\public/../application/member\view\public\meta.html";i:1505446123;s:71:"D:\www\tp\elian\public/../application/member\view\member_cate\menu.html";i:1505464030;}*/ ?>
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

    <script src="__MEMBER__/ueditor/ueditor.config.js"></script>
    <script src="__MEMBER__/ueditor/ueditor.all.min.js"></script>
    <script src="__MEMBER__/ueditor/lang/zh-cn/zh-cn.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="innerpage pageheight">
            <div class="wrapper container-fluid pageheight">
                <div class="sidebar2">
    <ul>
        <li><a class="homelink"><i class="fa fa-home"></i><span>HOME</span></a></li>
        <li><a href="<?php echo url('member_cate/lst'); ?>"><i class="fa fa-list"></i><span>模板列表</span></a></li>
        <li><a href="<?php echo url('member_cate/lst'); ?>"><i class="fa fa-list"></i><span>选择模板</span></a></li>
        <li><a href="<?php echo url('member_cate/lst'); ?>"><i class="fa fa-list"></i><span>栏目列表</span></a></li>
        <li><a href="<?php echo url('member_cate/add'); ?>"><i class="fa fa-plus-square"></i><span>添加栏目</span></a></li>
        <li><a href="<?php echo url('member_article/lst'); ?>"><i class="fa fa-file-text"></i><span>文章列表</span></a></li>
        <li><a href="<?php echo url('member_article/add'); ?>"><i class="fa fa-plus"></i><span>添加文章</span></a></li>
    </ul>
    <div class="logout">
        <img src="__MEMBER__/images/logo-eg.jpg" alt="用户头像">
        <a class="logoutfunc" href="<?php echo url('member_admin/logout2'); ?>"><span>退出登录</span></a>
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
                        <a href="#" class="homelink">首页</a> > 文章列表
                    </div>
                    <div class="body">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="panel-title">文章列表</h2>
                            </div>
                            <div class="panel-body">
                                <form class="form-horizontal" role="form" action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id" value="<?php echo $arts['id']; ?>">
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">标题</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="" value="<?php echo $arts['title']; ?>" name="title" required="" type="text">
                                        </div>
                                        <p class="help-block col-sm-4 red">* 必填</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">作者</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="" value="<?php echo $arts['author']; ?>" name="author" type="text">
                                        </div>
                                        <p class="help-block col-sm-4 red">* 必填</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">关键词</label>
                                        <div class="col-sm-6">
                                            <input class="form-control" placeholder="" name="keywords" value="<?php echo $arts['keywords']; ?>" type="text">
                                        </div>
                                        <p class="help-block col-sm-4 red">* 必填</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">描述</label>
                                        <div class="col-sm-6">
                                            <textarea name="desc" class="form-control"><?php echo $arts['desc']; ?></textarea>
                                        </div>
                                        <p class="help-block col-sm-4 red">* 必填</p>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">缩略图</label>
                                        <div class="col-sm-6">
                                            <input style="float:left;" placeholder="" name="thumb" type="file"> <?php if($arts['thumb'] != ''): ?>
                                            <img style="float:left;" src="<?php echo $arts['thumb']; ?>" width="30"> <?php else: ?> 暂无缩略图 <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">是否推荐</label>
                                        <div class="col-sm-6">
                                            <label style="margin-right:15px;" class="radio-inline">
                                                <input <?php if($arts['rec'] == 1): ?> checked="checked" <?php endif; ?> name="rec" value="1" type="radio">
                                                <span class="text">是</span>
                                            </label>
                                            <label style="margin-right:15px;" class="radio-inline">
                                                <input <?php if($arts['rec'] == 0): ?> checked="checked" <?php endif; ?> class="inverted" name="rec" value="0" type="radio">
                                                <span class="text">否</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">所属栏目</label>
                                        <div class="col-sm-6">
                                            <select name="cateid" class="form-control">
                                                <?php if(is_array($cateres) || $cateres instanceof \think\Collection || $cateres instanceof \think\Paginator): $i = 0; $__LIST__ = $cateres;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?>
                                                <option <?php if($cate['id'] == $arts['cateid']): ?>selected="selected" <?php endif; ?> value="<?php echo $cate['id']; ?>"><?php if($cate['level'] != 0): ?>|<?php endif; ?>
                                                    <?php echo str_repeat('-', $cate['level']*4)?><?php echo $cate['catename']; ?></option>
                                                <?php endforeach; endif; else: echo "" ;endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="username" class="col-sm-2 control-label no-padding-right">内容</label>
                                        <div class="col-sm-6">
                                            <textarea id="content" name="content"><?php echo $arts['content']; ?></textarea>
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
<script type="text/javascript">
//实例化编辑器
//建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
UE.getEditor('content', {
    initialFrameWidth: 660,
    initialFrameHeight: 400,
});
</script>
</body>

</html>
