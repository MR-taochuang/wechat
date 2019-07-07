<?php

namespace wechat\driver\wepublic;

use wechat\driver\Driver;

/**
 * Class Custom
 * @package WeChat
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2018/12/26 17:44
 * 客服发送消息
 */
class Custom extends Driver{
    /**
     * @param $options
     * @return array
     * @throws \Exception
     * 客服发送信息
     */
    public function CustomSend(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }
    /**
     * @param $options
     * @return array
     * @throws \Exception
     * 客服输入状态
     */
    public function CustomTyping(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }
    /**
     * @param array $options
     * @return array
     * @throws \Exception
     * 根据标签进行群发
     */
    public function MassSendAll(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }
    /**
     * @param array $options
     * @return array
     * @throws \Exception
     * 根据openid进行群发
     */
    public function MassSend(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }
    /**
     * @param $options
     * @return array
     * @throws \Exception
     * 删除群发
     */
    public function MassDelete(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }
    /**
     * @param $options
     * @return array
     * @throws \Exception
     * 预览接口
     */
    public function MassPreview(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }
    /**
     * @param $options
     * @return array
     * @throws \Exception
     * 查询群发消息发送状态
     */
    public function MassGet(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }
    /**
     * @param $options
     * @return array
     * @throws \Exception
     * 获取群发速度
     */
    public function MassSpeedGet(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }
    /**
     * @param $options
     * @return array
     * @throws \Exception
     * 设置群发速度
     */
    public function MassSpeedSet(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }
}