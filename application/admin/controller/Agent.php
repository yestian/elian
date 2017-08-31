<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Agent as AgentModel;


class Agent extends Common{
	//代理商列表,通过参数来决定排序方式
	//fld排序方式，默认按id排序，默认排序方式asc，默认顶级id为0
	public function lst($fld='id',$way='asc'){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);

		
		//先查询出关联表的统计数据，组成新表，以得到和主表的一对一关系
		//充值
		$sub1=db('agent_pay')->field('aid,sum(money) as allpay')->group('aid')->buildSql();
		//消费
		$sub2=db('agent_buy')->field('aid,sum(expense) as allbuy')->group('aid')->buildSql();
		//下级代理商数量，同表关联
		$sub3=db('agent')->field('upid,count(id) as upidsum')->group('upid')->buildSql();
		//会员数量
		$sub4=db('member')->field('aid,count(id) as memsum')->group('aid')->buildSql();
		//然后再和主表join
		$list=db('agent a')
		->field('a.*,b.allpay,(allpay-allbuy) as balance,upidsum,memsum')
		->join($sub1.'b','a.id=b.aid','left')
		->join($sub2.'c','a.id=c.aid','left')
		->join($sub3.'d','a.id=d.upid','left')
		->join($sub4.'e','a.id=e.aid','left')
		->order("$fld $way")
		->paginate(10);

		$this->assign(array(
			'list'=>$list
		));
		return view();
	}
	//下级代理商列表，只比lst()方法多一个$pid,一个where条件
	public function sonlst($fld='id',$way='asc',$pid=''){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);
		//先查询出关联表的统计数据，组成新表，以得到和主表的一对一关系
		//充值
		$sub1=db('agent_pay')->field('aid,sum(money) as allpay')->group('aid')->buildSql();
		//消费
		$sub2=db('agent_buy')->field('aid,sum(expense) as allbuy')->group('aid')->buildSql();
		//下级代理商数量，同表关联
		$sub3=db('agent')->field('upid,count(id) as upidsum')->group('upid')->buildSql();
		//会员数量
		$sub4=db('member')->field('aid,count(id) as memsum')->group('aid')->buildSql();
		//然后再和主表join
		$list=db('agent a')
		->field('a.*,b.allpay,(allpay-allbuy) as balance,upidsum,memsum')
		->join($sub1.'b','a.id=b.aid','left')
		->join($sub2.'c','a.id=c.aid','left')
		->join($sub3.'d','a.id=d.upid','left')
		->join($sub4.'e','a.id=e.aid','left')
		->where('a.upid','=',$pid)
		->order("$fld $way")
		->paginate(10);
//---------------------------------------------

		$this->assign(array(
			'list'=>$list
		));
		return view();
	}


	//添加代理商
	public function add(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);
		//查询menu公共信息



		if(request()->isPost()){
			$data=input('post.');
			//注册时间取当前时间
			$data['signdate']=time();
			//引入验证
			$validate=\think\Loader::validate('Agent');
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}

			$data1=[
				'username'=>input('username'),
				'password'=>input('password'),
				'agentname'=>input('agentname'),
				'level'=>input('level'),
				'domain'=>input('domain'),
				'status'=>input('status'),
				'upid'=>input('upid'),
			];

			$data2=[
				'linkman'=>input('linkman'),
				'phone'=>input('phone'),
				'tel'=>input('tel'),
				'fax'=>input('fax'),
				'wechat'=>input('wechat'),
				'qq'=>input('qq'),
				'address'=>input('address'),
				'signdate'=>time(),
			];
			//------------------------------插入数据
			$agent=AgentModel::create($data1);
			$agent->save($data1);
			$res=$agent->myagent()->save($data2);
			

			if($res){
				$this->success('添加代理商成功！','lst');
			}else{
				$this->error('添加代理商失败！');
			}
		}
		return view();
	}



	public function edit(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);
		// 查询原表
		$agent=AgentModel::get(input('id'));
		//查询关联表
		$agent2 = $agent->myagent;


		if(request()->isPost()){
			$data=input('post.');
			//引入验证
			$validate=\think\Loader::validate('Agent');
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}
			//实例化
			$agent=AgentModel::get(input('id'));
			//图片处理---------------------------------------------
           if($_FILES['thumb']['tmp_name']){
          	//删除旧图片
				$arts=db('agent a')->field('thumb')->join('agent_info b','a.id=b.aid','left')->where(array('id'=>input('id')))->find();
          		$thumbpath=$_SERVER['DOCUMENT_ROOT'].$arts['thumb'];
                if(file_exists($thumbpath)){
                	@unlink($thumbpath);
                }
                //上传新图片
                $file = request()->file('thumb');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                //存入变量
                if($info){
                    $thumb=DS.'uploads'.'/'.$info->getSavename();
                    $data2=[
	                    'thumb'=>$thumb,
	                    'linkman'=>input('linkman'),
						'phone'=>input('phone'),
						'tel'=>input('tel'),
						'fax'=>input('fax'),
						'wechat'=>input('wechat'),
						'qq'=>input('qq'),
						'address'=>input('address'),
	                ];
                }

            }else{
            	$data2=[
					'linkman'=>input('linkman'),
					'phone'=>input('phone'),
					'tel'=>input('tel'),
					'fax'=>input('fax'),
					'wechat'=>input('wechat'),
					'qq'=>input('qq'),
					'address'=>input('address'),
				];
            }
            //-----------------------------------------------------
            $data1=[
				'password'=>input('password'),
				'agentname'=>input('agentname'),
				'level'=>input('level'),
				'domain'=>input('domain'),
				'status'=>input('status'),
				'upid'=>input('upid'),
			];

			
			//更新本模型
			$agent->save($data1);
			// 更新关联模型
			$res=$agent->myagent->save($data2);

			if($res!==false){
				$this->success('修改代理商成功！','lst');
			}else{
				$this->error('修改代理商失败！');
			}
			return;
		}
		//获取记录值,展示编辑时候的默认页面
		$this->assign(array(
				'agent'=>$agent,
				'agent2'=>$agent2
			));
		return view();
	}



	//代理商详细信息
	public function detail(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);
		//统计下级代理商数量
		$subnum=db('agent')->field('count(id) as upidsum')->where('upid','eq',input('id'))->find();
		//下级代理商列表
		$subagent=db('agent')
		->where('upid','in',input('id'))
		->limit(3)
		->select();
		//本代理商的会员
		//会员数量统计
		$mymem=db('member')->field('count(id) as sums')->where('aid','eq',input('id'))->find();
		//会员列表
		$members=db('member')
		->where('aid','in',input('id'))
		->limit(3)
		->select();
		//统计总充值金额
		$allpay=db('agent_pay')->field('sum(money) as pays')->where('aid','eq',input('id'))->find();
		//统计总消费金额
		$allbuy=db('agent_buy')->field('sum(expense) as buys')->where('aid','eq',input('id'))->find();

		//agent表的基本查找-------------------------------------------------------------------------
		$infos=db('agent a')
		->join('agent_info b','a.id=b.aid','left')
		->find(input('id'));
		$this->assign(array(
			'infos'=>$infos,
			'subagent'=>$subagent,
			'subnum'=>$subnum,
			'mymem'=>$mymem,
			'members'=>$members,
			'allpay'=>$allpay,
			'allbuy'=>$allbuy,
			));
		return view();
	}	

}





