<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/12
 * Time: 22:02
 */
namespace app\admin\controller;



class Index extends Base
{
    public function index()
    {
        return $this->fetch();
    }

    public function welcome()
    {
        return 'hello world';
    }
}