<?php

namespace wechat\driver\wethird\wepublic;

use rely\Init;
use rely\init\Config;

/**
 * Class Api
 * @package wechat\driver\wethird\wepublic
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 19:59
 * 代理微信公众号地址
 *
 */
class Api extends Config
{
    const API = [
        //换取code 请求方式 GET
        'GetCode'=>'https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE&component_appid=COMPONENT_APPID#wechat_redirect',
        //通过code换取access_token 请求方式GET
        'AccessToken'=>'https://api.weixin.qq.com/sns/oauth2/component/access_token?appid=APPID&code=CODE&grant_type=authorization_code&component_appid=COMPONENT_APPID&component_access_token=COMPONENT_ACCESS_TOKEN',
        //刷新access_token请求方式 GET
        'RefreshToken'=>'https://api.weixin.qq.com/sns/oauth2/component/refresh_token?appid=APPID&grant_type=refresh_token&component_appid=COMPONENT_APPID&component_access_token=COMPONENT_ACCESS_TOKEN&refresh_token=REFRESH_TOKEN',
        //通过网页授权access_token获取用户基本信息 请求方式 GET
        'GetUserInfo'=>'https://api.weixin.qq.com/sns/userinfo?access_token=ACCESS_TOKEN&openid=OPENID&lang=ZH_CN'
    ];
    public function get_url($name)
    {
        strpos($name, '_') === false ? $name = ucwords($name) : $name = ucwords(Init::dataswitch()->convert2Underline($name));
        return self::API[$name]??$name;
    }
}

