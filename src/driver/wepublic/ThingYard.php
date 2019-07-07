<?php

namespace wechat\driver\wepublic;

use wechat\driver\Driver;

/**
 * Class ThingYard
 * @package wechat\driver\wepublic
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 21:49
 * 微信一物一码
 */
class ThingYard extends Driver{

    /**
     * @param $code_count
     * @param $isv_application_id
     * @return mixed
     * 申请二维码接口
     */
    public function ApplyQrcode($code_count,$isv_application_id){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['code_count'=>$code_count,'isv_application_id'=>$isv_application_id],'json');
    }

    /**
     * @param $application_id
     * @param $isv_application_id
     * @return mixed
     * 查询二维码申请单接口
     */
    public function ShowQrcode($application_id,$isv_application_id){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['application_id'=>$application_id,'isv_application_id'=>$isv_application_id],'json');
    }

    /**
     * @param $application_id
     * @param $code_start
     * @param $code_end
     * @return mixed
     * 下载二维码包接口
     */
    public function DowloadQrcode($application_id,$code_start,$code_end){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['application_id'=>$application_id,'code_start'=>$code_start,'code_end'=>$code_end],'json');
    }

    /**
     * @param array $options
     * @return mixed
     * 激活二维码
     */
    public function ActiveQrcode(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options,'json');
    }

    /**
     * @param array $options
     * @return mixed
     * 查询二维码激活状态接口
     */
    public function ShowQrcodeState(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options,'json');
    }

    /**
     * @param $openid
     * @param $code_ticket
     * @return mixed
     * code_ticket换code接口
     */
    public function TicketCode($openid,$code_ticket){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['openid'=>$openid,'code_ticket'=>$code_ticket],'json');
    }

}