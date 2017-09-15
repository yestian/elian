<?php
namespace app\member\controller;
use think\Controller;
use think\Request;//权限验证

class Common extends Controller{
	//初始化函数，自动执行
	//如果直接访问后台某个方法，先判断是否登录
		public function _initialize(){
			//判断登录
			if(!session('username')||!session('id')){
				$this->error('请先登录系统!','login/index');
			}
			$auth=new Authm();
			$request=Request::instance();
			$con=$request->controller();
			$action=$request->action();
			$name=$con.'/'.$action;
			//超级管理员无需权限
			//以下模块无需权限
			$notcheck=array('Index/index','Member/lst','Member/logout');
			if(session('id')!=1){
				if(!in_array($name, $notcheck)){
					if(!$auth->check($name,session('id'))){
						$this->error('没有权限！','index/index');
					}
				}
				
			}
		}
		


}