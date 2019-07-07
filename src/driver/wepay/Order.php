<?php

namespace wechat\driver\wepay;

use wechat\driver\Driver;

/**
 * Class Order
 * @package wechat\driver\wepay
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 10:04
 * 微信商户订单
 */
class Order extends Driver{

    /**
     * @param array $options
     * @return array
     * 微信统一下单接口
     */
    public function unifiedOrder(array $options){
        Init::doParam($options);
        return self::instance(__NAMESPACE__,__FUNCTION__)->_post($options,'xml');
    }
    /**
     * @param array $options
     * @return array
     * 查询订单接口
     */
    public function orderQuery(array $options){
        Init::doParam($options);
        return self::instance(__NAMESPACE__,__FUNCTION__)->_post($options,'xml');
    }
    /**
     * @param $out_trade_no /订单号
     * @param string $type
     * @return array
     * 关闭订单接口
     */
    public function closeOrder($out_trade_no){
        $options=['out_trade_no'=>$out_trade_no];
        Init::doParam($options);
        return self::instance(__NAMESPACE__,__FUNCTION__)->_post($options,'xml');
    }

    /**
     * @param array $options
     * @return array
     * 提交被扫支付API
     * 刷卡支付
     */
    public function micropay(array $options){
        $options['appid'] = self::get('appid');
        $options['mch_id']=self::get('mch_id');
        $options['nonce_str']=strtolower(\rely\Init::dataswitch()->create_number(32));
        $options['sign']=Init::get_pay_sign($options);
        return self::instance(__NAMESPACE__,__FUNCTION__)->_post($options,'xml');
    }

    /**
     * @param array $options
     * @return array|void
     * 刷卡支付 撤销订单
     */
    public function reverse(array $options){
        $ssl_cer=self::get('ssl_cer');
        $ssl_key=self::get('ssl_key');
        return self::instance(__NAMESPACE__,__FUNCTION__)->_ssl($ssl_cer,$ssl_key)->_post($options,'xml');
    }
    /**
     * @param $authCode
     * @return array
     * 刷卡支付 授权码查询openid
     */
    public function AuthCode($authCode){
        $options['auth_code']=$authCode;
        Init::doParam($options);
        return self::instance(__NAMESPACE__,__FUNCTION__)->_post($options,'xml');
    }

}