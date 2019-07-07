<?php

namespace wechat;
use wechat\driver\Driver;


/**
 * Class Register
 * @package wechat
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 11:18
 * 微信第三方请求基础类
 *
 * @method \wechat\driver\wepublic\Api wepublic($config = []) static 微信公众平台
 * @method \wechat\driver\weapi\Api weapi($config=[]) static 微信小程序平台
 * @method \wechat\driver\wepay\Api wepay($config=[]) static 微信商户平台
 * @method \wechat\driver\wethird\Api wethird($config=[]) static 微信开放平台
 * @method \wechat\driver\encry\ErrorCode ErrorCode() static 微信错误码
 * @method \wechat\driver\encry\PKCS7Encoder PKCS7Encoder() static 微信加密pkcs
 * @method \wechat\driver\encry\SHA1 SHA1() static 微信加密sha1
 * @method \wechat\driver\encry\WXBizDataCrypt WXBizDataCrypt($appid, $sessionKey) static 微信解密WXBizDataCrypt
 * @method \wechat\driver\encry\WXBizMsgCrypt WXBizMsgCrypt() static 微信加密解密信息
 * @method \wechat\driver\encry\XMLParse XMLParse() static 微信转xml
 *
 */
class Register
{
    public static function __callStatic($class, $arguments)
    {
        return (new \ReflectionClass(Driver::get_namespace($class)))->newInstanceArgs($arguments);
    }
}