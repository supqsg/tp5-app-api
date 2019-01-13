<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/13
 * Time: 22:38
 */

namespace app\common\lib;


class IAuth
{
    public static function setPassword($password)
    {
        return md5($password.config('AdminUser.password_pre'));
    }
}