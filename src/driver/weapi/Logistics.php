<?php

namespace wechat\driver\weapi;


use wechat\driver\Driver;

/**
 * Class Logistics
 * @package wechat\driver\weapi
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 6:43
 * 微信小程序物流助手
 */
class Logistics extends Driver{


    /**
     * 生成运单
     * @param array $options
     * @return array
     */
    public function addOrder(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * 取消运单
     * @param array $options
     * @return array
     */
    public function cancelOrder(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * 获取支持的快递公司列表
     * @return array
     */
    public function getAllDelivery(){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * 获取运单数据
     * @param array $options
     * @return array
     */
    public function getOrder(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * 查询运单轨迹
     * @param array $options
     * @return array
     */
    public function getPath(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * 获取打印员。若需要使用微信打单 PC 软件，才需要调用
     * @return array
     */
    public function getPrinter(){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * 获取电子面单余额。仅在使用加盟类快递公司时，才可以调用
     * @param $delivery_id /快递公司ID，参见getAllDelivery
     * @param $biz_id /快递公司客户编码
     * @return array
     */
    public function getQuota($delivery_id,$biz_id){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['delivery_id'=>$delivery_id,'biz_id'=>$biz_id],'json');
    }

}