<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Agent as AgentModel;
class AgentBuy extends Common{
	
	public function lst($fld='id',$way='asc'){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);

		$list=db('agent_buy a')
		->field('a.*,b.id as pid,b.agentname')
		->join('agent b','a.aid=b.id','left')
		->order("$fld $way")->paginate(10);
		$this->assign('list',$list);
		return view('agentbuy/lst');
	}
//财务模块
	public function agentbuy($fld='id',$way='asc'){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);

		$list=db('agent_buy a')
		->field('a.*,b.id as pid,b.agentname')
		->join('agent b','a.aid=b.id','left')
		->order("$fld $way")->paginate(10);
		$this->assign('list',$list);
		return view('finance/agentbuy');
	}


	public function del(){
		$res=db('agent_buy')->delete(input('id'));
		if($res){
			$this->success('删除成功！','lst');
		}else{
			$this->error('删除失败！');
		}
	}
}





