<?php
namespace app\index\controller;
use think\Controller;
use think\Request;

class Index extends Controller
{
    public function index(){
        return view();
    }
    public function profile(){
        return view();
    }
    public function temp(){
        return view();
    }
    public function magzine(){
        return view();
    }
    public function jiameng(){
        return view();
    }



    //博客文章列表页面
     public function blog()
    {	
    	//二级导航,上级栏目不为0的都是二级导航
    	$cate=db('cate')->where('pid','neq',0)->select();
    	//获取路由中id参数的值
    	$cateid=request()->route('id');
    	//当前栏目信息
    	$subcate=db('cate')->where('id',$cateid)->find();

    	//当前栏目下的文章列表,url中blog后面的id为空的时候，获取所有文章
    	if($cateid==''){
    		$list=db('article a')
	    	->field('a.*,b.catename,b.id as cid')
	    	->join('cate b','a.cateid=b.id','left')
	    	->paginate(12);
    	}else{
    		$list=db('article a')
	    	->field('a.*,b.catename,b.id as cid')
	    	->join('cate b','a.cateid=b.id','left')
	    	->where('b.id',$cateid)
	    	->paginate(12);
    	}
    	
		$this->assign([
			'cate'=>$cate,
			'list'=>$list,
			'subcate'=>$subcate
		]);
        return view();
    }

    //博客文章页面
    public function read(){
    	//二级导航,上级栏目不为0的都是二级导航
    	$cate=db('cate')->where('pid','neq',0)->select();
    	$res=db('article')->find(input('id'));
    	
    	$this->assign([
			'cate'=>$cate,
			'res'=>$res
		]);
    	return view();

    }

}
