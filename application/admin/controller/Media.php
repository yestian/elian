<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Agent as AgentModel;
use app\admin\model\Media as MediaModel;

class Media extends Common{
	
	public function lst($fld='id',$way='asc'){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign([
			'menu'=>$menu
			]);

		$list=db('media a')
		->field('a.*,b.zonename,c.portal,d.channel')
		->join('media_zone b','a.zid=b.id','left')
		->join('media_portal c','a.pid=c.id','left')
		->join('media_channel d','a.cid=d.id','left')
		->order("$fld $way")->paginate(10);
		$this->assign('list',$list);
	 	return view();
	}

	public function add(){
		//获取频道列表
		$channel=db('media_channel')->select();
		//获取门户列表
		$portal=db('media_portal')->select();
		//获取地区列表
		$zone=db('media_zone')->select();
		//获取公共模块
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();

		//添加新闻
		if(request()->isPost()){
			$data=input('post.');
			$res=db('media')->insert($data);
			if($res){
				$this->success('添加成功！','lst');
			}else{
				$this->error('添加失败！');
			}
		}
		$this->assign([
			'menu'=>$menu,
			'channel'=>$channel,
			'portal'=>$portal,
			'zone'=>$zone
			]);
		return view();
	}

	public function edit(){
		//获取频道列表
		$channel=db('media_channel')->select();
		//获取门户列表
		$portal=db('media_portal')->select();
		//获取地区列表
		$zone=db('media_zone')->select();
		//获取公共模块
		$menumodel=new AgentModel;

		//更新
		if(request()->isPost()){
			$data=input('post.');
			$save=db('media')->where('id',input('id'))->update($data);
			if($save!==false){
				$this->success('更新成功！','lst');
			}else{
				$this->error('更新失败！');
			}
		}
		$menu=$menumodel->menu();
		$this->assign([
			'menu'=>$menu,
			'channel'=>$channel,
			'portal'=>$portal,
			'zone'=>$zone
			]);


		$res=db('media')->find(input('id'));
		$this->assign('res',$res);
		return view();
	}

	public function del(){
		$res=db('media')->delete(input('id'));
		if($res){
			$this->success('删除成功！','lst');
		}else{
			$this->error('删除失败！');
		}
		
	}
	
}