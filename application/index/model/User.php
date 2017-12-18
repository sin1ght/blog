<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017/11/24
 * Time: 15:25
 */

namespace app\index\model;

use \think\Model;

class User extends Model
{
    const FIELD_PHONE="phone_num";
    const FIELD_NICK_NAME="nick_name";
    const FIELD_PWD="pwd";
    public $phone_num;
    public $nick_name;
    public $pwd;

    public function collections(){
        return $this->hasMany('Collection','user_id');
    }

    public static function get_pwd($phone_num,$pwd){
        return md5(md5($phone_num).md5($pwd));
    }

    public function get_user_by_phone($phone){
        return $this->where(self::FIELD_PHONE,$phone)->find();
    }
}