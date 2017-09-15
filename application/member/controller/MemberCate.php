<?php
namespace app\member\controller;
use app\member\controller\Common;
use app\member\model\MemberCate as MemberCateModel;
use app\member\model\Member as MemberModel;

class MemberCate extends Common{
	protected $beforeActionList=[
		'delsoncate'=>['only'=>'del']
	];
	public function lst(){
		$menumodel=new MemberModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);

		$cate=new MemberCateModel();
		//sort排序
		if(request()->isPost()){
			$sorts=input('post.');
			foreach ($sorts as $k => $v) {
				$cate->update(['id'=>$k,'sort'=>$v]);
			}
			$this->success('更新排序成功！','lst');
			return;
		}
		$cateres=$cate->catetree();
		$this->assign('cateres',$cateres);
		return view();
	}

	public function add(){
		$menumodel=new MemberModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
		//实例化后就可以使用save方法
		$cate=new MemberCateModel();
		if(request()->isPost()){
			$data=input('post.');
			/*$validate=\think\Loader::validate('Cate');
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}*/
			$add=$cate->save($data);
			if($add){
				$this->success('栏目添加成功！','lst');
			}else{
				$this->error('栏目添加失败！');
			}
			return;
		}
		$cateres=$cate->catetree();
		$this->assign('cateres',$cateres);
		return view();
	}

	public function edit(){
		$menumodel=new MemberModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
		$cate=new MemberCateModel();
		if(request()->isPost()){
			$data=input('post.');
			$validate=\think\Loader::validate('Cate');
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}
			$save=$cate->save($data,input('id'));
			if($save!==false){
				$this->success('修改栏目成功','lst');
			}else{
				$this->error('修改栏目失败！');
			}
		}
		$cates=$cate->find(input('id'));
		$cateres=$cate->catetree();
		$this->assign(array(
				'cateres'=>$cateres,
				'cates'=>$cates
			));

		return view();
	}

	public function del(){
		//$cate=new MemberCateModel();
		//$del=$cate->destroy(input('id'));
		$del=db('member_cate')->delete(input('id'));
		if($del){
			$this->success('栏目删除成功！','lst');
		}else{
			$this->error('栏目删除失败！');
		}
		
	}
	//删除栏目前，先删除子栏目
	public function delsoncate(){
		//要删除的当前栏目id
		$cateid=input('id');
		$cate=new MemberCateModel();
		$sonids=$cate->getchildrenid($cateid);
		//把主栏目的id也放到数组中
		$allcateid=$sonids;
		$allcateid[]=$cateid;
		//删除这些栏目下的文章
		foreach ($allcateid as $k => $v) {
			//批量删除文章
			db('member_article')->where(array('cateid'=>$v))->delete();
		}
		//删除数据集合
		//有子栏目才执行删除方法
		if($sonids){
			db('member_cate')->delete($sonids);
		}
		

	}







}