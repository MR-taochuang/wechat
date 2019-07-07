<?php

namespace wechat\driver\wepublic;

use wechat\driver\Driver;

/**
 * Class Wifi
 * @package wechat\driver\wepublic
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 21:36
 * 微信Wifi接口
 */
class Wifi extends Driver{
    /***
     * @param $callback_url
     * @return array
     * 第三方平台获取开插件wifi_token
     */
    public function OpenPlugin($callback_url){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['callback_url'=>$callback_url],'json');
    }

    /***
     * @param $options
     * @return array
     * 连Wi-Fi完成页跳转小程序
     */
    public function FinishPageSet($options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options,'json');
    }

    /***
     * @param $options
     * @return array
     * 设置顶部banner跳转小程序接口
     */
    public function HomePageSet($options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options,'json');
    }

    /***
     * @param $shop_id
     * @return array
     * 查询门店WiFi信息接口
     */
    public function ShopGet($shop_id){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['shop_id'=>$shop_id],'json');
    }

    /***
     * @param null $pageindex
     * @param null $pagesize
     * @return array
     * 获取WiFi门店列表
     */
    public function ShopList($pageindex=null,$pagesize=null){
        $data = array();
        if(!empty($pageindex)) $data['pageindex']=$pageindex;
        if(!empty($pagesize)) $data['pagesize']=$pagesize;
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($data,'json');
    }

    /***
     * @param $shop_id
     * @param $old_ssid
     * @param $ssid
     * @param null $password
     * @return array
     * 修改门店网络信息
     */
    public function ShopUpdate($shop_id,$old_ssid,$ssid,$password=null){
        $data=['shop_id'=>$shop_id,'old_ssid'=>$old_ssid,'ssid'=>$ssid];
        if(!empty($password)) $data['password']=$password;
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($data,'json');
    }

    /**
     * @param $shop_id
     * @param null $ssid
     * @return array
     * 清空门店网络及设备
     */
    public function ShopClean($shop_id,$ssid=null){
        $data=['shop_id'=>$shop_id,'ssid'=>$ssid];
        if(!empty($ssid)) $data['ssid']=$ssid;
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($data,'json');
    }

    /***
     * @param $shop_id
     * @param $ssid
     * @param $password
     * @return array
     * 添加密码型设备
     */
    public function DeviceAdd($shop_id,$ssid,$password){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['shop_id'=>$shop_id,'ssid'=>$ssid,'password'=>$password],'json');
    }

    /***
     * @param $shop_id
     * @param $ssid
     * @param null $reset
     * @return array
     * 添加portal型设备
     */
    public function ApportalRegister($shop_id,$ssid,$reset=null){
        $data=['shop_id'=>$shop_id,'ssid'=>$ssid];
        if(!empty($reest)) $data['reset']=$reset;
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($data,'json');
    }

    /***
     * @param null $pageindex
     * @param null $pagesize
     * @param null $shop_id
     * @return array
     * 查询设备
     */
    public function BizwwifiDeviceList($pageindex=null,$pagesize=null,$shop_id=null){
        $data=array();
        if(!empty($pageindex)) $data['pageindex']=$pageindex;
        if(!empty($pagesize)) $data['pagesize']=$pagesize;
        if(!empty($shop_id)) $data['shop_id']=$shop_id;
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($data,'json');
    }

    /***
     * @param $bssid
     * @return array
     * 删除设备
     */
    public function DeviceDelete($bssid){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['bssid'=>$bssid],'json');
    }

    /***
     * @param $shop_id
     * @param $ssid
     * @param $img_id
     * @return array
     * 获取物料二维码
     */
    public function QrcodeGet($shop_id,$ssid,$img_id){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['shop_id'=>$shop_id,'ssid'=>$ssid,'img_id'=>$img_id],'json');
    }

    /***
     * @param $shop_id
     * @return array
     * 查询商家主页
     */
    public function HomepageGet($shop_id){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['shop_id'=>$shop_id],'json');
    }

    /***
     * @param $shop_id
     * @param $bar_type
     * @return array
     * 设置微信首页欢迎语
     */
    public function BarSet($shop_id,$bar_type){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['shop_id'=>$shop_id,'bar_type'=>$bar_type],'json');
    }

    /***
     * @param $begin_date
     * @param $end_date
     * @param $shop_id
     * @return array
     * Wi-Fi数据统计
     */
    public function StatisticsList($begin_date,$end_date,$shop_id){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['begin_date'=>$begin_date,'end_date'=>$end_date,'shop_id'=>$shop_id],'json');
    }

    /***
     * @param $shop_id
     * @param $card_id
     * @param $card_describe
     * @param $start_time
     * @param $end_time
     * @return array
     * 设置门店卡券投放信息
     */
    public function CouponputSet($shop_id,$card_id,$card_describe,$start_time,$end_time){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['shop_id'=>$shop_id,'card_id'=>$card_id,'card_describe'=>$card_describe,'start_time'=>$start_time,'end_time'=>$end_time],'json');
    }

    /***
     * @param $shop_id
     * @return array
     *查询门店卡券投放信息
     */
    public function CouponputGet($shop_id){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['shop_id'=>$shop_id],'json');
    }

}