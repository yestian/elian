<?php
namespace app\agent\controller;
//继承公共类
use app\agent\controller\Common;
//使用数据模型，进行数据库操作
//数据模型类和控制器类名字相同，因此要起个别名
use app\agent\model\Admin as AdminModel;

class Admin extends Common{

	//管理员列表
	public function lst(){
		//权限赋予
		$auth=new Auth();
		
		$admin=new AdminModel();
		//查询多条数据用select()，单条数据用find()
		//只要某个字段 where('id',1);where(array('id'=>2,'password'=>1));
		//$adminres=db('admin')->select();
		//$adminres=$admin->select();

		//如果不实例化，也可以用静态方法来实现
		//静态方法 get(['id'=>1])和find相同,all得出二维码数组，默认取一条
		//AdminModel::where('id',1)->value('score');
		//where('status',1)->column('username');获取一列数据
		//根据字段名查询
		//根据数据表字段查询一条记录 ::getByPassword('1')

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
		if(request()->isPost()){
			//实例化模型
			$admin=new AdminModel();
			//数据接收
			$data=input('post.');
			$validate=\think\Loader::validate('Admin');//validate下的Admin类
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
		$authGroupRes=db('auth_group')->select();
		$this->assign('authGroupRes',$authGroupRes);
		return view();
	}


	public function edit($id){
		//显示当前id信息
		$admins=db('admin')->find($id);
		//管理员修改
		if(request()->isPost()){
			$data=input('post.');
			$validate=\think\Loader::validate('Admin');//validate下的Admin类
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}
			//save是模型model中的方法
			$admin=new AdminModel();
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
		$authGroupAccess=db('auth_group_access')->where('uid',$id)->find();
		$authGroupRes=db('auth_group')->select();
		$this->assign([
			'admin'=>$admins,
			'authGroupRes'=>$authGroupRes,
			'authGroupAccess'=>$authGroupAccess,
			'groupId'=>$authGroupAccess['group_id']
			]);
		return view();
	}


	public function del($id){
		$admin=new AdminModel();
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
}
