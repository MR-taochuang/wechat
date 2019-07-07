<?php

namespace wechat\driver\weapi;

use wechat\driver\Driver;

/**
 * Class Plugin
 * @package wechat\driver\weapi
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 6:54
 * 小程序插件管理
 */
class Plugin extends Driver{

    /**
     * 向插件开发者发起使用插件的申请
     * @param $action /此接口下填写 "apply"
     * @param $plugin_appid /插件 appId
     * @param null $reason /申请使用理由
     * @return array
     */
    public function ApplyPlugin($action,$plugin_appid,$reason=null){
        $data=['action'=>$action,'plugin_appid'=>$plugin_appid];
        if(!empty($reason)) $data['reason']=$reason;
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($data,'json');
    }

    /**
     * 获取当前所有插件使用方（供插件开发者调用）
     * @param $action /此接口下填写 "dev_apply_list"
     * @param $page /要拉取第几页的数据
     * @param $num /每页的记录数
     * @return array
     */
    public function GetPlugin($action,$page,$num){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['action'=>$action,'page'=>$page,'num'=>$num],'json');
    }

    /**
     * 查询已添加的插件
     * @param $action /此接口下填写 "list"
     * @return array
     */
    public function PluginList($action){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['action'=>$action],'json');
    }

    /**
     * 修改插件使用申请的状态（供插件开发者调用）
     * @param $action /修改操作
     * @param null $appid /使用者的 appid。同意申请时填写。
     * @param null $reason /拒绝理由。拒绝申请时填写。
     * @return array
     */
    public function PluginApplyStatus($action,$appid=null,$reason=null){
        $data=['action'=>$action];
        if(!empty($appid)) $data['appid']=$appid;
        if(!empty($reason)) $data['reason']=$reason;
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($data,'json');
    }

    /**
     * 删除已添加的插件
     * @param $action /此接口下填写 "unbind"
     * @param $plugin_appid /插件 appId
     * @return array
     */
    public function UnbindPlugin($action,$plugin_appid){
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['action'=>$action,'plugin_appid'=>$plugin_appid],'json');
    }
}