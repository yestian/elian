<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Agent as AgentModel;

class Index extends Common{
	
	public function index(){
		$res=new AgentModel;
		$conf=$res->getconf();
		$this->assign([
			'conf'=>$conf
			]);
		return view();
	}
	public function index2(){
		return view();
	}
	public function index3(){
		return view();
	}
	public function index4(){
		return view();
	}
	public function index5(){
		return view();
	}
	public function index6(){
		return view();
	}
}