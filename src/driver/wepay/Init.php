<?php

namespace wechat\driver\wepay;


use wechat\driver\Driver;

/**
 * Class We
 * @package WePay
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/1/11 16:55
 * 支付配置接口
 */
class Init extends Driver
{

    /**
     * @param $options
     * @param string $sign_type
     * 处理预支付订单参数
     */
    public static function doParam(&$options,$sign_type='MD5')
    {
        $options['appid'] = self::get('appid');
        $options['mch_id']=self::get('mch_id');
        $options['nonce_str']=strtolower(\rely\Init::dataswitch()->create_number(32));
        $options['sign']=self::get_pay_sign($options,$sign_type);
    }

    /**
     * @param $options
     * 生成签名数据
     */
    public static function doSign(&$options){
        $options['mch_id']=self::get('mch_id');
        $options['nonce_str']=strtolower(\rely\Init::dataswitch()->create_number(32));
        $options['sign']=self::get_pay_sign($options);
    }

    /**
     * @param $prepayId /预付款参数
     * @param string $type
     * @return mixed
     * 转换jsapi支付/h5/小程序支付请求参数
     */
    public static function jsapiParam($prepayId)
    {
        $options["appId"] = self::get('appid');
        $options["timeStamp"] = (string)time();
        $options["nonceStr"] = strtolower(\rely\Init::dataswitch()->create_number(32));
        $options["package"] = "prepay_id={$prepayId}";
        $options["signType"] = "MD5";
        $options["paySign"] = self::get_pay_sign($options);
        $options['timestamp'] = $options['timeStamp'];
        return $options;
    }


    /**
     * @param $product_id /支付订单号
     * @return string
     *扫码支付二维码
     */
    public static function qrcodeParam($product_id)
    {
        $options['appid'] = self::get('appid');
        $options['mch_id']=self::get('mch_id');
        $options['time_stamp']=(string)time();
        $options['nonce_str']=strtolower(\rely\Init::dataswitch()->create_number(32));
        $options['product_id']=$product_id;
        $options['sign']=self::get_pay_sign($options);
        return "weixin://wxpay/bizpayurl?" . http_build_query($options);
    }

    /**
     * @param $prepayid
     * @return mixed
     * 转换app支付参数
     */
    public static function appParam($prepayid)
    {

        $options['appid'] = self::get('appid');
        $options['partnerid']=self::get('mch_id');
        $options['prepayid']=(string)$prepayid;
        $options['package']='Sign=WXPay';
        $options['timestamp']=(string)time();
        $options['noncestr']=strtolower(\rely\Init::dataswitch()->create_number(32));
        $options['sign']=self::get_pay_sign($options);
        return $options;
    }

    /**
     * @param $options
     * @param string $type
     * @return string
     * 获取生成签名
     */
    public static function get_pay_sign($options, $type = "MD5")
    {
        return self::MakeSign($options, $type);
    }

    /**
     * 生成微信签名
     * @param $options
     * @param string $type
     * @return string
     */
    protected static function MakeSign($data, $signType = 'MD5',$buff='')
    {
        ksort($data);
        if (isset($data['sign'])) unset($data['sign']);
        foreach ($data as $k => $v) $buff .= "{$k}={$v}&";
        $buff .= ("key=" . self::get('mch_key'));
        if (strtoupper($signType) === 'MD5') {
            return strtoupper(md5($buff));
        }
        return strtoupper(hash_hmac('SHA256', $buff, self::get('mch_key')));
    }
    public static function ToUrlParams($options)
    {
        $buff = "";
        foreach ($options as $k => $v)
        {
            if($k != "sign" && $v != "" && !is_array($v)){
                $buff .= $k . "=" . $v . "&";
            }
        }
        $buff = trim($buff, "&");
        return $buff;
    }

    /**
     * @param $string
     * @param string $encrypted
     * @return array|string
     * rsa加密
     */
    public static function rsaEncode($string, $encrypted = '')
    {
        $search = ['-----BEGIN RSA PUBLIC KEY-----', '-----END RSA PUBLIC KEY-----', "\n", "\r"];
        $pkc1 = str_replace($search, '', self::getRsaContent());
        $publicKey = '-----BEGIN PUBLIC KEY-----' . PHP_EOL .
            wordwrap('MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8A' . $pkc1, 64, PHP_EOL, true) . PHP_EOL .
            '-----END PUBLIC KEY-----';
        if (!openssl_public_encrypt("{$string}", $encrypted, $publicKey, OPENSSL_PKCS1_OAEP_PADDING)) {
            return ['code'=>400,'message'=>'Rsa Encrypt Error.'];
        }
        return base64_encode($encrypted);
    }

    /**
     * @return array|string
     * 获取文件签名内容
     */
    private static function getRsaContent()
    {
        $cacheKey = "pub_ras_key_" .self::get('mch_id');
        if (($pub_key = \rely\Init::cache()->get($cacheKey))) {
            return $pub_key;
        }
        $ssl_cer=self::get('ssl_cer');
        $ssl_key=self::get('ssl_key');
        $data=self::instance(__NAMESPACE__,__FUNCTION__)->_ssl($ssl_cer,$ssl_key)->post([],'json');
        if (!isset($data['return_code']) || $data['return_code'] !== 'SUCCESS' || $data['result_code'] !== 'SUCCESS') {
            $error = 'ResultError:' . $data['return_msg'];
            $error .= isset($data['err_code_des']) ? ' - ' . $data['err_code_des'] : '';
            return ['code'=>400,'error'=>$error,'errorCode'=> 20000, 'data'=>$data];
        }
        \rely\Init::cache()->set($cacheKey, $data['pub_key'], 600);
        return $data['pub_key'];
    }
    /**
     * @param $prepayId
     * @return array
     * jsapi支付参数
     */
    public static function jsapiPay($prepayId)
    {
        $option = [];
        $option["appId"] = self::get('appid');
        $option["timeStamp"] = (string)time();
        $option["nonceStr"] = strtolower(\rely\Init::dataswitch()->create_number(32));
        $option["package"] = "prepay_id={$prepayId}";
        $option["signType"] = "MD5";
        $option["paySign"] = self::get_pay_sign($option);
        $option['timestamp'] = $option['timeStamp'];
        return $option;
    }
    /**
     * @param array $options
     * @return array
     * 测速上报，该方法内部封装在report中，使用时请注意异常流程
     */
    public function report(array $options){
        self::doParam($options);
        return self::instance(__NAMESPACE__,__FUNCTION__)->_post($options,'xml');
    }

}