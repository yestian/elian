<?php
namespace app\member\controller;
use app\member\controller\Common;
use app\member\model\Member as MemberModel;
class MemberPay extends Common{
	//充值，通过支付宝，微信等充值到账户余额
	public function pay(){
		$menumodel=new MemberModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
		]);

		return view('finance/pay');
	}
	//订单列表
	public function orderlst(){
		$menumodel=new MemberModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
		]);
		$list=db('member_pay')->paginate(10);
		$this->assign('list',$list);
		return view('finance/orderlst');
	}

	//充值记录
	public function paylst($fld='id',$way='asc'){
		$menumodel=new MemberModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);

		$list=db('member_pay a')
		->field('a.*,b.id as pid,b.company')
		->join('member b','a.uid=b.id','left')
		->order("$fld $way")->paginate(10);
		$this->assign('list',$list);
		return view('finance/paylst');
	}

}





