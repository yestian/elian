<?php
namespace app\member\controller;
use app\member\model\MemberAdmin;
use think\Controller;
class Login extends Controller{
	public function index(){
		if(session('username') && session('id')){
			$this->success('你已经登录！','index/index');
		}
		if(request()->isPost()){
			//登录验证码
			$this->check(input('code'));
			$data=input('post.');
			$admin=new MemberAdmin();
			$loginnum=$admin->login($data);
			if($loginnum==3){
				
				//session已在model里面保存，跳转到后台首页
				$this->success('登录成功！','index/index');
			}else{
				$this->error('用户名或密码错误!');
			}
			return;
		}
		return view();
	}



	 // 验证码检测
    public function check($code='')
    {	
    	//助手函数
        if (!captcha_check($code)) {
            $this->error('验证码错误');
        } else {
        	//验证码正确，就无需提示
            return true;
        }
    }
}