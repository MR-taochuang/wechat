<?php

namespace wechat\driver\wepay;

use wechat\driver\Driver;

/**
 * Class Bill
 * @package wechat\driver\wepay
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 10:45
 * 微信商户账单管理
 */
class Bill extends Driver{

    /**
     * @param array $options
     * @return array
     * 下载对账单
     */
    public function downloadBill(array $options){
        $options['appid'] = self::get('appid');
        $options['mch_id']=self::get('mch_id');
        $options['nonce_str']=strtolower(\rely\Init::dataswitch()->create_number(32));
        $options['sign']=Init::get_pay_sign($options);
        return self::instance(__NAMESPACE__,__FUNCTION__)->_post($options,'xml');
    }
    /**
     * @param array $options
     * @return array
     * 拉取订单评价数据
     */
    public function OrderComment(array $options){
        Init::doParam($options);
        return self::instance(__NAMESPACE__,__FUNCTION__)->_post($options,'xml');
    }
}