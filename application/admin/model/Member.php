<?php
namespace app\admin\model;
use think\Model;

class Member extends Model{
//关联模型
	public function mymember(){
	return $this->hasOne('MemberInfo','uid');
	}

//会员列表
	public function memlst($ctr='Request()->controller()'){

		//充值
		$sub1=db('member_pay')->field('uid,sum(money) as allpay')->group('uid')->buildSql();

		//消费
		$sub2=db('member_buy')->field('uid,sum(expense) as allbuy')->group('uid')->buildSql();
		if($ctr=='Agent'){
			$res=db('member a')
			->field('a.*,b.allpay,c.allbuy')
			->join($sub1.'b','a.id=b.uid','left')
			->join($sub2.'c','a.id=c.uid','left')
			->where('a.aid','neq',0)
			->paginate(10);
		}else{
			$res=db('member a')
			->field('a.*,allpay,allbuy')
			->join($sub1.'b','a.id=b.uid','left')
			->join($sub2.'c','a.id=c.uid','left')
			->paginate(10);
		}
		return $res;
	}
	//代理商所属会员列表
	public function memlst2($aid){

		//充值
		$sub1=db('member_pay')->field('uid,sum(money) as allpay')->group('uid')->buildSql();

		//消费
		$sub2=db('member_buy')->field('uid,sum(expense) as allbuy')->group('uid')->buildSql();
		
			$res=db('member a')
			->field('a.*,allpay,allbuy')
			->join($sub1.'b','a.id=b.uid','left')
			->join($sub2.'c','a.id=c.uid','left')
			->where('aid',$aid)
			->paginate(10);
		return $res;
	}
}