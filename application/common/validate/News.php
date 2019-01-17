<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/13
 * Time: 15:50
 */

namespace app\common\validate;


use think\Validate;

class News extends Validate
{
    protected $rule = [
        'username'  =>  'require|max:16',
        'description' =>  'max:255',
    ];
}