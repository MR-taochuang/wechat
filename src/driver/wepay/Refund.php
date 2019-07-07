<?php

namespace wechat\driver\wepay;

use wechat\driver\Driver;

/**
 * Class Refund
 * @package wechat\driver\wepay
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 10:47
 * 微信商户平台退款
 */
class Refund extends Driver{

    /**
     * @param $options /退款参数
     * @return array|void
     * 申请退款
     */
    public function refund(array $options){
        Init::doParam($options);
        $ssl_cer=self::get('ssl_cer');
        $ssl_key=self::get('ssl_key');
        return self::instance(__NAMESPACE__,__FUNCTION__)->_ssl($ssl_cer,$ssl_key)->_post($options,'xml');
    }
    /**
     * @param $options /查询参数
     * @return array
     * 查询退款
     */
    public function refundQuery(array $options){
        Init::doParam($options);
        return self::instance(__NAMESPACE__,__FUNCTION__)->_post($options,'xml');
    }
}