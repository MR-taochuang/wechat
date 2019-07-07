<?php

namespace wechat\driver\wepublic;

use wechat\driver\Driver;

/**
 * Class Menu
 * @package Wechat
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 17:17
 * 微信菜单管理
 */
class Menu extends Driver
{

    /**
     * @param array $options 菜单参数
     * @return array
     * @throws \Exception
     * 创建微信菜单
     */
    public function CreateMenu(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @return array
     * @throws \Exception
     * 获取微信菜单参数
     */
    public function GetMenu()
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @return array
     * @throws \Exception
     * 删除微信菜单
     */
    public function DeleteMenu()
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @param array $options
     * @return array
     * @throws \Exception
     * 创建个性菜单
     */
    public function CreateConditionalMenu(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param array $options
     * @return array
     * @throws \Exception
     * 删除个性化菜单
     */
    public function DeleteConditionalMenu(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param array $options
     * @return array
     * @throws \Exception
     * 测试个性化菜单匹配结果
     */
    public function TryMatch(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @return array
     * @throws \Exception
     * 获取自定义菜单配置接口
     */
    public function GetCurrentSelfmenuInfo()
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }


}