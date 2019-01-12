<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/13
 * Time: 3:01
 */

namespace app\admin\controller;


use think\Controller;

class Admin extends Controller
{
    public function add()
    {
        if(request()->isPost()) {
            return $this->fetch('index/index');
        }else {
            return $this->fetch();
        }

    }
}