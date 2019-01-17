<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/16
 * Time: 23:54
 */

namespace app\admin\controller;


class News extends Base
{
    public function index()
    {
        return $this->fetch();
    }

    public function add()
    {
        if(request()->isPost()) {
            $data = input('post.');
            //TODO 数据验证
            try {
                $id = model('News')->add($data);

            } catch (\Exception $e) {
                return $this->result('',0,'新增失败');
            }
            if(!$id) {
                return $this->result('',0,'新增失败');
            }
            return $this->result(['jumpUrl'=>url('news/index')],1,'新增文章成功');

        } else{
            return $this->fetch('',['lists'=>config('cat.lists')]);
        }

    }

}