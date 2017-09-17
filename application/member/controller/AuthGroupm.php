<?php
namespace app\member\controller;
use app\member\model\AuthGroupm as AuthGroupModel;
use app\member\controller\Common;
use app\member\model\Member as MemberModel;
class AuthGroupm extends Common{
   
    public function lst(){
        $menumodel=new MemberModel;
        $menu=$menumodel->menu();
		$conf=$menumodel->getconf();
        $this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
        $authGroupRes=db('auth_groupm')->paginate(10);
        $this->assign('authGroupRes',$authGroupRes);
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
        //添加数据
        if(request()->isPost()){
           $data=input('post.');
           //获取设置的权限id，用，分割存入数据库
           if($data['rules']){
            $data['rules']=implode(',', $data['rules']);
           }

           $add=db('auth_groupm')->insert($data);
           if($add){
            $this->success("添加用户组成功！",'lst');
           }else{
            $this->error('添加用户组失败！');
           }
            return;
        }
        //获取权限列表
        $authrule=new \app\admin\model\AuthRule();
        $authRuleRes=$authrule->authRuleTree();

        $this->assign('authRuleRes',$authRuleRes);
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

        if(request()->isPost()){
            $data=input('post.');
            //获取设置的权限id，用，分割存入数据库
           if($data['rules']){
            $data['rules']=implode(',', $data['rules']);
           }
            //禁用的时候，传递不了数据，手动设为0
            if(!isset($data['status'])){
                $data['status']=0;
            }
            $save=db('auth_groupm')->update($data);
            if($save!==false){
                $this->success('修改用户组成功！','lst');
            }else{
                $this->error('修改用户组失败！');
            }
            return;
        }
         //获取权限列表
        $authrule=new \app\member\model\AuthRulem();
        $authRuleRes=$authrule->authRuleTree();

        //信息查询
        $authgroups=db('auth_groupm')->find(input('id'));
        $this->assign([
            'authgroups'=>$authgroups,
            'authRuleRes'=> $authRuleRes

            ]);
        return view();
    }



    public function del(){
        //$del=AuthGroupModel::destroy(input('id'));
        $del=db('auth_groupm')->delete(input('id'));
        if($del){
            $this->success('删除用户组成功！','lst');
        }else{
            $this->error('删除用户组失败！');
        }
    }

   

	





}
