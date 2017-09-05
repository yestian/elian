<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Conf as ConfModel;
use app\admin\model\Agent as AgentModel;

class Conf extends Common{
	public function lst(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
		//排序
		if(request()->isPost()){
			$conf=new ConfModel;
			$sorts=input('post.');
			foreach ($sorts as $k => $v) {
				$conf->update(['id'=>$k,'sort'=>$v]);
			}
			$this->success('更新排序成功！','lst');
			return;
		}
		
		$confres=ConfModel::order('sort desc')->paginate(10);
		$this->assign('confres',$confres);
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
		if(request()->isPost()){
			$data=input('post.');
			//可选项，中文逗号的替换
			if($data['values']){
				$data['values']=str_replace('，', ',', $data['values']);
			}
			//数据验证
			$validate=\think\Loader::Validate('Conf');
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}

			$conf=new ConfModel;
			//$confres=$conf->insert($data);
			$confres=$conf->save($data);
			if($confres){
				$this->success('配置添加成功！','lst');
			}else{
				$this->error('配置添加失败！');
			}
			return;
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
			//数据验证
			$validate=\think\Loader::Validate('Conf');
			if(!$validate->scene('edit')->check($data)){
				$this->error($validate->getError());
			}
			if($data['values']){
				$data['values']=str_replace('，', ',', $data['values']);
			}
			$save=ConfModel::update($data);
			if($save){
				$this->success('配置修改成功！','lst');
			}else{
				$this->error('配置修改失败！');
			}
			return;
		}
		//当前id的信息显示
		$confs=ConfModel::find(input('id'));
		$this->assign('confs',$confs);
		return view();
	}

	public function del(){
		$res=new ConfModel;
		$res->destroy(input('id'));
		if($res){
			$this->success("配置删除成功！",'lst');
		}else{
			$this->error("配置删除失败！");
		}
		
	}

	public function conf(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
		//配置前端的value值
		if(request()->isPost()){
			$data=input('post.');
			//提交的数据组成数组
			$formarr=array();
			foreach ($data as $k => $v) {
				$formarr[]=$k;
			}
			//数据库查找的数据二维数组
			$_confarr=db('conf')->field('enname')->select();
			$confarr=array();
			foreach ($_confarr as $k => $v) {
				$confarr[]=$v['enname'];
			}
			//得到enname的一维数组
			$checkboxarr=array();
			foreach ($confarr as $k => $v) {
				//如果表中的字段不在提交的字段中
				if(!in_array($v, $formarr)){
					$checkboxarr[]=$v;
				}
			}
			//清空checkbox里的值
			foreach ($checkboxarr as $k => $v) {
				ConfModel::where('enname',$v)->update(['value'=>'']);
			}
			if($data){
				foreach ($data as $k=> $v) {
					ConfModel::where('enname',$k)->update(['value'=>$v]);
				}
				$this->success("修改配置成功！");
			}
		
			return;
		}
		$confres=ConfModel::order('sort desc')->select();
		$this->assign('confres',$confres);
		return view();
	}
}