<?php
namespace app\admin\model;
use think\Model;

class Tpl extends Model{
   	protected static function init(){
		//插入之前执行的方法
		Tpl::event('before_insert',function($data){
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
	}
}