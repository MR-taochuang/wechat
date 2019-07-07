<?php

namespace wechat\driver\wepay;

use wechat\driver\Driver;

/**
 * Class Marketing
 * @package wechat\driver\wepay
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 10:54
 * 微信商户营销工具
 */
class Marketing extends Driver{
    /**
     * @param array $options
     * @return array|void
     * 发放优惠券
     */
    public function coupon(array $options){
        Init::doParam($options);
        $ssl_cer=self::get('ssl_cer');
        $ssl_key=self::get('ssl_key');
        return self::instance(__NAMESPACE__,__FUNCTION__)->_ssl($ssl_cer,$ssl_key)->_post($options,'xml');
    }

    /**
     * @param array $options
     * @return array
     * 查询代金券批次
     */
    public function queryStock(array $options){
        Init::doParam($options);
        return self::instance(__NAMESPACE__,__FUNCTION__)->_post($options,'xml');
    }

    /**
     * @param array $options
     * @return array
     * 查询代金券
     */
    public function queryInfo(array $options){
        Init::doParam($options);
        return self::instance(__NAMESPACE__,__FUNCTION__)->_post($options,'xml');
    }
}