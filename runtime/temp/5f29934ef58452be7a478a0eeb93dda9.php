<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:66:"D:\www\tp\elian\public/../application/admin\view\agent\detail.html";i:1504287343;s:65:"D:\www\tp\elian\public/../application/admin\view\public\meta.html";i:1504623373;s:64:"D:\www\tp\elian\public/../application/admin\view\agent\menu.html";i:1504509244;}*/ ?>
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
        <li><a href="<?php echo url('agent/lst'); ?>"><i class="fa fa-users"></i><span>代理商列表</span></a></li>
        <li><a href="<?php echo url('agent/add'); ?>"><i class="fa fa-user-plus"></i><span>代理商添加</span></a></li>
        <li><a href="<?php echo url('file/lst',array('ctr'=>'Agent')); ?>"><i class="fa fa-file-word-o"></i><span>加盟文档</span></a></li>
        <li><a href="<?php echo url('agent_pay/lst'); ?>"><i class="fa fa-money"></i><span>订单列表</span></a></li>
        <li><a href="<?php echo url('agent_buy/lst'); ?>"><i class="fa fa-cny"></i><span>消费记录</span></a></li>
        <li><a href="#"><i class="fa fa-desktop"></i><span>代理个人站点</span></a></li>
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
                        <a href="#" class="homelink">首页</a> > 代理商详细信息
                    </div>
                    <div class="body">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h2 class="panel-title">代理商详细信息</h2>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover table-bordered">
                                        <caption class="text-center">代理信息</caption>
                                        <tr>
                                            <th width='20%'>字段</th>
                                            <th>值</th>
                                        </tr>
                                        <tr>
                                            <td>登录用户名</td>
                                            <td>
                                                <?php echo $infos['username']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>代理商机构名称</td>
                                            <td>
                                                <?php echo $infos['agentname']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>代理级别</td>
                                            <td>
                                                <?php if($infos['level'] == 1): ?>普通<?php elseif($infos['level'] == 2): ?>钻石<?php elseif($infos['level'] == 3): ?>皇冠<?php elseif($infos['level'] == 4): ?>合伙人<?php else: ?>无<?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>代理平台二级域名</td>
                                            <td>
                                                <a href="http://<?php echo $infos['username']; ?>.aselian.com" target="_blank"><?php echo $infos['username']; ?>.aselian.com</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>绑定的正式域名</td>
                                            <td>
                                                <a href="http://<?php echo $infos['domain']; ?>" target="_blank"><?php echo $infos['domain']; ?></a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>注册时间</td>
                                            <td>
                                                <?php echo date("Y-m-d H:i:s",$infos['signdate']); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>加盟时间</td>
                                            <td>
                                                <?php echo date("Y-m-d H:i:s",$infos['agentdate']); ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>总充值金额</td>
                                            <td>
                                                <?php echo $allpay['pays']; if($allpay['pays'] != 0): ?> <a href="<?php echo url('agent_pay/lst',array('id'=>$infos['id'])); ?>" class="btn btn-info btn-sm">明细</a><?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>总消费金额</td>
                                            <td>
                                                <?php echo $allbuy['buys']; if($allbuy['buys'] != 0): ?> <a href="<?php echo url('agent_buy/lst',array('id'=>$infos['id'])); ?>" class="btn btn-info btn-sm">明细</a><?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>上级代理商id</td>
                                            <td>
                                                <?php if($infos['upid'] == 0): ?>无<?php else: ?> <?php echo $infos['upid']; endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>下级代理商</td>
                                            <td><?php if($subnum['upidsum'] == 0): ?>暂无下级代理<?php else: ?>数量：<?php echo $subnum['upidsum']; ?>（<?php endif; if(is_array($subagent) || $subagent instanceof \think\Collection || $subagent instanceof \think\Paginator): $index = 0; $__LIST__ = $subagent;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($index % 2 );++$index;if($index != 1): ?> | <?php endif; ?><a href="<?php echo url('detail',['id'=>$vo['id']]); ?>"><?php echo $vo['agentname']; ?></a><?php endforeach; endif; else: echo "" ;endif; if($subnum['upidsum'] != 0): ?>）<?php endif; if($subnum['upidsum'] > 3): ?> <a href="<?php echo url('sonlst',['upid'=>$infos['id'],'pid'=>$infos['id']]); ?>" class="btn btn-info btn-sm">more</a><?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>会员列表</td>
                                            <td><?php if($mymem['sums'] == 0): ?>暂无会员<?php else: ?>数量：<?php echo $mymem['sums']; ?>（<?php endif; if(is_array($members) || $members instanceof \think\Collection || $members instanceof \think\Paginator): $index = 0; $__LIST__ = $members;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($index % 2 );++$index;if($index != 1): ?> | <?php endif; ?><a href="<?php echo url('member/detail',['id'=>$vo['id']]); ?>"><?php echo $vo['company']; ?></a><?php endforeach; endif; else: echo "" ;endif; if($mymem['sums'] != 0): ?>）<?php endif; if($mymem['sums'] > 3): ?> <a href="<?php echo url('member/sublst',['aid'=>$infos['id']]); ?>" class="btn btn-info btn-sm">more</a><?php endif; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>代理状态</td>
                                            <td>
                                                <?php if($infos['status'] == 0): ?>
                                                <button class="btn btn-danger btn-sm">关闭</button><?php else: ?>
                                                <button class="btn btn-success btn-sm">开启</button><?php endif; ?>
                                            </td>
                                        </tr>
                                    </table>
                                   
                                    <table class="table table-striped table-hover table-bordered">
                                        <caption class="text-center">联系信息</caption>
                                        <tr>
                                            <th width='20%'>字段</th>
                                            <th>值</th>
                                        </tr>
                                        <tr>
                                            <td>联系人</td>
                                            <td>
                                                <?php echo $infos['linkman']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>手机号码</td>
                                            <td>
                                                <?php echo $infos['phone']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>座机</td>
                                            <td>
                                                <?php echo $infos['tel']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>传真</td>
                                            <td>
                                                <?php echo $infos['fax']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>微信号</td>
                                            <td>
                                                <?php echo $infos['wechat']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>qq号码</td>
                                            <td>
                                                <?php echo $infos['qq']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>联系地址</td>
                                            <td>
                                                <?php echo $infos['address']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>用户头像</td>
                                            <td>
                                                <img src="<?php echo $infos['thumb']; ?>" alt="用户头像" width='100' height='100'>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>
                                                <a href="<?php echo url('edit',['id'=>$infos['id']]); ?>" class="btn btn-primary">编辑</a>
                                                <a href="<?php echo url('lst'); ?>" class="btn btn-default">返回</a>
                                            </td>
                                        </tr>
                                    </table>
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
