<?php

namespace wechat\driver\weapi;


use wechat\driver\Driver;

/**
 * Class Qrcode
 * @package wechat\driver\weapi
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 6:59
 * 小程序二维码
 */
class Qrcode extends Driver{

    /**
     * 获取小程序二维码，适用于需要的码数量较少的业务场景。通过该接口生成的小程序码，永久有效，有数量限制
     * @param $path /扫码进入的小程序页面路径，最大长度 128 字节，不能为空
     * @param null $width /二维码的宽度，单位 px。最小 280px，最大 1280px
     * @return array
     *
     */
    public function CreateQrcode($path,$width=null){
        $data['path']=$path;
        if(!empty($width)) $data['width']=$width;
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($data,'json');
    }

    /**
     * 获取小程序码，适用于需要的码数量较少的业务场景。通过该接口生成的小程序码，永久有效，有数量限制
     * @param array $options
     * @return array
     */
    public function GetWXACode(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * 获取小程序码，适用于需要的码数量极多的业务场景。通过该接口生成的小程序码，永久有效，数量暂无限制
     * @param array $options
     * @return array
     */
    public function GetWXACodeUnlimit(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

}