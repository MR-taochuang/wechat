<?php

namespace wechat\driver\wepublic;
use wechat\driver\Driver;


/**
 * Class Template
 * @package wechat\driver\wepublic
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 21:02
 * 微信模板消息
 */
class Template extends Driver{


    /**
     * @param array $options
     * @return array
     * @throws \Exception
     * 模板消息设置行业
     */
    public function TemplateSetIndustry(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * @param array $options
     * @return array
     * @throws \Exception
     * 获取设置的行业信息
     */
    public function TemplateGetIndustry(){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @param array $options
     * @return array
     * @throws \Exception
     * 获得模板ID
     */
    public function TemplateId(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * @param array $options
     * @return array
     * @throws \Exception
     * 获取模板列表
     */
    public function TemplateList(){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @param array $options
     * @return array
     * @throws \Exception
     * 删除模板
     */
    public function TemplateDelete(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @param array $options
     * @return array
     * @throws \Exception
     *发送模板消息
     */
    public function TemplateSend(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * @param array $ooptions
     * @return array
     * @throws \Exception
     * 通过API推送订阅模板消息给到授权微信用户
     */
    public function SubscribeTemplate(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

}