<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Agent as AgentModel;


class TempLogo extends Common{

	

	public function editpanel(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);

		$res=db('temp')->find(input('id'));
		//判断logo是否已经创建
		//temp的主键值是否在logo表中
		$_isset_logo=db('temp_logo')->where('tpl_id',input('id'))->find();
		if($_isset_logo == 'null'){
			$_isset_logo=array();
		}
		$isset_logo=count($_isset_logo);
		$this->assign([
			'res'=>$res,
			'isset_logo'=>$isset_logo
			]);
		return view('temp/editpanel');
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
		if(request()->isPost()){
			$data=input('post.');


			if($_FILES['logo_img']['tmp_name']){
				$file=request()->file('logo_img');
				$info=$file->move(ROOT_PATH.'public'.DS.'uploads');
				if($info){
					$logo_img=DS.'uploads/'.$info->getSavename();
					$data['logo_img']=$logo_img;
				}
			}
			$logoadd=db('temp_logo')->insert($data);
			if($logoadd){
				$this->success('logo添加成功！','templst');
			}else{
				$this->error('logo添加失败！');
			}
		}
		$this->assign([
			'temp'=>$temp
			]);
		return view('temp/addlogo');
	}

	public function editlogo(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
		]);
		if(request()->isPost()){
			$data=input('post.');
			if($_FILES['logo_img']['tmp_name']){
          	//删除旧图片
          		$pic=db('temp_logo')->find(input('id'));
          		$logo_imgpath=$_SERVER['DOCUMENT_ROOT'].$pic['logo_img'];
                if(file_exists($logo_imgpath)){
                	@unlink($logo_imgpath);
                }
                //上传新图片
                $file = request()->file('logo_img');
                $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
                //存入变量
                if($info){
                    // $logo_img=ROOT_PATH . 'public' . DS . 'uploads'.'/'.$info->getExtension();
                    $logo_img=DS.'uploads'.'/'.$info->getSavename();
                    $data['logo_img']=$logo_img;
                }

            }


		$save=db('temp_logo')->where('id',$data['id'])->update($data);
		if($save!==false){
			$this->success('更新成！','templst');
		}else{
			$this->error('更新失败！');
		}

	}
		$res=db('temp_logo')->where('tpl_id',input('id'))->find();
		$temp=db('temp')->find(input('id'));
		$this->assign([
			'res'=>$res,
			'temp'=>$temp
			]);
		return view('temp/editlogo');
	}

}





