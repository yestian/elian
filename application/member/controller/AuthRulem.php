<?php
namespace app\member\controller;
use app\member\model\AuthRulem as AuthRulemModel;
use app\member\controller\Common;
use app\member\model\Member as MemberModel;
class AuthRulem extends Common
{

    public function lst(){
        $menumodel=new MemberModel;
        $menu=$menumodel->menu();
		$conf=$menumodel->getconf();
        $this->assign([
			'menu'=>$menu,
			'conf'=>$conf
			]);
        $authRule=new AuthRulemModel();
        //栏目排序功能
        if(request()->isPost()){
            $sorts=input('post.');
            foreach ($sorts as $k => $v) {
                $authRule->update(['id'=>$k,'sort'=>$v]);
            }
            $this->success('更新排序成功！',url('lst'));
            return;
        }
        //排序展示，模型里面的authruletree方法
        $authRuleRes=$authRule->authRuleTree();

        $this->assign('authRuleRes',$authRuleRes);
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
        if(request()->isPost()){
            $data=input('post.');
            //$plevel=db('auth_rule')->where('id',$data['pid'])->field('level')->find();
            $plevel=db('auth_rulem')->field('level')->find(input('pid'));
            if($plevel){
                $data['level']=$plevel['level']+1;
            }else{
               $data['level']=0; 
            }


            $add=db('auth_rulem')->insert($data);
            if($add){
                $this->success('添加权限成功！',url('lst'));
            }else{
                $this->error('添加权限失败！');
            }
            return;
        }
        //栏目树
        $authRule=new AuthRulemModel();
        $authRuleRes=$authRule->authRuleTree();
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
            //$plevel=db('auth_rule')->where('id',$data['pid'])->field('level')->find();
            $plevel=db('auth_rulem')->field('level')->find(input('pid'));
            //获取到上级权限后，当前的权限等级加1
            //如果没有上级权限，那么当前权限为等级0，顶级权限
            if($plevel){
                $data['level']=$plevel['level']+1;
            }else{
               $data['level']=0; 
            }
            $save=db('auth_rulem')->update($data);
            if($save!==false){
                $this->success('修改权限成功！',url('lst'));
            }else{
                $this->error('修改权限失败！');
            }
            return;
        }
        $authRule=new AuthRulemModel();
        //权限树
        $authRuleRes=$authRule->authRuleTree();
        //当前id的信息
        $authRules=$authRule->find(input('id'));
        $this->assign(array(
            'authRuleRes'=>$authRuleRes,
            'authRules'=>$authRules,
            ));
        return view();
    }


    public function del(){
        $authRule=new AuthRulemModel();
        //方法参考栏目cate的多级删除
        $authRule->getparentid(input('id'));
        //所有子栏目id
        $authRuleIds=$authRule->getchilrenid(input('id'));
        $authRuleIds[]=input('id');
        $del= AuthRulemModel::destroy($authRuleIds);
        if($del){
            $this->success('删除权限成功！',url('lst'));
        }else{
            $this->error('删除权限失败！');
        }
    }



    
    




   

	












}
