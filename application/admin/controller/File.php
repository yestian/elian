<?php
namespace app\admin\controller;
use app\admin\controller\Common;
use app\admin\model\File as FileModel;
use app\admin\model\Agent as AgentModel;
class File extends Common{
	//上传列表
	public function lst($ctr='Request()->controller()'){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);
		if($ctr=='Agent'){
			$list=db('file')->where('owner',1)->paginate(10);
		}else{
			$list=db('file')->paginate(10);	
		}
		$this->assign([
			'list'=>$list,
			'ctr'=>$ctr
			]);
		return view();
	}
	//上传
	public function upload($ctr='Request()->controller()'){
		$menumodel=new AgentModel;
		$menu=$menumodel->menu();
		$this->assign('menu',$menu);

		if(request()->isPost()){
			$data=input('post.');
			$data['addtime']=time();
			$file = request()->file('path');
		    // 移动到框架应用根目录/public/uploads/ 目录下
		    $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
		    if($info){
		    	$doc='/uploads'.'/'.$info->getSavename();
		    	$ext=$info->getExtension();
		    	$data['path']=$doc;
		    	$data['filename']=input('filename').'.'.$ext;
		    }else{
		        $this->error($file->getError());
		    }
		    $res=db('file')->insert($data);
		    if($res){
		    	//如果控制器来自agent，成功后返回agent
		    	if($ctr=='Agent'){
		    		$this->redirect('lst', ['ctr' => $ctr]);
		    	}else{
		    		$this->success('上传成功！','lst');
		    	}
		    	
		    }else{
		    	$this->error('上传失败');
		    }

		}
		$this->assign('ctr',$ctr);
		return view();
	}
	//下载
	public function download() {
     	$down=db('file')->find(input('id'));
     	$filename=ROOT_PATH.'public'.$down['path'];
     	$showname=$down['filename'];
     	if(file_exists($filename)){
     		//以只读的方式打开文件
     		$file=fopen($filename, 'r');
     		//以二进制流的方式接收
     		header('Content-type:','application/octet-stream');
     		//分段请求的类型
     		header('Accept-Ranges:bytes');
     		//attachment表示以附件的方式下载，filename是下载时浏览器填写的文件名
     		header("Content-Disposition: attachment; filename=".$showname);
     		//readfile($filename);
     		$content='';
     		while (!feof($file)) {
     			$content.=fread($file, 4000);//每次读取4000个字节
     		}
     		echo $content;
     		fclose($file);
     	}else{
     		$this->error('文件不存在！');
     	}
     
    }
    //删除,删除成功后，返回的页面不一样，所以要判断当前页面的控制器
    /*
	/*$ctr 控制器的名称，如果控制器来自agent,删除后跳转回所在控制器页面
    */
    public function del($ctr='Request()->controller()'){
		$res=db('file')->find(input('id'));
		//先根据主键，删除原文件
      	$filepath=ROOT_PATH.'public'.$res['path'];
        if(file_exists($filepath)){
        	@unlink($filepath);
        }
        //然后删除主键
        $del=db('file')->delete(input('id'));
		if($del){
			if($ctr=='Agent'){
				//跳转回agent模块
				$this->success('删除成功！',$ctr.'/listfile');
			}else{
				$this->success('删除成功！','lst');
			}
		}else{
			$this->error('删除失败！');
		}
	}
}