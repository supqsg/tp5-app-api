<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/13
 * Time: 15:58
 */

namespace app\common\model;


use think\Model;

class AdminUser extends Model
{
    protected $autoWriteTimestamp = true;
    /**
     * 添加后台登陆用户
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public function add($data)
    {
        //验证数据合法性
        if(!is_array($data)) {
            exception('传递数据不合法');
        }
        $this->data = $data;
        $this->allowField(true)->save();
        //返回新增的id
        return $this->id;
    }
}