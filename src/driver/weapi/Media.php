<?php

namespace wechat\driver\weapi;

use wechat\driver\Driver;

/**
 * Class Media
 * @package wechat\driver\weapi
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/1/9 16:42
 * 微信小程序素材管理
 */
class Media extends Driver{

    /**
     * 把媒体文件上传到微信服务器。目前仅支持图片。用于发送客服消息或被动回复用户消息。
     * @param $file /本地文件
     * @param $type /文件类型
     * @return array
     *
     */
    public function MediaUpload($file,$type){
        return self::callback(Api::access_token(),['type'=>$type])->_file($file);
    }

    /**
     * 获取客服消息内的临时素材。即下载临时的多媒体文件。目前小程序仅支持下载图片文件。
     * @param $media_id /媒体文件 ID
     * @return array
     */
    public function MediaGet($media_id){
        return self::callback(Api::access_token(),['media_id'=>$media_id])->_get();
    }

}