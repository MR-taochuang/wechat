<?php

namespace wechat\driver\wethird\weapi;

use wechat\driver\Driver;
use wechat\driver\wethird\Api;

/**
 * Class Init
 * @package wechat\driver\wethird\weapi
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 21:01
 * 第三方平台代理小程序基础类库
 */
class Init extends Driver{

    /**
     * @param $options
     * @return mixed
     * 创建小程序
     */
    public function CreateWeapi($options){
        return self::callback(Api::component_access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * @param $options
     * @return mixed
     * 查询创建任务状态
     */
    public function ShowCreateState($options){
        return self::callback(Api::component_access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * @param $access_token /代理获取的token
     * @param $options
     * @return mixed
     * 设置小程序服务器域名
     */
    public function SetDomain($access_token,$options){
        return self::callback(['access_token'=>$access_token])->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * @param $access_token /代理获取的token
     * @param $options
     * @return mixed
     * 设置小程序业务域名
     */
    public function SetBusinessDomain($access_token,$options){
        return self::callback(['access_token'=>$access_token])->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * @param $access_token /代理获取的token
     * @return mixed
     * 获取小程序基础信息
     */
    public function WeapiInfo($access_token){
        return self::callback(['access_token'=>$access_token])->instance(__NAMESPACE__,__FUNCTION__)->_get();
    }

    /**
     * @param $access_token /代理获取的token
     * @param $options
     * @return mixed
     * 设置小程序名称
     */
    public function SetNickname($access_token,$options){
        return self::callback(['access_token'=>$access_token])->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * @param $access_token /代理获取的token
     * @param $audit_id /审核单id
     * @return mixed
     * 小程序改名审核状态查询
     */
    public function UpdateNameState($access_token,$audit_id){
        return self::callback(['access_token'=>$access_token])->instance(__NAMESPACE__,__FUNCTION__)->_post(['audit_id'=>$audit_id],'json');
    }

    /**
     * @param $access_token /代理获取的token
     * @param $nick_name
     * @return mixed
     * 微信认证名称检测
     */
    public function CheckName($access_token,$nick_name){
        return self::callback(['access_token'=>$access_token])->instance(__NAMESPACE__,__FUNCTION__)->_post(['nick_name'=>$nick_name],'json');
    }

    /**
     * @param $access_token /代理获取的token
     * @param $options
     * @return mixed
     * 修改头像
     */
    public function UpdateHeadimage($access_token,$options){
        return self::callback(['access_token'=>$access_token])->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * @param $access_token /代理获取的token
     * @param $signature /功能介绍（简介）
     * @return mixed
     * 修改功能介绍
     */
    public function UpdaeFunc($access_token,$signature){
        return self::callback(['access_token'=>$access_token])->instance(__NAMESPACE__,__FUNCTION__)->_post(['signature'=>$signature],'json');
    }
}