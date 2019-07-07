<?php

namespace wechat\driver\wepublic;

use wechat\driver\Driver;


/**
 * Class Weshop
 * @package wechat\driver\wepublic
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 21:31
 * 微信门店
 */
class Weshop extends Driver{


    /***
     * @param $buffer
     * @return array
     * 创建门店接口
     */
    public function AddPoi(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options,'json');
    }

    /***
     * @param $buffer
     * @return array
     * 查询门店信息接口
     */
    public function GetPoi($poi_id){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['poi_id'=>$poi_id],'json');
    }

    /***
     * @param $begin
     * @param $limit
     * @return array
     * 查询门店列表接口
     */
    public function GetPoiList($begin,$limit){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['begin'=>$begin,'limit'=>$limit],'json');
    }

    /***
     * @param $options
     * @return array
     * 修改门店服务信息接口
     */
    public function UpdatePoi(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options,'json');
    }

    /***
     * @param $poi_id
     * @return array
     * 删除门店接口
     */
    public function DelPoi($poi_id){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['poi_id'=>$poi_id],'json');
    }

    /***
     * @return array
     * 门店类目表接口
     */
    public function GetWxCategory(){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /***
     * @return array
     * 拉取门店小程序类目接口
     */
    public function GetMerchantCategory(){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /***
     * @param array $options
     * @return array
     * 创建门店小程序接口
     */
    public function ApplyMerchant(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options,'json');
    }

    /***
     * @return array
     * 查询门店小程序审核结果接口
     */
    public function GetMerchantAuditInfo(){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /***
     * @param $headimg_mediaid
     * @param $intro
     * @return array
     * 修改门店小程序信息
     */
    public function ModifyMerchant($headimg_mediaid,$intro){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['headimg_mediaid'=>$headimg_mediaid,'intro'=>$intro],'json');

    }

    /***
     * @return array
     * 从腾讯地图拉取省市区信息
     */
    public function GetDistrict(){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /***
     * @param $districtid
     * @param $keyword
     * @return array
     * 在腾讯地图中搜索门店
     */
    public function SearchMapPoi($districtid,$keyword){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['districtid'=>$districtid,'keyword'=>$keyword],'json');
    }

    /***
     * @param array $options
     * @return array
     * 在腾讯地图中创建门店
     */
    public function CreateMapPoi($options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options,'json');
    }

    /***
     * @param array $options
     * @return array
     * 添加门店
     */
    public function AddStore(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options,'json');
    }

    /***
     * @param array $options
     * @return array
     *  更新门店信息
     */
    public function UpdateStore(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options,'json');
    }

    /***
     * @param $offset
     * @param $limit
     * @return array
     * 获取门店信息列表
     */
    public function GetStoreInfo($offset,$limit){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['offset'=>$offset,'limit'=>$limit],'json');
    }

    /***
     * @param $poi_id
     * @return array
     * 删除门店
     */
    public function DelStore($poi_id){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['poi_id'=>$poi_id],'json');
    }

}