<?php
namespace app\member\model;
use think\Model;
class AuthRulem extends Model
{
    //权限树状显示，功能参考栏目树
	public function authRuleTree(){
        $authRuleres=$this->order('sort desc')->select();
        return $this->sort($authRuleres);
    }

    public function sort($data,$pid=0){
        static $arr=array();
        foreach ($data as $k => $v) {
            if($v['pid']==$pid){
            	$v['dataid']=$this->getparentid($v['id']);
                $arr[]=$v;
                $this->sort($data,$v['id']);
            }
        }
        return $arr;
    }
    


    //删除的时候，要连子权限一起删除
    public function getchilrenid($authRuleId){
        $AuthRuleRes=$this->select();
        return $this->_getchilrenid($AuthRuleRes,$authRuleId);
    }

    public function _getchilrenid($AuthRuleRes,$authRuleId){
        static $arr=array();
        foreach ($AuthRuleRes as $k => $v) {
            if($v['pid'] == $authRuleId){
                $arr[]=$v['id'];
                $this->_getchilrenid($AuthRuleRes,$v['id']);
            }
        }

        return $arr;
    }


    public function getparentid($authRuleId){
        $AuthRuleRes=$this->select();
        return $this->_getparentid($AuthRuleRes,$authRuleId,True);
    }

    public function _getparentid($AuthRuleRes,$authRuleId,$clear=False){
        static $arr=array();
        //如果为真，重新定义数组
        if($clear){
        	$arr=array();
        }
        foreach ($AuthRuleRes as $k => $v) {
            if($v['id'] == $authRuleId){
                $arr[]=$v['id'];
                $this->_getparentid($AuthRuleRes,$v['pid'],False);
            }
        }
        //id排序
        asort($arr);
        $arrStr=implode('-', $arr);
        return $arrStr;
    }









}
