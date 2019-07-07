<?php

namespace wechat\driver\weapi;

use wechat\driver\Driver;

/**
 * Class Custom
 * @package wechat\driver\weapi
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 22:18
 * 小程序客服发送消息
 */

class Custom extends Driver{

    /**
     * 下发客服当前输入状态给用户
     * @param $touser
     * @param $command /用户的 OpenID
     * @return array /命令
     */
    public function WeApiCustomTyping($touser,$command){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['touser'=>$touser,'command'=>$command],'json');
    }

    /**
     * 发送客服消息给用户
     * @param array $options
     * @return array
     */
    public function WeApiCustomSend(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }
}