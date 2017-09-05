<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\Article as ArticleModel;
use app\admin\model\Cate as CateModel;
use app\admin\model\Agent as AgentModel;

class Article extends Common{
	public function lst(){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
		//连表查询，使用栏目名称
		$artres=db('article')->field('a.*,b.catename')->alias('a')->join('cate b','a.cateid=b.id')->paginate(10);
		$this->assign('artres',$artres);
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
		//获取栏目列表，文章要指定一个栏目
		$cate=new CateModel();
		$cateres=$cate->catetree();

		if(request()->isPost()){
			$data=input('post.');
			$validate=\think\Loader::validate('Article');//validate下的Article类
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}
			$article=new ArticleModel();
			//实例化后，会先运行模型层的钩子函数，进行图片上传
			
			$res=$article->save($data);
			if($res){
				$this->success('文章添加成功！','lst');
			}else{
				$this->error('文章添加失败！');
			}
			return;
		}
		$this->assign('cateres',$cateres);
		return view();
	}




public function edit(){
	$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$conf=$menumodel->getconf();
		$this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
        if(request()->isPost()){
            $data=input('post.');
            $validate=\think\Loader::validate('Article');//validate下的Article类
			if(!$validate->check($data)){
				$this->error($validate->getError());
			}
            $article=new ArticleModel();
            //图片处理
           if($_FILES['thumb']['tmp_name']){
          	//删除旧图片
          		$arts=$article->find(input('id'));
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
            $save=$article->update($data);
            if($save){
                $this->success('修改文章成功！',url('lst'));
            }else{
                $this->error('修改文章失败！');
            }
            return;
        }

        $cate=new CateModel();
        $cateres=$cate->catetree();
        $arts=db('article')->where(array('id'=>input('id')))->find();
        $this->assign(array(
            'cateres'=>$cateres,
            'arts'=>$arts,
            ));
        return view();
    }



	public function del(){
		$res=ArticleModel::destroy(input('id'));
		if($res){
			$this->success("删除文章成功！",'lst');
		}else{
			$this->error("文章删除失败！");
		}
		
	}
}