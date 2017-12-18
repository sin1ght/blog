<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017/10/23
 * Time: 18:53
 */

namespace app\index\controller;

use think\Config;
use think\Controller;
use app\common\simple_html_dom;
use think\Request;

class Article extends Controller
{
    static  $frontend='frontend';
    static  $backend='backend';
    static  $mobile='mobile';

    private function sfFrontend(){
        $html=new simple_html_dom();
        $html->load_file('https://segmentfault.com/news/frontend/newest');

        $articles=[];

        foreach ($html->find('.news__list .news__item') as $item){
            $info=$item->children(2);
            $times=explode(" ",$info->children(1)->children(0)->plaintext);
            $time=substr($times[0],strlen($times[0])-1,1).$times[1];

            if(stripos($time,'小时前')|| stripos($time,'分钟前')){

                $article['link']='https://segmentfault.com'.$info->children(0)->children(0)->href;
                $article['title']=$info->children(0)->children(0)->plaintext;
                $article['time']=$time;

                $article['author_url']='https://segmentfault.com'.$info->children(1)->children(0)->children(0)->href;
                $article['avatar_url']=Config::get('host').'/static/img/default_avatar.png';
                array_push($articles,$article);
            }
        }

        $html->clear();
//        return json_encode(['data'=>$articles]);
        return $articles;
    }

    private function sfBackend(){
        $html=new simple_html_dom();
        $html->load_file('https://segmentfault.com/news/backend/newest');

        $articles=[];

        foreach ($html->find('.news__list .news__item') as $item){
            $info=$item->children(2);
            $times=explode(" ",$info->children(1)->children(0)->plaintext);
            $time=substr($times[0],strlen($times[0])-1,1).$times[1];

            if(stripos($time,'小时前')|| stripos($time,'分钟前')){

                $article['link']='https://segmentfault.com'.$info->children(0)->children(0)->href;
                $article['title']=$info->children(0)->children(0)->plaintext;
                $article['time']=$time;

                $article['author_url']='https://segmentfault.com'.$info->children(1)->children(0)->children(0)->href;
                $article['avatar_url']=Config::get('host').'/static/img/default_avatar.png';
                array_push($articles,$article);
            }
        }

        $html->clear();
//        return json_encode(['data'=>$articles]);
        return $articles;
    }

    private function sfMobile(){
        $html=new simple_html_dom();
        $html->load_file('https://segmentfault.com/news/android/newest');

        $articles=[];

        foreach ($html->find('.news__list .news__item') as $item){
            $info=$item->children(2);
            $times=explode(" ",$info->children(1)->children(0)->plaintext);
            $time=substr($times[0],strlen($times[0])-1,1).$times[1];

            if(stripos($time,'小时前')|| stripos($time,'分钟前')){

                $article['link']='https://segmentfault.com'.$info->children(0)->children(0)->href;
                $article['title']=$info->children(0)->children(0)->plaintext;
                $article['time']=$time;

                $article['author_url']='https://segmentfault.com'.$info->children(1)->children(0)->children(0)->href;
                $article['avatar_url']=Config::get('host').'/static/img/default_avatar.png';
                array_push($articles,$article);
            }
        }

        $html->clear();
//        return json_encode(['data'=>$articles]);
        return $articles;
    }

    //掘金
    private function jjFrontend(){
        $html =new simple_html_dom();
        $html->load_file('http://juejin.im/zhuanlan/frontend');

        $articles=[];

        foreach ($html->find('.column-entry-list .item') as $item){
            $item=$item->children(0);
            $user_info=$item->children(0);
            $time=$user_info->children(1)->plaintext;

            if(stripos($time,'小时前')|| stripos($time,'分钟前')){
                $content_item=$item->children(2);

                $article['link']='https://juejin.im'.$content_item->children(0)->href;
                $article['title']=$content_item->children(0)->plaintext;
                $article['time']=$time;

                $article['author_url']='https://juejin.im'.$user_info->children(0)->children(1)->href;
                $article['avatar_url']=$user_info->children(0)->children(1)->children(0)->getAttribute('data-src');

                array_push($articles,$article);
            }
        }

        $html->clear();
//        return json_encode(['data'=>$articles]);
        return $articles;
    }

    private function jjBackend(){
        $html =new simple_html_dom();
        $html->load_file('https://juejin.im/zhuanlan/backend');

        $articles=[];

        foreach ($html->find('.column-entry-list .item') as $item){
            $item=$item->children(0);
            $user_info=$item->children(0);
            $time=$user_info->children(1)->plaintext;

            if(stripos($time,'小时前')||stripos($time,'分钟前')){
                $content_item=$item->children(2);

                $article['link']='https://juejin.im'.$content_item->children(0)->href;
                $article['title']=$content_item->children(0)->plaintext;
                $article['time']=$time;

                $article['author_url']='https://juejin.im'.$user_info->children(0)->children(1)->href;
                $article['avatar_url']=$user_info->children(0)->children(1)->children(0)->getAttribute('data-src');

                array_push($articles,$article);
            }
        }

        $html->clear();
//        return json_encode(['data'=>$articles]);
        return $articles;
    }

    private function jjMobile(){
        $html =new simple_html_dom();
        $html->load_file('https://juejin.im/zhuanlan/android');

        $articles=[];

        foreach ($html->find('.column-entry-list .item') as $item){
            $item=$item->children(0);
            $user_info=$item->children(0);
            $time=$user_info->children(1)->plaintext;

            if(stripos($time,'小时前')||stripos($time,'分钟前')){
                $content_item=$item->children(2);

                $article['link']='https://juejin.im'.$content_item->children(0)->href;
                $article['title']=$content_item->children(0)->plaintext;
                $article['time']=$time;

                $article['author_url']='https://juejin.im'.$user_info->children(0)->children(1)->href;
                $article['avatar_url']=$user_info->children(0)->children(1)->children(0)->getAttribute('data-src');

                array_push($articles,$article);
            }
        }

        $html->clear();
//        return json_encode(['data'=>$articles]);
        return $articles;
    }

    //csdn
    private function csdnFrontend(){
        $html =new simple_html_dom();
        $html->load_file('http://geek.csdn.net/frontend');

        $articles=[];

        foreach ($html->find('#geek_list .geek_list') as $item){
            $item1=$item->children(1)->children(3);
            $item2=$item->children(1)->children(2);
            $time=$item1->children(1)->plaintext;
            if(stripos($time,'小时前')||stripos($time,'分钟前')){
                $article['link']=$item2->children(0)->href;
                $article['title']=$item2->children(0)->plaintext;
                $article['time']=$time;
                //$article['read_num']=$item1->children('3')->children('1')->plaintext;

                $a_avatar=$item->children(2)->children(1);
                //$article['author']=$a_avatar;
                $article['author_url']=$a_avatar->href;
                $article['avatar_url']=$a_avatar->children(0)->src;

                array_push($articles,$article);
            }
        }
        $html->clear();
//        return json_encode(['data'=>$articles]);
        return $articles;
    }

    private function csdnMobile(){
        $html =new simple_html_dom();
        $html->load_file('http://geek.csdn.net/mobile');

        $articles=[];

        foreach ($html->find('#geek_list .geek_list') as $item){
            $item1=$item->children(1)->children(3);
            $item2=$item->children(1)->children(2);
            $time=$item1->children(1)->plaintext;
            if(stripos($time,'小时前')||stripos($time,'分钟前')){
                $article['link']=$item2->children(0)->href;
                $article['title']=$item2->children(0)->plaintext;
                $article['time']=$time;
                //$article['read_num']=$item1->children('3')->children('1')->plaintext;

                $a_avatar=$item->children(2)->children(1);
                //$article['author']=$a_avatar;
                $article['author_url']=$a_avatar->href;
                $article['avatar_url']=$a_avatar->children(0)->src;

                array_push($articles,$article);
            }
        }
        $html->clear();
//        return json_encode(['data'=>$articles]);
        return $articles;
    }

    private function csdnBackend(){
        //后端

        $html =new simple_html_dom();
        $urls=['http://geek.csdn.net/forum/68','http://geek.csdn.net/forum/94'];
        $articles=[];

        foreach ($urls as $url){
            $html->load_file($url);
            foreach ($html->find('#forum_news_list .geek_list') as $item){
                $item1=$item->children(1)->children(3);
                $item2=$item->children(1)->children(2);
                $time=$item1->children(1)->plaintext;
                if(stripos($time,'小时前')||stripos($time,'分钟前')){
                    $article['link']=$item2->children(0)->href;
                    $article['title']=$item2->children(0)->plaintext;
                    $article['time']=$time;
                    //$article['read_num']=$item1->children('3')->children('1')->plaintext;

                    $a_avatar=$item->children(2)->children(1);
                    //$article['author']=$a_avatar;
                    $article['author_url']=$a_avatar->href;
                    $article['avatar_url']=$a_avatar->children(0)->src;

                    array_push($articles,$article);
                }
            }
            $html->clear();
        }

//        return json_encode(['data'=>$articles]);
        return $articles;
    }

    //综合
    public function frontend(Request $request){
        //连接本地的 Redis 服务
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379) or die('redis 连接错误');

        if(count($redis->Keys(self::$frontend.'*'))==0){
            //第一次查询
            $articles=[];
            $articles=array_merge($articles,$this->csdnFrontend());
            $articles=array_merge($articles,$this->sfFrontend());
            $articles=array_merge($articles,$this->jjFrontend());

            foreach ($articles as $item){
                $key=self::$frontend.'_'.md5($item['link']);
                $redis->hMset($key,$item);
                $redis->expireAt($key,date_timestamp_get(date_create('24:00:00')));
            }
        }

        $from=$request->get('from');
        if(empty($from) or $from==0){
            //第一页 每页15个
            $s_articles=[];
            $keys=$redis->Keys(self::$frontend.'*');
            foreach ($keys as $item){
              array_push($s_articles,$redis->hGetAll($item));
            }
            $s_articles=array_slice($s_articles,0,15);
            $ids=[];
            for($i=0;count($ids)!=count($s_articles);$i++)
                array_push($ids,$i);

        }else{
            $s_articles=[];
            $keys=$redis->Keys(self::$frontend.'*');
            foreach ($keys as $item){
                array_push($s_articles,$redis->hGetAll($item));
            }
            $s_articles=array_slice($s_articles,$from+1,15);
            $ids=[];
            for($i=$from+1;count($ids)!=count($s_articles);$i++)
                array_push($ids,$i);
        }

        if(count($s_articles)==0){
            //没有了,获取更多
           if($this->getMore(self::$frontend)){
               $s_articles=[];
               $keys=$redis->Keys(self::$frontend.'*');
               foreach ($keys as $item){
                   array_push($s_articles,$redis->hGetAll($item));
               }
               $s_articles=array_slice($s_articles,$from+1,15);
               $ids=[];
               for($i=$from+1;count($ids)!=count($s_articles);$i++)
                   array_push($ids,$i);
           }
        }

        return json_encode(['data'=>$s_articles,'id'=>$ids]);

    }

    private function getMore($type){
        $redis = new \Redis();
        $redis->connect('127.0.0.1', 6379) or die('redis 连接错误');
        $return=false;
        if($type==self::$frontend){
            //前端
            $articles=[];
            $articles=array_merge($articles,$this->csdnFrontend());
            $articles=array_merge($articles,$this->sfFrontend());
            $articles=array_merge($articles,$this->jjFrontend());
            foreach ($articles as $item){
                $key=self::$frontend.'_'.md5($item['link']);
                if($redis->exists($key)){
                    $redis->hSet($key,'time',$item['time']);
                }else{
                    $redis->hMset($key,$item);
                    $return=true;
                }
            }
        }
        return $return;
    }

}