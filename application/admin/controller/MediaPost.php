<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Agent as AgentModel;

class MediaPost extends Common{
	public function lst(){
		//获取公共模块
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$list=db('media_post a')
		->field('a.*,b.prize,b.title as media_title')
		->join('media b','a.mid=b.id','left')
		->paginate(10);
	
		$this->assign([
			'menu'=>$menu,
			'list'=>$list
			]);
		return view();
	}
//稿件详情
	public function detail(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$res=db('media_post')->field('content,file,title')->find(input('id'));
		$this->assign([
			'menu'=>$menu,
			'res'=>$res
			]);
		return view();
	}
	
	public function edit(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		//编辑更新
		if(request()->isPost()){
			$data=input('post.');
			$save=db('media_post')->where('id',input('id'))->update($data);
			if($save!==false){
				$this->success('更新成功','lst');
			}else{
				$this->error('更新失败！');
			}
		}
		
		$res=db('media_post')->find(input('id'));
		$this->assign([
			'menu'=>$menu,
			'res'=>$res
			]);
		return view();
	}
}