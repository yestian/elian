<?php
namespace app\admin\model;
use think\Model;

class Agent extends Model{
   	
	//创建关联模型
	//1.方法名为要关联的模型名
	public function myagent(){
		//2.确定关联关系
		return $this->hasOne('AgentInfo','aid');
	}

  	//共用的内容menu
  	public function menu(){
  		//付费代理数
  		$sum1=db('agent_pay')->field('aid,count(id) as agentsum2')->where('money','>',0)->group('aid')->buildSql();
  		//
  		//代理商总充值
  		$sum2=db('agent_pay')->field('aid,sum(money) as allpay')->buildSql();
  		//代理总会员数
  		$sum3=db('member')->field('aid,count(id) as agent_member_sum')->where('aid','neq',0)->buildSql();
  		//代理商今日充值总金额
  		$sum4=db('agent_pay')
  		->field('aid,paytime,sum(money) as today_pay')
  		->whereTime('paytime','today')
  		->buildSql();
  		//代理商今日登陆后台数量
  		$sum5=db('agent_login')
  		->field('aid,count(id) as today_logins')
  		->whereTime('logintime','today')
  		->buildSql();


		$res=db('agent a')
		->field('count(a.id) as agentsum,agentsum2,allpay,agent_member_sum,today_pay,today_logins')
		->join($sum1.'b','a.id=b.aid','left')
		->join($sum2.'c','a.id=c.aid','left')
		->join($sum3.'d','a.id=d.aid','left')
		->join($sum4.'e','a.id=e.aid','left')
		->join($sum5.'f','a.id=f.aid','left')
		->select();
  		return $res[0];
  	}
}