<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/17
 * Time: 19:15
 */

namespace app\common\model;


use think\Model;

class Base extends Model
{
    protected $autoWriteTimestamp = true;
    /**
     * @param $data
     * @return mixed
     * @throws \Exception
     */
    public function add($data)
    {
        if(!is_array($data)) {
            exception('传递数据不合法');
        }
        $this->data = $data;
        $this->allowField(true)->save();
        return $this->id;
    }
}