<?php

namespace wechat\driver\wethird;

use rely\Init;
use rely\init\Config;

/**
 * Class Api
 * @package wechat\driver\weapi
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 11:35
 * 微信开放平台地址
 *
 * @method \wechat\driver\wethird\Wepublic wepublic($config=[]) 微信开放平台代理公众平台
 *
 *
 */
class Api extends Config
{
    const API = [
        //授权注册页面扫码授权 请求方式 GET
        'GetAuthorizationCode'=>'https://mp.weixin.qq.com/cgi-bin/componentloginpage?component_appid=COMPONENT_APPID&pre_auth_code=PRE_AUTH_CODE&redirect_uri=REDIRECT_URI',
        //获取第三方平台component_access_token 请求方式 POST
        'ComponentAccessToken'=>'https://api.weixin.qq.com/cgi-bin/component/api_component_token',
        //获取预授权码pre_auth_code 请求方式 POST
        'PreAuthCode'=>'https://api.weixin.qq.com/cgi-bin/component/api_create_preauthcode?component_access_token=COMPONENT_ACCESS_TOKEN',
        //获取商户基础信息 请求方式 POST
        'GetInfo'=>'https://api.weixin.qq.com/cgi-bin/component/api_query_auth?component_access_token=COMPONENT_ACCESS_TOKEN',
        //获取（刷新）授权公众号或小程序的接口调用凭据（令牌） 请求方式 POST
        'AuthorizerRefreshToken'=>'https:// api.weixin.qq.com /cgi-bin/component/api_authorizer_token?component_access_token=COMPONENT_ACCESS_TOKEN',
        //获取商户详细信息 请求方式 POST
        'GetInfoDetails'=>'https://api.weixin.qq.com/cgi-bin/component/api_get_authorizer_info?component_access_token=COMPONENT_ACCESS_TOKEN',
        //获取授权方的选项设置信息 请求方式 POST
        'GetOptions'=>'https://api.weixin.qq.com/cgi-bin/component/api_get_authorizer_option?component_access_token=COMPONENT_ACCESS_TOKEN',
        //设置授权方的选项信息 请求方式 POST
        'SetOptions'=>'https://api.weixin.qq.com/cgi-bin/component/api_set_authorizer_option?component_access_token=COMPONENT_ACCESS_TOKEN',
        //获取授权的所有商家 请求方式 POST
        'GetAuthorizerList'=>'https://api.weixin.qq.com/cgi-bin/component/api_get_authorizer_list?component_access_token=COMPONENT_ACCESS_TOKEN',
        //第三方平台对其所有API调用次数清零 请求方式 POST
        'QuotaClearAll'=>'https://api.weixin.qq.com/cgi-bin/component/clear_quota?component_access_token=COMPONENT_ACCESS_TOKEN',
    ];
    public function get_url($name)
    {
        strpos($name, '_') === false ? $name = ucwords($name) : $name = ucwords(Init::dataswitch()->convert2Underline($name));
        return self::API[$name]??$name;
    }

    public function __call($name, $arguments)
    {
        return (new \ReflectionClass(__NAMESPACE__ . '\\' . ucwords(Init::dataswitch()->convert2Underline($name))))->newInstanceArgs($arguments);
    }
    public static function component_access_token(){
        return (new \ReflectionClass(\wechat\driver\wethird\Init::class))->newInstanceArgs()->ComponentAccessToken();
    }
}

