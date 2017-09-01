<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Agent as AgentModel;
class MemberPay extends Common{
	
	public function lst($fld='id',$way='asc'){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);

		$list=db('member_pay a')
		->field('a.*,b.id as pid,b.company')
		->join('member b','a.uid=b.id','left')
		->order("$fld $way")->paginate(10);
		$this->assign('list',$list);
		return view('memberpay/lst');
	}
	public function sublst($fld='id',$way='asc',$id){
			$menumodel=new AgentModel;
			$menu=$menumodel->menu();
			$this->assign('menu',$menu);

			$list=db('member_pay a')
			->field('a.*,b.id as pid,b.company')
			->join('member b','a.uid=b.id','left')
			->where('a.uid',$id)
			->order("$fld $way")->paginate(10);
			$this->assign('list',$list);
			return view('memberpay/lst');
		}

	public function del(){
		$res=db('member_pay')->delete(input('id'));
		if($res){
			$this->success('删除成功！','lst');
		}else{
			$this->error('删除失败！');
		}
	}
}





