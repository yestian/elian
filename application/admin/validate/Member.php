<?php
namespace app\admin\validate;
use think\Validate;
class Member extends Validate
{
    //验证规则,unique必须指定表名
    protected $rule = [
        'username' =>  'unique:member',
        'company'=>'require',
    ];

    //提示信息
    protected $message  =   [
    'username.unique'=>'登录用户名重复',
    'company.require'=>'机构名称必须填写',
    ];

    //验证场景
    protected $scene = [
        'add'  =>  ['username:agent','company'],
        'edit'  =>  ['username:agent','company'],
    ];




}
