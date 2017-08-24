<?php
namespace app\agent\model;
use think\Model;

class Article extends Model{
	protected static function init(){
		//插入之前执行的方法
		Article::event('before_insert',function($data){
			//图片上传判断
			if($_FILES['thumb']['tmp_name']){
				$file=request()->file('thumb');
				$info=$file->move(ROOT_PATH.'public'.DS.'uploads');
				if($info){
					$thumb=DS.'uploads/'.$info->getSavename();
					$data['thumb']=$thumb;
				}
			}
		});	
		//修改前判断是否有图片
	/*	Article::event('before_update',function($article){
          if($_FILES['thumb']['tmp_name']){
          	//删除旧图片
          		$arts=Article::find($article->id);
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
                    $article['thumb']=$thumb;
                }

            }
      });*/
			//删除文章之前
			Article::event('before_delete',function($article){
          	//删除图片
          		$arts=Article::find($article->id);
          		$thumbpath=$_SERVER['DOCUMENT_ROOT'].$arts['thumb'];
                if(file_exists($thumbpath)){
                	@unlink($thumbpath);
                }
            
      });
	}
}