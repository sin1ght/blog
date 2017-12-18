<?php
/**
 * Created by PhpStorm.
 * User: ASUS
 * Date: 2017/11/24
 * Time: 16:58
 */
namespace app\common;

class Utils{
    public  static function xss_filter($str){
        return preg_match('/script|<|>|"|\'|0x|on|http|eval|fromCharCode|&/i',$str);
    }
    //是否登录
    public static function is_login(){
        session_start();
        if(!isset($_SESSION['phone'])){
            echo json_encode([
                    'code'=>110,
                    'msg'=>'请先登录',
                ]
            );
            exit();
        }
    }
    //判断传入参数是否为空
    public static function is_empty(){
        foreach (func_get_args() as $variable){
            if(is_null($variable)){
                echo json_encode([
                        'code'=>110,
                        'msg'=>'提交参数不完整',
                    ]
                );
                exit();
            }
        }
    }
    //发送短信验证码
    public static function get_short_msg_code($code,$phone){
        $target = "http://sms.106jiekou.com/utf8/sms.aspx";
        //替换成自己的测试账号
        $post_data = "account=sinight&password=dai123...&mobile=$phone&content=".rawurlencode("您的验证码是：".$code."。请不要把验证码泄露给其他人。如非本人操作，可不用理会！");
        $content=self::post($post_data,$target);
        $code=substr($content,-3);
        $msg=[
            '100'=>'发送成功',
            '101'=>'验证失败',
            '102'=>'手机号码格式不正确',
            '103'=>'会员级别不够',
            '104'=>'内容未审核',
            '105'=>'内容过多',
            '106'=>'账户余额不足',
            '107'=>'Ip受限',
            '108'=>'手机号码发送太频繁，请换号或隔天再发',
            '109'=>'帐号被锁定',
            '110'=>'手机号发送频率持续过高，黑名单屏蔽数日',
            '120'=>'系统升级'
        ];
        return $msg[$code];
    }

    private static function post($data, $target) {
        $url_info = parse_url($target);
        $httpheader = "POST " . $url_info['path'] . " HTTP/1.0\r\n";
        $httpheader .= "Host:" . $url_info['host'] . "\r\n";
        $httpheader .= "Content-Type:application/x-www-form-urlencoded\r\n";
        $httpheader .= "Content-Length:" . strlen($data) . "\r\n";
        $httpheader .= "Connection:close\r\n\r\n";
        //$httpheader .= "Connection:Keep-Alive\r\n\r\n";
        $httpheader .= $data;

        $fd = fsockopen($url_info['host'], 80);
        fwrite($fd, $httpheader);
        $gets = "";
        while(!feof($fd)) {
            $gets .= fread($fd, 128);
        }
        fclose($fd);
        return $gets;
    }

    //是否是管理员
    public static function is_admin(){
        session_start();
        if(!isset($_SESSION['admin'])){
            echo json_encode([
                    'code'=>110,
                    'msg'=>'请先登录',
                ]
            );
            exit();
        }
    }
}
