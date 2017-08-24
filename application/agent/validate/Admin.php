<?php
namespace app\agent\validate;
use think\Validate;
class Admin extends Validate
{
    //验证规则
    protected $rule = [
        'username'  =>  'require|max:25|unique:admin',//admin数据表
        'password' =>  'require',
    ];
    //验证文字提示
    protected $message  =   [
        'username.require' => '管理员名称必须填写',
        'username.max' => '管理员名称长度不得大于25位',
        'username.unique' => '管理员名称不得重复',
        'password.require' => '管理员密码必须填写',

    ];
    //验证场景
    protected $scene = [
        //add的时候，需要验证用户名，密码
        'add'  =>  ['username'=>'require|unique:admin','password'],
        //edit的时候，只验证username
        'edit'  =>  ['username'=>'require|unique:admin'],
    ];




}
