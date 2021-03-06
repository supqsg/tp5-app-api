<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/1/13
 * Time: 3:01
 */

namespace app\admin\controller;



use app\common\lib\IAuth;

class Admin extends Base
{
    /**
     * @return mixed
     */
    public function add()
    {
        if(request()->isPost()) {
            $data = input('post.');
            //验证数据合法性
            $validate = validate('AdminUser');
            if(!$validate->check($data)) {
                $this->error($validate->getError());
            }
            $data['password'] = IAuth::setPassword($data['password']);
            $data['status'] = 1;
            //数据入库
            try{
                $id = model('AdminUser')->add($data);
            }catch (\Exception $e) {
                $this->error($e->getMessage());
            }
            //入库成功后操作
            if($id) {
                $this->success('id='.$id.'用户入库成功');
            }
        }else {
            return $this->fetch();
        }

    }
}