<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Agent as AgentModel;


class Agent extends Common{
	//代理商列表,通过参数来决定排序方式
	public function lst($fld='id',$way='asc'){
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

		$this->assign('list',$list);
		return view();
	}

	//添加代理商
	public function add(){
		if(request()->isPost()){
			$data=input('post.');
			//注册时间取当前时间
			$data['signdate']=time();
			//引入验证
			$validate=\think\Loader::validate('Agent');
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}

			//实例化，插入数据
			$agent=new AgentModel();
			$res=$agent->save($data);
			if($res){
				$this->success('添加代理商成功！','lst');
			}else{
				$this->error('添加代理商失败！');
			}
		}
		return view();
	}



	public function edit(){
		if(request()->isPost()){
			$data=input('post.');
			//引入验证
			$validate=\think\Loader::validate('Agent');
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}
			//实例化
			$agent=new AgentModel();
			//图片处理
           if($_FILES['thumb']['tmp_name']){
          	//删除旧图片
          		$arts=$agent->find(input('id'));
          		$thumbpath=$_SERVER['DOCUMENT_ROOT'].$arts['thumb'];
                if(file_exists($thumbpath)){
                	@unlink($thumbpath);
                }
                //上传新图片
                $file = request()->file('thumb');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                //存入变量
                if($info){
                    // $thumb=ROOT_PATH . 'public' . DS . 'uploads'.'/'.$info->getExtension();
                    $thumb=DS.'uploads'.'/'.$info->getSavename();
                    $data['thumb']=$thumb;
                }

            }
            //更新记录
			$res=$agent->save($data,['id'=>input('id')]);
			if($res!==false){
				$this->success('修改代理商成功！','lst');
			}else{
				$this->error('修改代理商失败！');
			}
			return;
		}
		//获取记录值
		$getres=db('agent')->where(array('id'=>input('id')))->find();
		$this->assign(array(
				'getres'=>$getres,
			));
		return view();
	}
	//代理商详细信息
	public function detail(){
		$infos=db('agent')->find(input('id'));
		$this->assign('infos',$infos);
		return view();
	}
}





