<?php
namespace app\index\controller;


use think\Controller;
use think\Config;

class Index extends Controller
{
    public function index()
    {
        $url=Config::get('host').'/frontend.php';
        $this->redirect($url);
    }
    public function getLogInPic(){
        $data=json_decode(file_get_contents('http://cn.bing.com/HPImageArchive.aspx?format=js&idx=0&n=1&nc=1501558320736&pid=hp'));
        return 'http://cn.bing.com'.$data->images[0]->url;
    }
}
