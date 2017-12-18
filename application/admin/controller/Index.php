<?php
/**
 * Created by PhpStorm.
 * User: si
 * Date: 2017/12/17
 * Time: 22:03
 */

namespace app\admin\controller;

use think\Controller;

class Index extends Controller
{
    function login(){
        $name=$this->request->post('name');
        $pwd=$this->request->post('pwd');

        if($name=='admin'){
            if($pwd=='admin'){
                session_start();
                $_SESSION['admin']='admin';
                $this->redirect('/su/shouye.html');
            }else{
                echo "账号或密码错误";
                exit();
            }
        }else{
            echo "账号或密码错误";
            exit();
        }
    }
}
