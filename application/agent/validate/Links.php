<?php
namespace app\agent\validate;
use think\Validate;
class Links extends Validate
{
    protected $rule = [
        'title'  =>  'require|max:25',
        'url' =>  'url|require',
    ];

    protected $message  =   [
        'title.require' => '链接标题必须填写',
        'title.max' => '链接标题长度不得大于25位',
        'url.require' => '链接地址必须填写',
        'url.url'=>'url格式不对',

    ];

    protected $scene = [
        'add'  =>  ['title','url'],
        'edit'  =>  ['title','url'=>'require'],
    ];




}
