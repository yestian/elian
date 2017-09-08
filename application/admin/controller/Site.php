<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Site as SiteModel;
use app\admin\model\Agent as AgentModel;
class Site extends Common{
	//所有会员
	public function lst($fld='id',$way='asc'){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		//conf全站配置信息
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);

		$list=db('site a')
		->field('a.*,b.username')
		->join('member b','a.uid=b.id','left')
		->join('agent c','a.uid=c.id','left')
		->order("$fld $way")
		->paginate(10);
		$this->assign([
			'list'=>$list
			]);
		return view();
	}
	//代理站点
public function lsta($fld='id',$way='asc'){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		//conf全站配置信息
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);

		$list=db('site a')
		->field('a.*,b.username,b.id as aid')
		->join('agent b','a.aid=b.id')
		->order("$fld $way")
		->paginate(10);
		$this->assign([
			'list'=>$list
			]);
		return view();
	}
	//会员站点
	public function lstb($fld='id',$way='asc'){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		//conf全站配置信息
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);

		$list=db('site a')
		->field('a.*,b.username')
		->join('member b','a.uid=b.id')
		->order("$fld $way")
		->paginate(10);
		$this->assign([
			'list'=>$list
			]);
		return view();
	}


	public function add(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
		//查询menu公共信息



		if(request()->isPost()){
			$data=input('post.');
			$data['paytime']=time();
			$res=db('site')->insert($data);
			

			if($res){
				$this->success('添加会员成功！','lst');
			}else{
				$this->error('添加会员失败！');
			}
		}
		return view();
	}

	public function edit(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);

		if(request()->isPost()){
			$data=input('post.');
			$save=db('site')->update($data);
			if($save!==false){
				$this->success('更新成功！','lst');
			}else{
				$this->error('更新失败！');
			}
		}
		$res=db('site')->find(input('id'));
		$this->assign('res',$res);
		return view();
	}
	public function del(){
		$res=db('site')->delete(input('id'));
			if($res){
				$this->success('删除成功！','lst');
			}else{
				$this->error('删除失败！');
			}
		}
	
	
}