<?php

namespace wechat\driver\wethird\weapi;

use rely\Init;
use rely\init\Config;

/**
 * Class Api
 * @package wechat\driver\wethird\weapi
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 21:00
 * 代理小程序地址
 */
class Api extends Config
{
    const API = [
        //创建小程序 请求方式 POST
        "CreateWeapi"=>'https://api.weixin.qq.com/cgi-bin/component/fastregisterweapp?action=create&component_access_token=COMPONENT_ACCESS_TOKEN',
        //查询创建状态 请求方式 POST
        'ShowCreateState'=>'https://api.weixin.qq.com/cgi-bin/component/fastregisterweapp?action=search&component_access_token=COMPONENT_ACCESS_TOKEN',
        //设置小程序服务器域名 请求方式POST
        'SetDomain'=>'https://api.weixin.qq.com/wxa/modify_domain?access_token=ACCESS_TOKEN',
        //设置小程序业务域名 请求方式 POST
        'SetBusinessDomain'=>'https://api.weixin.qq.com/wxa/setwebviewdomain?access_token=ACCESS_TOKEN',
        //获取帐号基本信息 请求方式 GET
        'WeapiInfo'=>'https://api.weixin.qq.com/cgi-bin/account/getaccountbasicinfo?access_token=ACCESS_TOKEN',
        //小程序名称设置及改名 请求方式 POST
        'SetNickname'=>'https://api.weixin.qq.com/wxa/setnickname?access_token=ACCESS_TOKEN',
        //小程序改名审核状态查询 请求方式 POST
        'UpdateNameState'=>'https://api.weixin.qq.com/wxa/api_wxa_querynickname?access_token=ACCESS_TOKEN',
        //微信认证名称检测 请求方式 POST
        'CheckName'=>'https://api.weixin.qq.com/cgi-bin/wxverify/checkwxverifynickname?access_token=ACCESS_TOKEN',
        //修改头像 请求方式 POST
        'UpdateHeadimage'=>'https://api.weixin.qq.com/cgi-bin/account/modifyheadimage?access_token=ACCESS_TOKEN',
        //修改功能介绍 请求方式 POST
        'UpdaeFunc'=>'https://api.weixin.qq.com/cgi-bin/account/modifysignature?access_token=TOKEN'
    ];
    public function get_url($name)
    {
        strpos($name, '_') === false ? $name = ucwords($name) : $name = ucwords(Init::dataswitch()->convert2Underline($name));
        return self::API[$name]??$name;
    }
}

