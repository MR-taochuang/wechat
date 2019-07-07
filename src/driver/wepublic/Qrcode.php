<?php

namespace wechat\driver\wepublic;

use wechat\driver\Driver;

/**
 * Class Qrcode
 * @package wechat\driver\wepublic
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 17:30
 * 微信二维码
 */
class Qrcode extends Driver{

    /**
     * @param $scene
     * @param int $expire_seconds
     * @return array
     * 创建二维码ticket
     */
    public function QrcodeCreate($scene, $expire_seconds = 0){
        if (is_integer($scene)) {
            $options = ['action_info' => ['scene' => ['scene_id' => $scene]]];
        } else {
            $options = ['action_info' => ['scene' => ['scene_str' => $scene]]];
        }
        if ($expire_seconds > 0) {
            $options['expire_seconds'] = $expire_seconds;
            $options['action_name'] = is_integer($scene) ? 'QR_SCENE' : 'QR_STR_SCENE';
        } else {
            $options['action_name'] = is_integer($scene) ? 'QR_LIMIT_SCENE' : 'QR_LIMIT_STR_SCENE';
        }
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');

    }

    /**
     * @param array $ticket
     * @return mixed
     * 通过ticekt获取url地址
     */
    public function Qrcode($ticket){
        return self::callback(Api::access_token(),['ticket',$ticket])->instance(__NAMESPACE__, __FUNCTION__)::$url;

    }

    /**
     * @param $long_url
     * @return array
     * 长链接转短链接接口
     */
    public function ShortUrl($long_url){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['action'=>'long2short','long_url'=>$long_url], 'json');
    }

}