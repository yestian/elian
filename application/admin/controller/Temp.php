<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Temp as TempModel;
use app\admin\model\Agent as AgentModel;


class Temp extends Common{
	//代理商列表,通过参数来决定排序方式
	//fld排序方式，默认按id排序，默认排序方式asc，默认顶级id为0
	public function lst(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
		$color=db("temp_color")->select();
		$industry=db("temp_industry")->select();
		if(input('industry_id')!=''){
			$list=db('temp')
			->where('industry_id',input('industry_id'))
			->paginate(12);
		}else{
			$list=db('temp')
			->paginate(12);
		}
		
		$this->assign([
			'list'=>$list,
			'color'=>$color,
			'industry'=>$industry
			]);
		return view();
	}

	public function add(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
		if(request()->isPost()){
			$data=input('post.');
			$data['addtime']=time();
			$add=new TempModel;
			$res=$add->save($data);
			if($res){
				$this->success("模板添加成功！",'lst');
			}else{
				$this->error("模板添加失败！");
			}
		}

		//查询
		$color=db("temp_color")->select();
		$industry=db("temp_industry")->select();
		$this->assign(['color'=>$color,'industry'=>$industry]);
		return view();
	}
	//模板设置
	public function tplset(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
		if(request()->isPost()){
			$data=input('post.');
			if($_FILES['thumb']['tmp_name']){
          	//删除旧图片
          		$pic=db('temp')->find(input('id'));
          		$thumbpath=$_SERVER['DOCUMENT_ROOT'].$pic['thumb'];
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
            $save=db('temp')->where('id',input('id'))->update($data);
            if($save!==false){
            	$this->success('更新成功！','lst');
            }else{
            	$this->error('更新失败！');
            }
		}
		$res=db('temp a')
		->field('a.*,b.id as bid')
		->join('temp_color b','a.color_id=b.id','left')
		->join('temp_industry c','a.industry_id=c.id','left')
		->find(input('a.id'));
		$color=db("temp_color")->select();
		$industry=db("temp_industry")->select();
		$this->assign(['res'=>$res,'color'=>$color,'industry'=>$industry]);
		return view();
	}

	public function setall(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);

		$res=db('temp')->find(input('id'));
		$this->assign('res',$res);
		return view();
	}

	//logo设置,addlogo,editlogo
	public function addlogo(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
		$temp=db('temp')->find(input('id'));
		$this->assign('temp',$temp);
		return view();
	}

}





