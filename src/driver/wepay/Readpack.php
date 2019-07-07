<?php

namespace wechat\driver\wepay;

use wechat\driver\Driver;

class Redpack extends Driver{

    /**
     * @param $options
     * @return array|void
     * 发放普通红包
     */
    public function RedPack(array $options){
        Init::doSign($options);
        $ssl_cer=self::get('ssl_cer');
        $ssl_key=self::get('ssl_key');
        return self::instance(__NAMESPACE__,__FUNCTION__)->_ssl($ssl_cer,$ssl_key)->_post($options,'xml');
    }

    /**
     * @param array $options
     * @param string $type
     * @return array|void
     * 发放裂变红包
     */
    public function GroupRedPack(array $options){
        Init::doParam($options);
        $ssl_cer=self::get('ssl_cer');
        $ssl_key=self::get('ssl_key');
        return self::instance(__NAMESPACE__,__FUNCTION__)->_ssl($ssl_cer,$ssl_key)->_post($options,'xml');
    }
    /**
     * @param $mchBillno
     * @return array|void
     * 查询红包记录
     */
    public function queryRedPack($mchBillno,$bill_type){
        $options=['mch_billno' => $mchBillno, 'bill_type' => $bill_type];
        Init::doParam($options);
        $ssl_cer=self::get('ssl_cer');
        $ssl_key=self::get('ssl_key');
        return self::instance(__NAMESPACE__,__FUNCTION__)->_ssl($ssl_cer,$ssl_key)->_post($options,'xml');
    }

}