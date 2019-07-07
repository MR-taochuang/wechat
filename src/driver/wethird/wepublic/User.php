<?php

namespace wechat\driver\wethird\wepublic;

use wechat\driver\Driver;
use wechat\driver\wethird\Api;
use wechat\driver\wethird\Init;

/**
 * Class User
 * @package wechat\driver\wethird\wepublic
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 19:11
 * 代理公众号处理用户信息
 */
class User extends Driver{

    /**
     * @param $appid
     * @param $redirect_uri
     * @param $scope
     * @param $state
     * @return mixed
     * 获取code
     */
    public function GetCode($appid,$redirect_uri,$scope,$state){
       return self::callback(['appid'=>$appid,'redirect_uri'=>$redirect_uri,'scope'=>$scope,'state'=>$state])->instance(__NAMESPACE__,__FUNCTION__)::$url;
    }

    /**
     * @param $appid
     * @param $code
     * @return mixed
     * 通过code换取access_token
     */
    public function AccessToken($appid,$code){
        return self::callback(Api::component_access_token(),['appid'=>$appid,'code'=>$code])->_get();
    }

    /**
     * @param $appid
     * @param $refresh_token
     * @return mixed
     * 刷新token
     */
    public function RefreshToken($appid,$refresh_token){
        return self::callback(Api::component_access_token(),['appid'=>$appid,'refresh_token'=>$refresh_token])->_get();
    }

    /**
     * @param $openid
     * @param $access_token
     * @param string $lang
     * @return mixed
     * 获取用户信息
     */
    public function GetUserInfo($openid,$access_token,$lang='zh_CN'){
        return self::callback(Api::component_access_token(),['openid'=>$openid,'access_token'=>$access_token,'zh_cn'=>$lang])->_get();
    }
}