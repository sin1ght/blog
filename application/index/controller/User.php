<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017/11/24
 * Time: 15:14
 */

namespace app\index\controller;

use \think\Controller;
use think\Request;
use \app\common\Utils;


class User extends Controller
{
    //获取短信验证码
    function get_msg_code(Request $request){
        //获取短信验证码
        $phone=$request->get('phone');
        $code=rand(1000,9999);
        session_start();
        $_SESSION['msg_code']=$code;
        return Utils::get_short_msg_code($code,$phone);
    }
    //登录
    function login(){
        $phone_num=$this->request->get('phone');
        $pwd=$this->request->get('pwd');

        if(empty($phone_num)||empty($pwd)){
            return json_encode([
                    'msg'=>'登录信息不完整',
                    'code'=>12
                ]
            );
        }

        $user=new \app\index\model\User();
        $cur_user=$user->where($user::FIELD_PHONE,$phone_num)->field($user::FIELD_PHONE.','.$user::FIELD_PWD)->find();
        if(empty($cur_user)){
            return json_encode([
                    'msg'=>'账号或密码错误',
                    'code'=>12
                ]
            );
        }

        if(\app\index\model\User::get_pwd($phone_num,$pwd)===$cur_user[$user::FIELD_PWD]){
            session_start();
            $_SESSION['login']=1;
            $_SESSION['phone']=$phone_num;
            return json_encode([
                    'url'=>'/',
                    'code'=>13
                ]
            );
        }else{
            return json_encode([
                    'msg'=>'账号或密码错误',
                    'code'=>12
                ]
            );
        }
    }
    //注册
    function register(Request $request){

        $nick_name=$request->post('nick_name');
        $phone_num=$request->post('phone');
        $pwd=$request->post('password');
        $code=$request->post('code');//验证码

        if(empty($nick_name)||empty($phone_num)||empty($pwd)||empty($code)){
            return json_encode(['msg'=>'注册信息不能有空']);
        }

        session_start();
        if(isset($_SESSION['msg_code'])){
            if($code!=$_SESSION['msg_code'])
                return json_encode(['msg'=>'验证码错误']);
        }else{
            return json_encode(['msg'=>'请先获取短信验证码']);
        }

        if(Utils::xss_filter($nick_name)||Utils::xss_filter($phone_num)||Utils::xss_filter($pwd)){
            return json_encode(['msg'=>'不要尝试攻击,你的信息已经被记录']);
        }

        $user=new \app\index\model\User();
        if(empty($user->where('phone_num',$phone_num)->find())){
            $password=\app\index\model\User::get_pwd($phone_num,$pwd);
            $user->data(['nick_name'=>$nick_name,'phone_num'=>$phone_num,'pwd'=>$password]);
            $user->save();
            return json_encode(['msg'=>'注册成功']);
        }else{
            return json_encode(['msg'=>'此号码已经注册']);
        }
    }

    //获取收藏列表
    function get_collection(){
        $user=new \app\index\model\User();
        Utils::is_login();
        $user=$user->get_user_by_phone($_SESSION['phone']);
        $data=$user->collections;
        return json_encode([
            'data'=>$data
        ]);
    }

    //添加文件夹/文件
    function add_collection(){
       $is_folder=$this->request->get('is_folder');
       $name=$this->request->get('name');
       $level=$this->request->get('level');
       $pre_id=$this->request->get('pre_id');
       $url=$this->request->get('url');

       Utils::is_empty($is_folder,$name,$level,$pre_id);

       $user=new \app\index\model\User();
       Utils::is_login();
       $user=$user->get_user_by_phone($_SESSION['phone']);
       //文件夹通过名字  文件通过url
       if($is_folder){
           foreach ($user->collections as $item){
               if($item['name']==$name){
                   return json_encode([
                       'msg'=>'已经添加'
                   ]);
               }
           }
       }else{
           foreach ($user->collections as $item){
               if($item['url']==$url){
                   return json_encode([
                       'msg'=>'已经添加'
                   ]);
               }
           }
       }

       if($is_folder){
           $user->collections()->save([
               'is_folder'=>$is_folder,
               'name'=>$name,
               'level'=>$level,
               'pre_id'=>$pre_id,
           ]);
       }else{
           $user->collections()->save([
               'is_folder'=>$is_folder,
               'name'=>$name,
               'level'=>$level,
               'pre_id'=>$pre_id,
               'url'=>$url
           ]);
       }

        //更新父级has_children
        if($pre_id!=0){
            if($user->collections()->where('id',$pre_id)->column('has_children')[0]==0){
                $user->collections()->where('id',$pre_id)->update([
                    'has_children'=>1,
                ]);
            }
        }

       return json_encode([
           'msg'=>'添加成功'
       ]);
    }

    //删除 重命名文件夹
    function collection_folder_action(){
        Utils::is_login();
        $id=$this->request->get('id');
        $op=$this->request->get('op');
        Utils::is_empty($id,$op);
        if ($op==1){
            //重名名
            $name=$this->request->get('name');
            if(empty($name)){
                return json_encode([
                    'msg'=>'文件名不能为空'
                ]);
            }

            $user=new \app\index\model\User();
            $user=$user->get_user_by_phone($_SESSION['phone']);
            $user->collections()->where('id',$id)->update(['name'=>$name]);
            return json_encode([
                'msg'=>'修改成功'
            ]);
        }elseif($op==2){
            //删除
            $user=new \app\index\model\User();
            $user=$user->get_user_by_phone($_SESSION['phone']);
            $this->collection_folder_delete_help($user,$id);
            return json_encode([
                'msg'=>'删除成功'
            ]);
        }else{
            return json_encode([
                'msg'=>'不知名操作'
            ]);
        }
    }
    //文件夹删除帮助函数
    private function collection_folder_delete_help($user,$id){
        $user->collections()->where('id',$id)->delete();
        $list=$user->collections()->where('pre_id',$id)->select();
        foreach ($list as $child){
            if($child['is_folder'])
                $this->collection_folder_delete_help($user,$child['id']);
            else
                $user->collections()->where('id',$child['id'])->delete();
        }
    }

    //收藏操作 删除 重命名
    function collection_file_action(){
        Utils::is_login();
        $id=$this->request->get('id');
        $op=$this->request->get('op');
        Utils::is_empty($id,$op);
        if ($op==1){
            //重名名
            $name=$this->request->get('name');
            if(empty($name)){
                return json_encode([
                    'msg'=>'文件名不能为空'
                ]);
            }

            $user=new \app\index\model\User();
            $user=$user->get_user_by_phone($_SESSION['phone']);
            if(empty($user->collections()->where('id',$id)->find())){
                return json_encode([
                    'msg'=>'收藏不存在'
                ]);
            }
            $user->collections()->where('id',$id)->update(['name'=>$name]);
            return json_encode([
                'msg'=>'修改成功'
            ]);
        }elseif($op==2){
            //删除
            $user=new \app\index\model\User();
            $user=$user->get_user_by_phone($_SESSION['phone']);
            $user->collections()->where('id',$id)->delete();
            return json_encode([
                'msg'=>'删除成功'
            ]);
        }else{
            return json_encode([
                'msg'=>'不知名操作'
            ]);
        }
    }

}