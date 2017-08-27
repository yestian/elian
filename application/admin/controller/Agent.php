<?php
namespace app\admin\controller;
use app\admin\controller\Common;


class Agent extends Common{
	//代理商列表
	public function lst(){
		//先查询出关联表的统计数据，组成新表，以得到和主表的一对一关系
		$sub1=db('agent_pay')->field('aid,sum(money) as allpay')->group('aid')->buildSql();
		$sub2=db('agent_buy')->field('aid,sum(expense) as allbuy')->group('aid')->buildSql();
		//然后再和主表join
		$list=db('agent a')
		->join($sub1.'b','a.id=b.aid','left')
		->join($sub2.'c','a.id=c.aid','left')
		->paginate(10);

		$this->assign('list',$list);
		return view();
	}









	//添加代理商
	public function add(){
		if(request()->isPost()){
			$data=input('post.');
			$res=db('agent')->insert($data);
			if($res){
				$this->success('添加代理商成功！','lst');
			}else{
				$this->error('添加代理商失败！');
			}
		}
		return view();
	}

	public function edit(){
		return view();
	}

	public function del(){
		
	}
}





