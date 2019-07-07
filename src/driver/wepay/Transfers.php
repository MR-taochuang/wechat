<?php

namespace wechat\driver\wepay;

use wechat\driver\Driver;

/**
 * Class Transfers
 * @package wechat\driver\wepay
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date Times
 * 企业付款
 */
class Transfers extends Driver{

    /**
     * @param array $options
     * @return array|void
     * 企业付款到零钱
     */
    public function Transfers(array $options){
        Init::doParam($options);
        $ssl_cer=self::get('ssl_cer');
        $ssl_key=self::get('ssl_key');
        return self::instance(__NAMESPACE__,__FUNCTION__)->_ssl($ssl_cer,$ssl_key)->_post($options,'xml');

    }

    /**
     * @param $partnerTradeNo
     * @return array|void
     * 查询企业付款到零钱
     */
    public function queryTransfers($partnerTradeNo){

        $options= ['partner_trade_no' => $partnerTradeNo];
        Init::doParam($options);
        $ssl_cer=self::get('ssl_cer');
        $ssl_key=self::get('ssl_key');
        return self::instance(__NAMESPACE__,__FUNCTION__)->_ssl($ssl_cer,$ssl_key)->_post($options,'xml');

    }

    /**
     * @param array $options
     * @param string $type
     * @return array|void
     * 企业付款到银行卡
     */
    public function TransfersBank(array $options){
        $options['enc_bank_no']=Init::rsaEncode($options['enc_bank_no']);
        $options['enc_true_name']=Init::rsaEncode($options['enc_true_name']);
        $options['desc']=isset($options['desc']) ? $options['desc'] : '';
        Init::doParam($options);
        $ssl_cer=self::get('ssl_cer');
        $ssl_key=self::get('ssl_key');
        return self::instance(__NAMESPACE__,__FUNCTION__)->_ssl($ssl_cer,$ssl_key)->_post($options,'xml');
    }

    /**
     * @param $partnerTradeNo
     * @return array|void
     * 商户企业付款到银行卡操作进行结果查询
     */
    public function queryTransfersBank($partnerTradeNo){
        $options=['partner_trade_no' => $partnerTradeNo];
        Init::doParam($options);
        $ssl_cer=self::get('ssl_cer');
        $ssl_key=self::get('ssl_key');
        return self::instance(__NAMESPACE__,__FUNCTION__)->_ssl($ssl_cer,$ssl_key)->_post($options,'xml');
    }

}