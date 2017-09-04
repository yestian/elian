<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Member as MemberModel;
use app\admin\model\Agent as AgentModel;
class Member extends Common{
	//所有会员
	public function lst(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);


		$listM=new MemberModel;
		$list=$listM->memlst();
		$this->assign([
			'list'=>$list
			]);
		return view();
	}


//代理商所属会员
public function sublst($aid){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);


		$listM=new MemberModel;
		$list=$listM->memlst2($aid);
		$this->assign([
			'list'=>$list
			]);
		return view();
	}

	public function add(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);
		//查询menu公共信息



		if(request()->isPost()){
			$data=input('post.');

			//引入验证
			$validate=\think\Loader::validate('Member');
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}

			$data1=[
				'username'=>input('username'),
				'password'=>input('password'),
				'company'=>input('company'),
				'domain'=>input('domain'),
				'state'=>input('state'),
				'aid'=>input('aid'),
			];

			$data2=[
				'linkman'=>input('linkman'),
				'phone'=>input('phone'),
				'tel'=>input('tel'),
				'fax'=>input('fax'),
				'wechat'=>input('wechat'),
				'qq'=>input('qq'),
				'address'=>input('address'),
				'uid'=>input('uid'),
				'signdate'=>time(),
			];
			//------------------------------插入数据
			$member=MemberModel::create($data1);
			$member->save($data1);
			$res=$member->mymember()->save($data2);
			

			if($res){
				$this->success('添加会员成功！','lst');
			}else{
				$this->error('添加会员失败！');
			}
		}
		return view();
	}

	public function edit(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);
		//提交
		if(request()->isPost()){
			$data=input('post.');
			//引入验证
			$validate=\think\Loader::validate('Member');
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}
			//实例化
			$member=MemberModel::get(input('id'));
			//图片处理---------------------------------------------
           if($_FILES['thumb']['tmp_name']){
          	//删除旧图片
				$arts=db('member a')->field('thumb')->join('member_info b','a.id=b.uid','left')->where(array('id'=>input('id')))->find();
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
				'company'=>input('company'),
				'domain'=>input('domain'),
				'state'=>input('state'),
				'aid'=>input('aid'),
			];

			
			//更新本模型
			$member->save($data1);
			// 更新关联模型
			$res=$member->mymember->save($data2);

			if($res!==false){
				$this->success('修改代理商成功！','lst');
			}else{
				$this->error('修改代理商失败！');
			}
			return;
		}

		//展示
		$infos=db('member a')
		->join('member_info b','a.id=b.uid','left')
		->find(input('id'));
		$this->assign('infos',$infos);
		return view();
	}
	
	public function del(){
		$res=db('member_pay')
		->where('uid','=',input('id'))
		->select();
		if($res){
			$this->error('有充值记录，禁止删除！');
		}else{
			// 查询
			$del = MemberModel::get(input('id'));
			// 删除当前及关联模型
			$res=$del->together('mymember')->delete();
			if($res){
				$this->success('删除成功！','lst');
			}else{
				$this->error('删除失败！');
			}
		}
	}
	public function detail(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);
		//统计总充值金额
		$allpay=db('member_pay')->field('sum(money) as pays')->where('uid','eq',input('id'))->find();

		//统计总消费金额
		$allbuy=db('member_buy')->field('sum(expense) as buys')->where('uid','eq',input('id'))->find();
		$infos=db('member a')
		->join('member_info b','a.id=b.uid')
		->find(input('id'));
		$this->assign([
			'infos'=>$infos,
			'allpay'=>$allpay,
			'allbuy'=>$allbuy,
			]);
		return view();
	}
}