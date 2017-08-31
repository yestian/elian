<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Member as MemberModel;
use app\admin\model\Agent as AgentModel;
class Member extends Common{
	//上传列表
	public function lst($ctr='Request()->controller()'){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);


		$listM=new MemberModel;
		$list=$listM->memlst($ctr);
		$this->assign([
			'list'=>$list,
			'ctr'=>$ctr
			]);
		return view();
	}



	public function add(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);
		//查询menu公共信息



		if(request()->isPost()){
			$data=input('post.');
			//注册时间取当前时间
			$data['signdate']=time();
			//引入验证
			$validate=\think\Loader::validate('Member');
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}

			$data1=[
				'username'=>input('username'),
				'password'=>input('password'),
				'company'=>input('company'),
				'domain'=>input('domain'),
				'state'=>input('state'),
				'aid'=>input('aid'),
			];

			$data2=[
				'linkman'=>input('linkman'),
				'phone'=>input('phone'),
				'tel'=>input('tel'),
				'fax'=>input('fax'),
				'wechat'=>input('wechat'),
				'qq'=>input('qq'),
				'address'=>input('address'),
				'uid'=>input('uid'),
				'signdate'=>time(),
			];
			//------------------------------插入数据
			$member=MemberModel::create($data1);
			$member->save($data1);
			$res=$member->mymember()->save($data2);
			

			if($res){
				$this->success('添加会员成功！','lst');
			}else{
				$this->error('添加会员失败！');
			}
		}
		return view();
	}

	public function edit(){
		return view();
	}
	
	public function del(){

	}
	public function detail(){
		return view();
	}
}