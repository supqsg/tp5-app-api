<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/13
 * Time: 17:36
 */

namespace app\admin\controller;


use think\Controller;

class Login extends Controller
{
    public function index()
    {
        return $this->fetch();
    }

    public function check()
    {
        $data = input('post.');
        if(!captcha_check($data['code'])){
            $this->error('验证码错误');
        }else{
            $this->success('验证码正确');
        }
    }

}