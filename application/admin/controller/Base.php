<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/13
 * Time: 23:02
 */

namespace app\admin\controller;


use think\Controller;

class Base extends Controller
{
    public function _initialize()
    {
        $isLogin = $this->isLogin();
        if(!$isLogin) {
            $this->redirect('login/index');
        }
    }

    public function isLogin()
    {
       //获取session,用法可参考tp5手册的session助手函数
        $user = session(config('AdminUser.session_name'),'',config('AdminUser.session_scope'));
        if($user && $user->id) {
            return true;
        }
        return false;
    }
}