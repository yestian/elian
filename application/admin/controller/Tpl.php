<?php
namespace app\admin\controller;
use think\Controller;
use app\admin\model\Tpl as TplModel;



class Tpl extends Controller{
	public function index($id=1){
		//根据模板id，显示对应的内容，默认展示id=1的内容
		//展示内容是所有人都可以看的，因此路由必须重新配置，看起来像是根目录的如：
		//tpl-1/index
		//tpl-1/cateid-3
		//tpl-1/article-12.html
		return view();
	}

}





