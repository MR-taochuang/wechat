<?php

namespace wechat\driver\wepublic;

use wechat\driver\Driver;

/**
 * Class Media
 * @package wechat\driver\wepublic
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 16:29
 * 微信素材管理
 */
class Media extends Driver
{


    /**
     * @param $img
     * @param $type
     * @return array
     * @throws \Exception
     * 新增临时素材
     */
    public function MediaUpload($file, $type)
    {
        return self::callback(Api::access_token(), ['type' => $type])->instance(__NAMESPACE__, __FUNCTION__)->_file($file);
    }

    /**
     * @param $media_id
     * @return bool|string
     * @throws \Exception
     * 获取素材
     */
    public function MediaGet($media_id)
    {
        return self::callback(Api::access_token(), ['media_id' => $media_id])->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @param $media_id
     * @return bool|string
     * @throws \Exception
     * 更清晰的音频获取素材
     */
    public function MediaGetJssdk($media_id)
    {
        return self::callback(Api::access_token(), ['media_id' => $media_id])->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @param $img
     * @return array
     * @throws \Exception
     * 上传图文消息内的图片获取URL
     */
    public function MediaUploadimg($file)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_file($file);
    }

    /**
     * @param $options
     * @return array
     * @throws \Exception
     * 上传图文消息素材
     */
    public function MediaUploadNews(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param array $options
     * @return array
     * @throws \Exception
     * 新增永久图文素材
     */
    public function MediaNews(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param $img
     * @param $type
     * @return array
     * @throws \Exception
     * 新增其他素材 分别有图片（image）、语音（voice）、视频（video）和缩略图（thumb）
     */
    public function MediaOther($file, $type)
    {
        return self::callback(Api::access_token(), ['type' => $type])->instance(__NAMESPACE__, __FUNCTION__)->_file($file);
    }

    /**
     * @param $options
     * @return array
     * @throws \Exception
     * 获取永久素材
     */
    public function MediaGetMaterial(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param $options
     * @return array
     * @throws \Exception
     * 删除永久素材
     */
    public function MediaDeleteMaterial(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param $options
     * @return array
     * @throws \Exception
     * 修改永久素材
     */
    public function MediaUpdateMaterial(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @return mixed
     * 获取素材总数
     */
    public function MediaCount()
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @param array $options
     * @return array
     * 获取素材列表
     */
    public function MediaList(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param array $options
     * @return array
     * 打开已群发文章评论
     */
    public function MediaOpenComment(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param array $options
     * @return array
     * 关闭已群发文章评论
     */
    public function MediaCloseComment(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param array $options
     * @return array
     * 查看指定文章的评论数据
     */
    public function MediaShowComment(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param array $options
     * @return array
     * 将评论标记精选
     */
    public function MediaMarkComment(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param array $options
     * @return array
     * 将评论取消精选
     */
    public function MediaUnmarkComment(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param array $options
     * @return array
     * 删除评论
     */
    public function MediaDeleteComment(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param array $options
     * @return array
     * 回复评论
     */
    public function MediaReplyComment(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param array $options
     * @return array
     * 删除回复
     */
    public function MediaDeleteReply(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }
}