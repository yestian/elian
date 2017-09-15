<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:66:"D:\www\tp\elian\public/../application/member\view\index\index.html";i:1505445911;s:66:"D:\www\tp\elian\public/../application/member\view\public\meta.html";i:1505446123;s:65:"D:\www\tp\elian\public/../application/member\view\index\menu.html";i:1505476118;s:68:"D:\www\tp\elian\public/../application/member\view\public\footer.html";i:1503588162;}*/ ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>后台 - <?php echo $conf['sitename']; ?></title>
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
    <!--div id="loading-mask">
        <div class="animation">
            <div></div>
        </div>
        <div class="logo"><img src="__MEMBER__/images/preloader_hires.png" alt="" /></div>
    </div>
    <div id="loader" class="gradient">
        <div class="sphere"><img src="__MEMBER__/images/1x1.gif" alt="" /></div>
    </div-->
    <div class="wrapper indexwrapper">
        <div class="row index">
           <div class="sidebar col-md-2 pageheight">
    <div class="logo">
        <a href="index/index"><img src="__MEMBER__/images/logo.png" alt="logo"></a>
    </div>
    <ul class="menu">
        <li class="open">
            <a href="<?php echo url('index/index'); ?>">内容管理</a>
            <div class="submenu pageheight">
                <ul>
                     <li>
                        <a href="<?php echo url('member_cate/lst'); ?>">
                            <span class="title"><i class="fa fa-list"></i>选择模板</span>
                            <p>账户信息主要是账户的基本信息展示，主要包括用户名，密码等的设置，修改。账户信息主要是账户的基本信息展示，主要包括用户名，密码等的设置，修改。</p>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('member_cate/lst'); ?>">
                            <span class="title"><i class="fa fa-pencil"></i>编辑模板</span>
                            <p>账户信息主要是账户的基本信息展示，主要包括用户名，密码等的设置，修改。账户信息主要是账户的基本信息展示，主要包括用户名，密码等的设置，修改。</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('member_cate/lst'); ?>">
                            <span class="title"><i class="fa fa-list"></i>栏目列表</span>
                            <p>账户信息主要是账户的基本信息展示，主要包括用户名，密码等的设置，修改。账户信息主要是账户的基本信息展示，主要包括用户名，密码等的设置，修改。</p>
                        </a>
                    </li>
                    <li><a href="<?php echo url('member_cate/add'); ?>"><span class="title"><i class="fa fa-plus"></i>栏目添加</span><p>描述文字...</p></a></li>
                    <li><a href="<?php echo url('member_article/lst'); ?>"><span class="title"><i class="fa fa-list"></i>文章列表</span><p>描述文字...</p></a></li>
                    <li><a href="<?php echo url('member_article/add'); ?>"><span class="title"><i class="fa fa-plus"></i>添加文章</span><p>描述文字...</p></a></li>
                </ul>
            </div>
        </li>
        <li>
            <a href="<?php echo url('index/index'); ?>">财务管理</a>
            <div class="submenu pageheight">
                <ul>
                    <li><a href="<?php echo url('member_pay/pay'); ?>"><span class="title"><i class="fa fa-money"></i>在线充值</span><p>描述文字...</p></a></li>
                    <li>
                        <a href="<?php echo url('member_pay/orderlst'); ?>">
                            <span class="title"><i class="fa fa-list"></i>订单列表</span>
                            <p>账户信息主要是账户的基本信息展示，主要包括用户名，密码等的设置，修改。账户信息主要是账户的基本信息展示，主要包括用户名，密码等的设置，修改。</p>
                        </a>
                    </li>
                    <li><a href="<?php echo url('member_buy/buylst'); ?>"><span class="title"><i class="fa fa-file-text-o"></i>购买记录</span><p>描述文字...</p></a></li>
                    <li><a href="<?php echo url('member_pay/paylst'); ?>"><span class="title"><i class="fa fa-file-text-o"></i>充值记录</span><p>描述文字...</p></a></li>
                </ul>
            </div>
        </li>
        <li><a href="#">管理员</a>
            <div class="submenu pageheight">
                <ul>
                    <li>
                        <a href="<?php echo url('member_admin/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>管理列表</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('auth_groupm/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>用户组列表</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('auth_rulem/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>权限列表</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li><a href="#">系统设置</a>
            <div class="submenu pageheight">
                <ul>
                    <li>
                        <a href="<?php echo url('member_conf/conf'); ?>">
                            <span class="title"><i class="fa fa-users"></i>配置前台列表</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('member_conf/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>配置后台列表</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('member_conf/add'); ?>">
                            <span class="title"><i class="fa fa-users"></i>添加配置后台</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li><a href="<?php echo url('admin/logout'); ?>">退出登录</a></li>
    </ul>
</div>

            <div class="main col-md-8 pageheight">
                <div class="fullpage">
                    <div class="section">
                        <div class="heading">
                            <h2>代理商列表</h2>
                            <p>账户信息主要是账户的基本信息展示，主要包括用户名，密码等的设置，修改。账户信息主要是账户的基本信息展示，主要包括用户名，密码等的设置，修改。</p>
                        </div>
                        <div class="imgbox"><img src="__MEMBER__/images/list1-1.jpg" alt=""></div>
                    </div>
                    <div class="section">
                        <div class="heading">
                            <h2>代理商添加</h2>
                            <p>代理商添加文字描述...</p>
                        </div>
                        <div class="imgbox"><img src="__MEMBER__/images/list1-2.jpg" alt=""></div>
                    </div>
                    <div class="section">
                        <div class="heading">
                            <h2>加盟文档</h2>
                            <p>加盟文档文字描述...</p>
                        </div>
                        <div class="imgbox"><img src="__MEMBER__/images/list1-3.jpg" alt=""></div>
                    </div>
                    <div class="section">
                        <div class="heading">
                            <h2>订单列表</h2>
                            <p>订单列表文字描述...</p>
                        </div>
                        <div class="imgbox"><img src="__MEMBER__/images/list1-4.jpg" alt=""></div>
                    </div>
                    <div class="section">
                        <div class="heading">
                            <h2>消费记录</h2>
                            <p>消费记录文字描述...</p>
                        </div>
                        <div class="imgbox"><img src="__MEMBER__/images/list1-5.jpg" alt=""></div>
                    </div>
                    <div class="section">
                        <div class="heading">
                            <h2>代理个人站点</h2>
                            <p>代理个人站点文字描述...</p>
                        </div>
                        <div class="imgbox"><img src="__MEMBER__/images/list1-1.jpg" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--js文件-->
    
    <!--页面加载效果-->
    <script type='text/javascript' src='__MEMBER__/js/logo-plugins.js'></script>
    <script type='text/javascript' src='__MEMBER__/js/loading.js'></script>
    <!--页面加载效果 end-->

    <script>
    //二级栏目点击效果，使用layer插件
    $(function() {
        $(".submenu li a").click(function() {
            layer.open({
                type: 2,
                offset: [0, '27%'],
                title: false,
                closeBtn: 0,
                skin: 'dpage',
                area: ['auto', $(window).height()],
                fixed: false,
                maxmin: true,
                content: $(this).attr('href')
            });
            return false;
        });
        //对应的右边图片点击效果
        $(".section img").click(function() {
            var i=$(this).parents('.section').index();
            layer.open({
                type: 2,
                offset: [0, '27%'],
                title: false,
                closeBtn: 0,
                skin: 'dpage',
                area: ['auto', $(window).height()],
                fixed: false,
                maxmin: true,
                content: $(".submenu li").eq(i).find('a').attr('href')
            });
        });
        
    });
    </script>
    <script>
    //右侧的全屏滚动
    $(function() {
        $('.fullpage').fullpage({
            'navigation': true,
        });
    });
    //右侧的导航
    $(function() {
        $("#fp-nav li").each(function(i) {
            $(this).append("<div class='fpnum'>" + (i + 1) + "0</div>");
        });
    });
    </script>
    <script>
    //二级菜单滚动条美化
    $('.submenu').niceScroll({
        cursorcolor: "#ccc", //#CC0071 光标颜色
        cursoropacitymax: 1, //改变不透明度非常光标处于活动状态（scrollabar“可见”状态），范围从1到0
        touchbehavior: false, //使光标拖动滚动像在台式电脑触摸设备
        cursorwidth: "5px", //像素光标的宽度
        cursorborder: "0", // 游标边框css定义
        cursorborderradius: "5px", //以像素为光标边界半径
        autohidemode: true //是否隐藏滚动条
    });
    $(".submenu").getNiceScroll().hide();
    </script>
</body>

</html>
