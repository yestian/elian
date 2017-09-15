<?php
namespace app\member\controller;
use app\member\controller\Common;
use app\member\model\Member as MemberModel;

class Index extends Common{
	public function index(){
		$res=new MemberModel;
		$conf=$res->getconf();
		$this->assign([
			'conf'=>$conf
			]);
		return view();
	}
	
}