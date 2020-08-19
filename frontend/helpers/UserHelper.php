<?php
namespace frontend\helpers;
use Yii;
class UserHelper{
    public static function getIpAddr(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])){
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
        elseif (!empty($_SERVER['HTTP_X_FORWARDER_FOR'])){
            $ip = $_SERVER['HTTP_X_FORWARDER_FOR'];
        }
        else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        return $ip;
    }
    public static function getBrowser(){
        if (get_cfg_var('browscap')){
            $browser = get_browser(null, true);
        }
        elseif (empty($browser)){
            $browser = $_SERVER['HTTP_USER_AGENT'];
        }
        return $browser;
    }
}
?>