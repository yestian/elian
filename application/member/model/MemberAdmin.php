<?php
namespace app\member\model;
use think\Model;

class MemberAdmin extends Model{
	public function addAdmin($data){
		if(empty($data) || !is_array($data)){
			return false;
		}
		$data['password']=md5($data['password']);
		//重新接受数据，方便处理用户组表 auth_group_access
		$admindata=array();
		$admindata['username']=$data['username'];
		$admindata['password']=$data['password'];
		//如果添加成功，返回true
		if($this->save($admindata)){
			//提交成功后，下一步存入用户组关联表
			$groupaccess['uid']=$this->id;
			$groupaccess['group_id']=$data['group_id'];
			db('auth_group_accessm')->insert($groupaccess);
			return true;
		}else{
			return false;
		}
	}

	public function getadmin(){
		//return $this->select();
		//查询并分页
		return $this->paginate(10);
	}

	public function editadmin($data,$admins){
		if(!$data['username']){
			//模型层没有error方法
			//$this->error('管理员用户名不能为空！');
			return 2;
			}
			//判断密码是否修改
			//没有填写就使用原来的密码，有的话就重新加密
			if(!$data['password']){
				$data['password']=$admins['password'];
			}else{
				$data['password']=md5(input('password'));
			}
			//修改关联表
			db('auth_group_accessm')->where(array('uid'=>$data['id']))->update(['group_id'=>$data['group_id']]);
			return $this->save(['username'=>$data['username'],'password'=>$data['password']],['id'=>$data['id']]);
	}

	public function deladmin($id){
		if($this::destroy($id)){
			return 2;
		}else{
			return 3;
		}
	}

	public function login($data){
		//用户名验证
		$admin=Admin::getByUsername($data['username']);
		if($admin){
			if($admin['password']==md5($data['password'])){
				session('id',$admin['id']);
				session('username',$admin['username']);

				return 3; //用户名密码都正确，提交
			}else{
				return 4; //密码错误
			}
		}else{
			return 2;//用户名不存在
		}
		//密码验证
	}

}