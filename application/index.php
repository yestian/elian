<?
use think\Route;
//顶级博客栏目配置
Route::get('blog$','index/index/blog');
Route::get('profile$','index/index/profile');
Route::get('magzine$','index/index/magzine');
Route::get('jiameng$','index/index/jiameng');
Route::get('temp$','index/index/temp');
//二级栏目配置，多了一个id
Route::get('blog/:id$','index/index/blog');












// 博客文章配置
Route::get('read/:id','index/index/read',['ext'=>'html']);