<?php
namespace app\member\controller;
use app\member\controller\Common;
use app\member\model\MemberAdmin as MemberAdminModel;
use app\member\model\Member as MemberModel;

class MemberAdmin extends Common{


	//管理员列表
	public function lst(){
		$menumodel=new MemberModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
		//权限赋予
		$auth=new Auth();
		$admin=new MemberAdminModel();
		$adminres=$admin->getadmin();
		foreach ($adminres as $k => $v) {
			$_groupTitle=$auth->getGroups($v['id']);
			$groupTitle=$_groupTitle[0]['title'];
			$v['groupTitle']=$groupTitle;

		}
		$this->assign('adminres',$adminres);
		return view();
	}


	public function add(){
		$menumodel=new MemberModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
		if(request()->isPost()){
			//实例化模型
			//添加管理员，不可以为admin，因为member表中已经有默认的了
			if(input('username')=='admin'){
				$this->error('用户名admin已经存在');
			}
			$admin=new MemberAdminModel();
			//数据接收
			$data=input('post.');
			$validate=\think\Loader::validate('MemberAdmin');//validate下的Admin类
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}
			//模型方法提交数据
			$res=$admin->addAdmin($data);
			//助手函数，如果添加多条数据insertAll()
			//$res=db('admin')->insert($data);
			if($res){
				$this->success('管理员添加成功！','lst');
			}else{
				//默认返回前一页，一般不需要设置跳转
				$this->error('管理员添加失败！');
			}
			//处理数据的时候，界面不用再显示
			return;
		}
		//获取用户组
		$authGroupRes=db('auth_groupm')->select();
		$this->assign('authGroupRes',$authGroupRes);
		return view();
	}


	public function edit($id){
		$menumodel=new MemberModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
		//显示当前id信息
		$admins=db('member_admin')->find($id);
		//管理员修改
		if(request()->isPost()){
			$data=input('post.');
			/*$validate=\think\Loader::validate('Admin');//validate下的Admin类
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}*/
			//save是模型model中的方法
			$admin=new MemberAdminModel();
			$savenum=$admin->editadmin($data,$admins);
			if($savenum==2){
				$this->error('管理员用户名不能为空！');
			}
			if($savenum!==false){
				$this->success('管理员修改成功！','lst');
			}else{
					$this->error('管理员修改失败！');
				}
			return;
		}
		
		//通过url修改管理员id，直接访问
		if(!$admins){
			$this->error('该管理员不存在！');
		}
		//查找用户组
		$authGroupAccess=db('auth_group_accessm')->where('uid',$id)->find();
		$authGroupRes=db('auth_groupm')->select();
		$this->assign([
			'admin'=>$admins,
			'authGroupRes'=>$authGroupRes,
			'authGroupAccess'=>$authGroupAccess,
			'groupId'=>$authGroupAccess['group_id']
			]);
		return view();
	}


	public function del($id){
		$admin=new MemberAdminModel();
		$delnum=$admin->deladmin($id);
		if($delnum==2){
			$this->success('管理员删除成功！','lst');
		}else{
			$this->error('管理员删除失败！');
		}

		return view();
	}


	//退出登录
	//因为只有登录之后，才需要退出，所以这个方法写在管理员类里面，而不是登录注册类
	public function logout(){

		session(null);
		$this->success('退出系统成功！','login/index');
	}

	public function logout2(){
		//通过js跳转
		session(null);
	}
}
