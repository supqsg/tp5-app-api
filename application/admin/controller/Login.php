<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/13
 * Time: 17:36
 */

namespace app\admin\controller;


use app\common\lib\IAuth;
use think\Session;

class Login extends Base
{
    public function _initialize()
    {

    }

    public function index()
    {
        $isLogin = $this->isLogin();
        if($isLogin) {
            return $this->redirect('index/index');
        }
        return $this->fetch();
    }

    /**
     * 登陆判断
     * @return mixed
     * @throws \think\exception\DbException
     */
    public function check()
    {
        if(request()->isPost()) {
            $data = input('post.');
            if(!captcha_check($data['code'])){
                $this->error('验证码错误');
            }
            //验证数据合法性
            $validate = validate('AdminUser');
            if(!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $user = model('AdminUser')->get(['username'=>$data['username']]);
            if(!$user || $user->status != config('AdminUser.normal_status')) {
                $this->error('登陆账号不存在');
            }
            if(IAuth::setPassword($data['password']) != $user->password) {
                $this->error('密码不正确');
            }
            //更新用户登陆时间等信息
            $udata = [
                'login_ip' =>request()->ip(),
                'last_login_time'  => time(),
            ];
            try{
                model('AdminUser')->save($udata,['id'=>$user->id]);
            }catch (\Exception $e) {
                $this->error($e->getMessage());
            }
            session(config('AdminUser.session_name'),$user,config('AdminUser.session_scope'));
            $this->success('登陆成功','index/index');

        }else{
            return $this->fetch('login/index');
        }
    }

    public function logout()
    {
        session(null,config('AdminUser.session_scope'));
        $this->redirect('login/index');
    }

}