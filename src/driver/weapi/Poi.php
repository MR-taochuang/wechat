<?php

namespace wechat\driver\weapi;


use wechat\driver\Driver;

/**
 * Class Poi
 * @package wechat\driver\weapi
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 6:55
 * 微信小程序地点管理
 */
class Poi extends Driver
{

    /**
     * 添加地点
     * @param array $options
     * @return array
     */
    public function AddPoi(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * 删除地点
     * @param $poi_id 	/附近地点 ID
     * @return array
     *
     */
    public function DelPoi($poi_id){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['poi_id'=>$poi_id],'json');
    }

    /**
     * 查看地点列表
     * @return array
     */
    public function PoiList(){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_get();
    }

    /**
     * 展示/取消展示附近小程序
     * @param $poi_id /	附近地点 ID
     * @param $status /是否展示
     * @return array
     */
    public function PoiShow($poi_id,$status){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['poi_id'=>$poi_id,'status'=>$status],'json');
    }
}