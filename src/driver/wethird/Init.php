<?php

namespace wechat\driver\wethird;

use wechat\driver\Driver;

/**
 * Class Init
 * @package wechat\driver\wethird
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 12:04
 * 微信开放平台代理第三方基础类库
 */
class Init extends Driver
{

    /**
     * @return mixed
     * 获取第三方平台component_access_token
     */
    public function ComponentAccessToken()
    {
        $component_access_token = \rely\Init::cache()->get('ComponentAccessToken');
        if (!empty($component_access_token)) return $component_access_token;
        $options = ['component_appid' => self::get('component_appid'), 'component_appsecret' => self::get('component_appsecret'), 'component_verify_ticket' => \rely\Init::cache()->get('component_verify_ticket')];
        $res = self::instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
        if (!empty($res['expires_in'])) \rely\Init::cache()->set('AccessToken', $res, 7000);
        return $res;
    }

    /**
     * @return mixed
     * 获取预授权码pre_auth_code
     */
    public function PreAuthCode(){
        return self::callback(self::ComponentAccessToken())->instance(__NAMESPACE__, __FUNCTION__)->_post(['component_appid' => self::get('component_appid')], 'json');
    }

    /**
     * @param $pre_auth_code /预授权码
     * @param $redirect_uri /回调url
     * @param null $auth_type
     * @param null $biz_appid
     * @return string
     * 获取授权码
     */
    public function GetAuthorizationCode($pre_auth_code,$redirect_uri,$auth_type=null,$biz_appid=null){
        $driver=self::callback(['pre_auth_code'=>$pre_auth_code,'redirect_uri'=>$redirect_uri]);
        $url=$driver::$url;
        if(!is_null($auth_type)) $url=$url.'&auth_type='.$auth_type;
        if(!is_null($biz_appid)) $url=$url.'&biz_appid='.$biz_appid;
        return $url.'#wechat_redirect';
    }

    /**
     * @param $authorization_code /授权码
     * @return mixed
     * 获取商户信息
     */
    public function GetInfo($authorization_code){
        return self::callback(self::ComponentAccessToken())->instance(__NAMESPACE__, __FUNCTION__)->_post(['authorization_code'=>$authorization_code,'component_appid' => self::get('component_appid')],'json');
    }

    /**
     * @param $authorizer_appid /商户appid
     * @param $authorizer_refresh_token /商户刷新token
     * @return mixed
     * 刷新token
     */
    public function AuthorizerRefreshToken($authorizer_appid,$authorizer_refresh_token){
        return self::callback(self::ComponentAccessToken())->instance(__NAMESPACE__, __FUNCTION__)->_post(['authorizer_appid'=>$authorizer_appid,'authorizer_refresh_token'=>$authorizer_refresh_token,'component_appid' => self::get('component_appid')],'json');
    }

    /**
     * @param $authorizer_appid /商户id
     * @return mixed
     * 获取商户详细信息
     */
    public function GetInfoDetails($authorizer_appid){
        return self::callback(self::ComponentAccessToken())->instance(__NAMESPACE__, __FUNCTION__)->_post(['authorizer_appid'=>$authorizer_appid,'component_appid' => self::get('component_appid')],'json');
    }

    /**
     * @param $authorizer_appid /商户id
     * @param $option_name /选项名称
     * @return mixed
     * 获取授权方的选项设置信息
     */
    public function GetOptions($authorizer_appid,$option_name){
        return self::callback(self::ComponentAccessToken())->instance(__NAMESPACE__, __FUNCTION__)->_post(['authorizer_appid'=>$authorizer_appid,'component_appid' => self::get('component_appid'),'option_name'=>$option_name],'json');
    }

    /**
     * @param $authorizer_appid /商户id
     * @param $option_name /选项名称
     * @param $option_value /选项值
     * @return mixed
     * 设置授权方的选项信息
     */
    public function SetOptions($authorizer_appid,$option_name,$option_value){
        return self::callback(self::ComponentAccessToken())->instance(__NAMESPACE__, __FUNCTION__)->_post(['authorizer_appid'=>$authorizer_appid,'component_appid' => self::get('component_appid'),'option_name'=>$option_name,'option_value'=>$option_value],'json');
    }

    /**
     * @param $offset /偏移位置/起始位置
     * @param $count /拉取数量，最大为500
     * @return mixed
     * 获取所有授权商家
     */
    public function GetAuthorizerList($offset,$count){
        return self::callback(self::ComponentAccessToken())->instance(__NAMESPACE__, __FUNCTION__)->_post(['component_appid' => self::get('component_appid'),'offset'=>$offset,'count'=>$count],'json');
    }

    /**
     * @return mixed
     *第三方平台对其所有API调用次数清零
     */
    public function QuotaClearAll(){
        return self::callback(self::ComponentAccessToken())->instance(__NAMESPACE__, __FUNCTION__)->_post(['component_appid' => self::get('component_appid')],'json');
    }
}