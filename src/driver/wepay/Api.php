<?php

namespace wechat\driver\wepay;

use rely\Init;
use rely\init\Config;

/**
 * Class Api
 * @package wechat\driver\wepay
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 11:36
 * 微信支付地址
 *
 * @method \wechat\driver\wepay\Init init($config=[]) 微信支付初始配置
 * @method \wechat\driver\wepay\Bill bill($config=[]) 微信商户下账单
 * @method \wechat\driver\wepay\Marketing marketing($config=[]) 微信商户营销
 * @method \wechat\driver\wepay\Order order($config=[]) 微信商户订单
 * @method \wechat\driver\wepay\Redpack redpack($config=[]) 微信商户发红包
 * @method \wechat\driver\wepay\Refund refund($config=[]) 微信商户退款
 * @method \wechat\driver\wepay\Transfers transfers($config=[]) 微信商户转账
 *
 */
class Api extends Config
{
    const API = [
        //微信统一下单接口
        'UnifiedOrder' => 'https://api.mch.weixin.qq.com/pay/unifiedorder',
        //微信查询订单接口
        'OrderQuery' => 'https://api.mch.weixin.qq.com/pay/orderquery',
        //关闭订单接口
        'CloseOrder' => 'https://api.mch.weixin.qq.com/pay/closeorder',
        //申请退款
        'Refund' => 'https://api.mch.weixin.qq.com/secapi/pay/refund',
        //查询退款
        'RefundQuery' => 'https://api.mch.weixin.qq.com/pay/refundquery',
        //下载对账单
        'DownloadBill' => 'https://api.mch.weixin.qq.com/pay/downloadbill',
        //刷卡支付 提交被扫支付API
        'Micropay' => 'https://api.mch.weixin.qq.com/pay/micropay',
        //刷卡支付 撤销订单
        'Reverse' => 'https://api.mch.weixin.qq.com/secapi/pay/reverse',
        //测速上报
        'Report' => 'https://api.mch.weixin.qq.com/payitil/report',
        //刷卡支付 授权码查询openid
        'AuthCode' => 'https://api.mch.weixin.qq.com/tools/authcodetoopenid',
        //拉取订单评价数据
        'OrderComment' => 'https://api.mch.weixin.qq.com/billcommentsp/batchquerycomment',
        //发放代金券
        'Coupon' => 'https://api.mch.weixin.qq.com/mmpaymkttransfers/send_coupon',
        //查询代金券批次
        'QueryStock' => 'https://api.mch.weixin.qq.com/mmpaymkttransfers/query_coupon_stock',
        //查询代金券信息
        'QueryInfo' => 'https://api.mch.weixin.qq.com/mmpaymkttransfers/query_coupon_stock',
        //发放红包
        'RedPack' => 'https://api.mch.weixin.qq.com/mmpaymkttransfers/sendredpack',
        //发放裂变红包
        'GroupRedPack' => 'https://api.mch.weixin.qq.com/mmpaymkttransfers/sendgroupredpack',
        //查询红包记录
        'QueryRedPack' => 'https://api.mch.weixin.qq.com/mmpaymkttransfers/gethbinfo',
        //企业付款到零钱
        'Transfers' => 'https://api.mch.weixin.qq.com/mmpaymkttransfers/promotion/transfers',
        //查询企业付款到零钱
        'QueryTransfers' => 'https://api.mch.weixin.qq.com/mmpaymkttransfers/gettransferinfo',
        //企业付款到银行卡
        'TransfersBank' => 'https://api.mch.weixin.qq.com/mmpaysptrans/pay_bank',
        //商户企业付款到银行卡操作进行结果查询
        'QueryTransfersBank' => 'https://api.mch.weixin.qq.com/mmpaysptrans/query_bank',
        //获取文件签名
        'GetRsaContent' => 'https://fraud.mch.weixin.qq.com/risk/getpublickey'
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
}