<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017/11/24
 * Time: 15:29
 */

namespace app\index\model;

use \think\Model;

class Collection extends Model
{
    public $is_folder;//1是 0不是
    public $name;
    public $level;//1，2，3，4
    public $pre_id;//没有为0
    public $has_children;//1为有 0为无
    public $url;

    public function user(){
        return $this->belongsTo('User');
    }

}