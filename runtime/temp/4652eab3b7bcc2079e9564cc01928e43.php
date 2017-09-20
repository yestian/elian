<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:65:"D:\www\tp\elian\public/../application/admin\view\index\index.html";i:1504713501;s:65:"D:\www\tp\elian\public/../application/admin\view\public\meta.html";i:1504623373;s:64:"D:\www\tp\elian\public/../application/admin\view\index\menu.html";i:1505884277;s:67:"D:\www\tp\elian\public/../application/admin\view\public\footer.html";i:1503588162;}*/ ?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>后台 - <?php echo $conf['sitename']; ?></title>
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
    <!--div id="loading-mask">
        <div class="animation">
            <div></div>
        </div>
        <div class="logo"><img src="__ADMIN__/images/preloader_hires.png" alt="" /></div>
    </div>
    <div id="loader" class="gradient">
        <div class="sphere"><img src="__ADMIN__/images/1x1.gif" alt="" /></div>
    </div-->
    <div class="wrapper indexwrapper">
        <div class="row index">
           <div class="sidebar col-md-2 pageheight">
    <div class="logo">
        <a href="index/index"><img src="__ADMIN__/images/logo.png" alt="logo"></a>
    </div>
    <ul class="menu">
        <li>
            <a href="<?php echo url('index/index'); ?>">代理商管理</a>
            <div class="submenu pageheight">
                <ul>
                    <li>
                        <a href="<?php echo url('agent/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>代理商列表</span>
                            <p>账户信息主要是账户的基本信息展示，主要包括用户名，密码等的设置，修改。账户信息主要是账户的基本信息展示，主要包括用户名，密码等的设置，修改。</p>
                        </a>
                    </li>
                    <li><a href="<?php echo url('agent/add'); ?>"><span class="title"><i class="fa fa-user-plus"></i>代理商添加</span><p>描述文字...</p></a></li>
                    <li><a href="<?php echo url('file/lst',array('ctr'=>'Agent')); ?>"><span class="title"><i class="fa fa-file-word-o"></i>加盟文档</span><p>描述文字...</p></a></li>
                    <li><a href="<?php echo url('agent_pay/lst'); ?>"><span class="title"><i class="fa fa-money"></i>订单列表</span><p>描述文字...</p></a></li>
                    <li><a href="<?php echo url('agent_buy/lst'); ?>"><span class="title"><i class="fa fa-cny"></i>消费记录</span><p>描述文字...</p></a></li>
                    <li><a href="<?php echo url('member/lst',array('ctr'=>'Agent')); ?>"><span class="title"><i class="fa fa-user-o"></i>代理会员</span><p>描述文字...</p></a></li>
                    <li><a href="#"><span class="title"><i class="fa fa-desktop"></i>代理个人站点</span><p>描述文字...</p></a></li>
                </ul>
            </div>
        </li>
        <li class="open"><a href="<?php echo url('index/index2'); ?>">会员管理</a>
            <div class="submenu pageheight">
                <ul>
                    <li>
                        <a href="<?php echo url('member/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>会员列表</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('member/add'); ?>">
                            <span class="title"><i class="fa fa-user-plus"></i>添加会员</span>
                            <p>添加会员说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('file/lst'); ?>">
                            <span class="title"><i class="fa fa-file-word-o"></i>会员文档</span>
                            <p>会员文档说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('member_pay/lst'); ?>">
                            <span class="title"><i class="fa fa-money"></i>会员订单</span>
                            <p>会员订单说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('member_buy/lst'); ?>">
                            <span class="title"><i class="fa fa-cny"></i>会员消费记录</span>
                            <p>会员消费记录说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('member/sitelst'); ?>">
                            <span class="title"><i class="fa fa-desktop"></i>会员站点</span>
                            <p>会员站点说明...</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li><a href="#">模板管理</a>
            <div class="submenu pageheight">
                <ul>
                    <li>
                        <a href="<?php echo url('temp/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>模板列表</span>
                            <p>模板列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('temp/add'); ?>">
                            <span class="title"><i class="fa fa-users"></i>添加模板</span>
                            <p>模板列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('temp/copy'); ?>">
                            <span class="title"><i class="fa fa-users"></i>复制模板</span>
                            <p>模板列表说明...</p>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('temp/tplset'); ?>">
                            <span class="title"><i class="fa fa-users"></i>模板设置</span>
                            <p>模板列表说明...</p>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('temp/set'); ?>">
                            <span class="title"><i class="fa fa-users"></i>模块设置</span>
                            <p>模板列表说明...</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li><a href="#">会员站点</a>
            <div class="submenu pageheight">
                <ul>
                    <li>
                        <a href="<?php echo url('site/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>站点列表</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('site/lsta'); ?>">
                            <span class="title"><i class="fa fa-users"></i>代理站点</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('site/lstb'); ?>">
                            <span class="title"><i class="fa fa-users"></i>会员站点</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('site/add'); ?>">
                            <span class="title"><i class="fa fa-users"></i>添加站点</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li><a href="#">新闻源</a>
            <div class="submenu pageheight">
                <ul>
                    <li>
                        <a href="<?php echo url('media/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>新闻列表</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('site/add'); ?>">
                            <span class="title"><i class="fa fa-users"></i>发布新闻</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('site/published'); ?>">
                            <span class="title"><i class="fa fa-users"></i>发布记录</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('site/write'); ?>">
                            <span class="title"><i class="fa fa-users"></i>文章代写</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('site/writed'); ?>">
                            <span class="title"><i class="fa fa-users"></i>代写记录</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li><a href="<?php echo url('index/index5'); ?>">财务管理</a>
            <div class="submenu pageheight">
                <ul>
                    <li>
                        <a href="<?php echo url('agent_pay/agentpay'); ?>">
                            <span class="title"><i class="fa fa-users"></i>代理商订单</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('agent_buy/agentbuy'); ?>">
                            <span class="title"><i class="fa fa-users"></i>代理商消费</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('member_pay/memberpay'); ?>">
                            <span class="title"><i class="fa fa-users"></i>会员订单</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('member_buy/memberbuy'); ?>">
                            <span class="title"><i class="fa fa-users"></i>会员消费</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li><a href="<?php echo url('cate/index6'); ?>">博客管理</a>
            <div class="submenu pageheight">
                <ul>
                    <li>
                        <a href="<?php echo url('cate/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>栏目管理</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('cate/add'); ?>">
                            <span class="title"><i class="fa fa-users"></i>添加栏目</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('article/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>文章列表</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('article/add'); ?>">
                            <span class="title"><i class="fa fa-users"></i>添加文章</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
        <li><a href="#">官网设置</a>
            <div class="submenu pageheight">
                <ul>
                    <li>
                        <a href="<?php echo url('member/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>新闻列表</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('member/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>添加新闻</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                </ul>
            </div>
        </li>
         <li><a href="#">管理员</a>
            <div class="submenu pageheight">
                <ul>
                    <li>
                        <a href="<?php echo url('admin/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>管理列表</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('autu_group/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>用户组列表</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                     <li>
                        <a href="<?php echo url('auth_rule/lst'); ?>">
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
                        <a href="<?php echo url('conf/conf'); ?>">
                            <span class="title"><i class="fa fa-users"></i>配置前台列表</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('conf/lst'); ?>">
                            <span class="title"><i class="fa fa-users"></i>配置后台列表</span>
                            <p>会员列表说明...</p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo url('conf/add'); ?>">
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
                        <div class="imgbox"><img src="__ADMIN__/images/list1-1.jpg" alt=""></div>
                    </div>
                    <div class="section">
                        <div class="heading">
                            <h2>代理商添加</h2>
                            <p>代理商添加文字描述...</p>
                        </div>
                        <div class="imgbox"><img src="__ADMIN__/images/list1-2.jpg" alt=""></div>
                    </div>
                    <div class="section">
                        <div class="heading">
                            <h2>加盟文档</h2>
                            <p>加盟文档文字描述...</p>
                        </div>
                        <div class="imgbox"><img src="__ADMIN__/images/list1-3.jpg" alt=""></div>
                    </div>
                    <div class="section">
                        <div class="heading">
                            <h2>订单列表</h2>
                            <p>订单列表文字描述...</p>
                        </div>
                        <div class="imgbox"><img src="__ADMIN__/images/list1-4.jpg" alt=""></div>
                    </div>
                    <div class="section">
                        <div class="heading">
                            <h2>消费记录</h2>
                            <p>消费记录文字描述...</p>
                        </div>
                        <div class="imgbox"><img src="__ADMIN__/images/list1-5.jpg" alt=""></div>
                    </div>
                    <div class="section">
                        <div class="heading">
                            <h2>代理个人站点</h2>
                            <p>代理个人站点文字描述...</p>
                        </div>
                        <div class="imgbox"><img src="__ADMIN__/images/list1-1.jpg" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--js文件-->
    
    <!--页面加载效果-->
    <script type='text/javascript' src='__ADMIN__/js/logo-plugins.js'></script>
    <script type='text/javascript' src='__ADMIN__/js/loading.js'></script>
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
