<?php

namespace wechat\driver\weapi;

use wechat\driver\Driver;

/**
 * Class Init
 * @package wechat\driver\weapi
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 22:19
 * 微信小程序基础类
 */
class Init extends Driver
{


    /**
     * @return string
     * 获取微信小程序access_token
     */
    public function AccessToken()
    {
        $access_token = \rely\Init::cache()->get('WeApiAccessToken');
        if (!empty($access_token)) return $access_token;
        $res = self::instance(__NAMESPACE__, __FUNCTION__)->_get();
        if (!empty($res['expires_in'])) \rely\Init::cache()->set('WeApiAccessToken', $res, 7000);
        return $res;
    }

    /**
     * @param $access_token
     * @return mixed
     * @throws \Exception
     * 设置外部token
     */
    public function setAccessToken($access_token)
    {
        \rely\Init::cache()->set('WeApiAccessToken', $access_token, 7000);
        return $access_token;
    }

    /**
     * 用户支付完成后，获取该用户的 UnionId
     * @param $openid /支付用户唯一标识
     * @param null $transaction_id 微信支付订单号
     * @param $mch_id /微信支付分配的商户号，和商户订单号配合使用
     * @param $out_trade_no /微信支付商户订单号，和商户号配合使用
     * @return array
     */
    public function GetUnionid($openid, $transaction_id = null, $mch_id, $out_trade_no)
    {
        $link_url = '';
        if (!empty($transaction_id)) $link_url .= '&transaction_id=' . $transaction_id;
        if (!empty($mch_id)) $link_url .= '&mch_id=' . $mch_id;
        if (!empty($out_trade_no)) $link_url .= '&out_trade_no=' . $out_trade_no;
        return self::callback(self::AccessToken(),['link_url' => $link_url, 'openid' => $openid])->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * 创建被分享动态消息的 activity_id
     * @return array
     */
    public function Activityid()
    {
        return self::callback(self::AccessToken())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * 修改被分享的动态消息
     * @param $activity_id /动态消息的 ID，通过 createActivityId 接口获取
     * @param $target_state /动态消息修改后的状态（具体含义见后文）
     * @param $template_info /动态消息对应的模板信息
     * @return array
     */
    public function Updatablemsg($activity_id, $target_state, $template_info)
    {
        return self::callback(self::AccessToken())->instance(__NAMESPACE__, __FUNCTION__)->_post(['activity_id' => $activity_id, 'target_state' => $target_state, 'template_info' => $template_info],'json');
    }

    /**
     * 校验一张图片是否含有违法违规内容
     * @param $file /文件地址
     * @return array
     */
    public function imgSecCheck($file)
    {
        return self::callback(self::AccessToken())->instance(__NAMESPACE__, __FUNCTION__)->_file($file);
    }

    /**
     * 检查一段文本是否含有违法违规内容。
     * @param $content /文字内容
     * @return array
     */
    public function msgSecCheck($content)
    {
        return self::callback(self::AccessToken())->instance(__NAMESPACE__, __FUNCTION__)->_post(['content' => $content],'json');
    }

}