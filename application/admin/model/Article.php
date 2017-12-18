<?php
/**
 * Created by PhpStorm.
 * User: si
 * Date: 2017/12/16
 * Time: 11:48
 */

namespace app\admin\model;

use think\Model;

class Article extends Model
{
    public $title;
    public $category;
    public $intro;
    public $thumbnail;
    public $visit_count;
    public $content;
    public $time;


    public static function get_category($category){
        $categorys=['前端','后端','android','web安全'];
        return $categorys[$category];
    }
}