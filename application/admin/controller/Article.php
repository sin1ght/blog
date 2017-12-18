<?php
/**
 * Created by PhpStorm.
 * User: si
 * Date: 2017/12/16
 * Time: 11:35
 */

namespace app\admin\controller;

use think\Controller;
use app\common\Utils;

class Article extends Controller
{
    function add_article(){
        Utils::is_admin();
        if(isset($_POST['id'])){
            //编辑模式
            $id=$_POST['id'];
            $title=$_POST['title'];
            $category=$_POST['category'];
            $intro=$_POST['intro'];
            $content=$_POST['editorValue'];
            $time=date('Y-m-d h:i:S');
            Utils::is_empty($title,$category,$intro,$content);
            $article=new \app\admin\model\Article();
            $article->where('id',$id)->update([
                'title'=>$title,
                'category'=>$category,
                'intro'=>$intro,
                'content'=>$content,
                'time'=>$time
            ]);
            $this->redirect('/su/article-list.html');
        }else{
            $title=$_POST['title'];
            $category=$_POST['category'];
            $intro=$_POST['intro'];
            $content=$_POST['editorValue'];
            $time=date('Y-m-d h:i:S');

            $thumbnail=$_FILES['thumbnail'];//缩略图

            Utils::is_empty($title,$category,$intro,$content,$thumbnail);

            $allow_types=['jpeg','jpg','png'];
            $type=explode('.',$thumbnail['name'])[count(explode('.',$thumbnail['name']))-1];
            if(is_null(array_search($type,$allow_types))){
                return json_encode([
                    'msg'=>'缩略图类型不对'
                ]);
            }

            $upload_dir=getcwd().'\\upload\\imgs\\';
            $img_name=substr(md5(date('Y-m-d h:i:s')),8,16).'.'.$type;
            $file_name=$upload_dir.$img_name;
            if(file_exists($file_name)){
                return json_encode([
                    'msg'=>'该文件已经存在'
                ]);
            }

            move_uploaded_file($thumbnail['tmp_name'],$file_name);
            $img_url='/upload/imgs/'.$img_name;

            $article=new \app\admin\model\Article();
            $article->data([
                'title'=>$title,
                'category'=>$category,
                'intro'=>$intro,
                'thumbnail'=>$img_url,
                'content'=>$content,
                'time'=>$time
            ]);
            $article->save();
            $this->redirect('/su/article-list.html');
        }

    }

    function get_article_with_intro(){
        $type=-1;//获取所有类型文章
        if(isset($_GET['type'])){
            $type=$this->request->get('type');
        }
        $article=new \app\admin\model\Article();
        if ($type==-1){
            $data=$article->order('id')->field('id,category,title,intro,thumbnail,visit_count,time')->select();
        }else{
            $data=$article->where('category',$type)->order('id')->field('id,category,title,intro,thumbnail,visit_count,time')->select();
        }

        foreach ($data as $item){
            $item['category']=\app\admin\model\Article::get_category($item['category']);
        }

        return json_encode([
            'data'=>$data
        ]);
    }

    function get_article_with_content(){
        $id=$this->request->get('id');
        Utils::is_empty($id);
        $article=new \app\admin\model\Article();
        $data=$article->where('id',$id)->field('intro,category,title,content,visit_count,time')->find();
        if(empty($data) or is_null($data)){
            return json_encode([
                'msg'=>'文章不存在'
            ]);
        }
        $data['type']=$data['category'];
        $data['category']=\app\admin\model\Article::get_category($data['category']);
        $article->where('id',$id)->update(['visit_count'=>$data['visit_count']+1]);//更新访问次数

        return json_encode([
            'data'=>$data
        ]);
    }

    function delete(){
        Utils::is_admin();
        $id=$this->request->get('id');
        Utils::is_empty($id);
        $article=new \app\admin\model\Article();
        if(!empty($article->where('id',$id)->delete())){
            return json_encode([
                'code'=>1,
                'msg'=>'删除成功'
            ]);
        }else{
            return json_encode([
                'code'=>110,
                'msg'=>'删除失败'
            ]);
        }
    }

    //批量删除
    function delete_all(){
        Utils::is_admin();
        $id_str=$this->request->get('id_str');
        Utils::is_empty($id_str);
        $ids=explode(',',$id_str);
        $ids=array_slice($ids,0,count($ids)-1);
        $article=new \app\admin\model\Article();
        foreach ($ids as $id){
            $article->where('id',$id)->delete();
        }

        return json_encode([
            'code'=>1,
            'msg'=>'删除成功'
        ]);
    }
}
