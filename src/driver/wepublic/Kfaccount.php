<?php

namespace wechat\driver\wepublic;

use wechat\driver\Driver;

/**
 * Class Kfaccount
 * @package wechat\driver\wepublic
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 15:48
 * 客服管理
 */
class Kfaccount extends Driver{

    /**
     * @param array $options
     * @return array
     * @throws \Exception
     * 创建客服账号
     */
    public function CreateKfaccount(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param array $options
     * @return array
     * @throws \Exception
     * 修改客服账号
     */
    public function UpdateKfaccount(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @return array
     * @throws \Exception
     * 删除客服账号
     */
    public function DeleteKfaccount(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /**
     * @param $kfaccount
     * @param $img //图片的绝对路径 jpg格式
     * @return array
     * @throws \Exception
     * 上传客服头像
     */
    public function UploadHeadimgKfaccount($kfaccount,$file){
        return self::callback(Api::access_token(),['kfaccount'=>$kfaccount])->instance(__NAMESPACE__, __FUNCTION__)->_file($file);
    }

    /**
     * @return array
     * @throws \Exception
     * 获取所有客服账号
     */
    public function GetKflist(){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @return array
     * 客服在线状态以及正在接待的会话数
     */
    public function GetOnlineKflist(){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @param $kf_account /绑定的账号
     * @param $invite_wx /要绑定的微信
     * @return array
     * 邀请绑定客服帐号
     */
    public function KfaccountInviteworker($kf_account,$invite_wx){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['kf_account'=>$kf_account,'invite_wx'=>$invite_wx],'json');
    }

    /**
     * @param $kf_account /客服账号
     * @return array
     * GET方式删除客服账号
     */
    public function DeleteKfaccountGet($kf_account){
        return self::callback(Api::access_token(),['kf_account'=>$kf_account])->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @param $kf_account /客服账号
     * @param $openid /用户openid
     * @return array
     * 会话控制 创建一个会话
     */
    public function CreateKfsession($kf_account,$openid){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['kf_account'=>$kf_account,'openid'=>$openid],'json');
    }
    /**
     * @param $kf_account /客服账号
     * @param $openid /用户openid
     * @return array
     * 会话控制 关闭会话
     */
    public function CloseKfsession($kf_account,$openid){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['kf_account'=>$kf_account,'openid'=>$openid],'json');
    }

    /**
     * @param $openid /用户openid
     * @return array
     * 获取会话状态
     */
    public function KfGetSession($openid){
        return self::callback(Api::access_token(),['openid'=>$openid])->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @param $kf_account /客服账号
     * @return array
     * 获取客服会话列表
     */
    public function KfGetSessionlist($kf_account){
        return self::callback(Api::access_token(),['kf_account'=>$kf_account])->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @return array
     * 获取未接入会话列表
     */
    public function KfsessionGetWaitcase(){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_get();
    }

    /**
     * @param array $options
     * @return array
     * 获取聊天记录
     */
    public function GetMsglist(array $options){
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }
}