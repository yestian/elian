<?php
namespace think;
// 定义项目路径
define('APP_PATH', __DIR__ . '/../application/');
define('SITE_URL', 'http://www.aselian.com');
// 加载框架基础文件
require __DIR__ . '/../thinkphp/base.php';
// 绑定当前入口文件到admin模块
Route::bind('member');
// 关闭admin模块的路由
App::route(false);
// 执行应用
App::run()->send();