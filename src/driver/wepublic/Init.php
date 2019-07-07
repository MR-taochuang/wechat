<?php

namespace wechat\driver\wepublic;

use wechat\driver\Driver;

/**
 * Class Init
 * @package wechat\driver\wepublic
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 15:16
 * 微信基础类库
 */
class Init extends Driver
{
    /**
     * @return array
     * @throws \Exception
     * 获取微信服务器所有IP
     */
    public function GetWechatIp()
    {
        return self::callback(self::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @return string
     * 获取微信AccessToken
     */
    public function access_token()
    {
        $access_token = \rely\Init::cache()->get('AccessToken');
        if (!empty($access_token)) return $access_token;
        $res = self::instance(__NAMESPACE__, __FUNCTION__)->_get();
        if (!empty($res['expires_in'])) \rely\Init::cache()->set('AccessToken', $res, 7000);
        return $res;
    }
    /**
     * @param array $options
     * @return array
     * @throws \Exception
     * 检测服务器
     */
    public function web_check(array $options)
    {
        return self::callback(self::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param $template_id
     * @param $scene
     * @param $redirect_url
     * @param $reserved
     * 一次性订阅
     */
    public function subscribemsg($template_id, $scene, $redirect_url, $reserved)
    {
        return self::callback(['template_id' => $template_id, 'scene' => $scene, 'redirect_url' => $redirect_url, 'reserved' => $reserved])->instance(__NAMESPACE__, __FUNCTION__)::$url;

    }

    /**
     * @param string $appid
     * @return array
     * @throws \Exception
     * 公众号调用或第三方平台帮公众号调用对公众号的所有api调用（包括第三方帮其调用）次数进行清零
     */
    public function clear_quota($appid = '')
    {
        $appid = empty($appid) ? self::get('appid') : $appid;
        return self::callback(self::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['appid' => $appid], 'json');
    }

    /**
     * @return array
     * @throws \Exception
     * 获取公众号的自动回复规则
     */
    public function GetCurrent()
    {
        return self::callback(self::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @param $access_token
     * @return mixed
     * @throws \Exception
     * 设置外部token
     */
    public function setAccessToken($access_token)
    {
        \rely\Init::cache()->set('AccessToken', $access_token, 7000);
        return $access_token;
    }
}