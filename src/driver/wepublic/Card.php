<?php

namespace wechat\driver\wepublic;

use wechat\driver\Driver;

/**
 * Class Card
 * @package wechat\driver\wepublic
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 15:17
 * 卡券管理
 */
class Card extends Driver
{

    /**
     * @param array $options
     * @return array
     * 创建卡券
     */
    public function CardCreate(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * @param $card_id /卡券id
     * @param bool $is_open /是否开启买单功能，填true/false
     * @return array
     * 设置买单接口
     */
    public function PaycellSet($card_id, $is_open = true)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['card_id' => $card_id, 'is_open' => $is_open],'json');
    }

    /**
     * @param $card_id /卡券id
     * @param bool $is_open /是否开启买单功能，填true/false
     * @return array
     * 设置自助核销接口
     */
    public function SetSelfconsumecell($card_id, $is_open = true)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['card_id' => $card_id, 'is_open' => $is_open],'json');
    }

    /**
     * @param array $options
     * @return array
     * 创建二维码接口
     */
    public function CardQrcodeCreate(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * @param array $options
     * @return array
     * 创建货架接口
     */
    public function CreateLandingpage(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /**
     * @param $card_id /cardid
     * @param array $code
     * @return array
     * 导入code接口
     */
    public function CodeDeposit($card_id, array $code)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['card_id' => $card_id, 'code' => $code],'json');
    }

    /**
     * @param $card_id
     * @return array
     * 查询导入code数目接口
     */
    public function CodeGetdepositcount($card_id)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['card_id' => $card_id],'json');
    }

    /**
     * @param $card_id
     * @param array $code
     * @return array
     * 核查code
     */
    public function CodeCheck($card_id, array $code)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['card_id' => $card_id, 'code' => $code],'json');
    }

    /**
     * @param $card_id
     * @return array
     *  图文消息群发卡券
     */
    public function MpnewsGethtml($card_id)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['card_id' => $card_id],'json');
    }

    /**
     * @param array $openid 测试的openid列表
     * @param array $username 测试的微信号列表
     * @return array
     * 设置测试白名单
     */
    public function TestwhitelistSet(array $openid = [], array $username = [])
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['openid' => $openid, 'username' => $username],'json');
    }

    /**
     * @param $code /单张卡券的唯一标准
     * @param string $card_id /卡券ID代表一类卡券 自定义code卡券必填
     * @param bool $check_consume /    是否校验code核销状态，填入true和false时的code异常状态返回数据不同
     * @return array
     * 线下核销 查询Code接口
     */
    public function CodeGet($code, $card_id = null, $check_consume = true)
    {
        $data = ['code' => $code, 'check_consume' => $check_consume];
        if (!empty($card_id)) $data['cart_id'] = $card_id;
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($data,'json');
    }

    /**
     * @param $card_id /卡券ID。创建卡券时use_custom_code填写true时必填。非自定义Code不必填写。
     * @param $code /需核销的Code码
     * @return array
     * 线下核销 核销Code接口
     */
    public function CodeConsume($code, $card_id = null)
    {
        $data = ['code' => $code];
        if (!empty($card_id)) $data['card_id'] = $card_id;
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($data,'json');
    }

    /**
     * @param $encrypt_code /经过加密的Code码
     * @return array
     * Code解码接口
     */
    public function CodeDecrypt($encrypt_code)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['encrypt_code' => $encrypt_code],'json');
    }

    /**
     * @param $openid /需要查询的用户openid
     * @param string $card_id /    卡券ID。不填写时默认查询当前appid下的卡券
     * @return array
     * 获取用户已领取卡券接口
     */
    public function CardUserGetcardlist($openid, $card_id = '')
    {
        $data = ['openid' => $openid];
        if (!empty($card_id)) $data['card_id'] = $card_id;
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($data,'json');
    }

    /**
     * @param $card_id /卡券ID
     * @return array
     * 查看卡券详情
     */
    public function CardDetails($card_id)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['card_id' => $card_id],'json');
    }

    /**
     * @param $offset /查询卡列表的起始偏移量，从0开始，即offset: 5是指从从列表里的第六个开始读取。
     * @param int $count /需要查询的卡片的数量（数量最大50）。
     * @param array $status_list /支持开发者拉出指定状态的卡券列表 “CARD_STATUS_NOT_VERIFY”, 待审核 ； “CARD_STATUS_VERIFY_FAIL”, 审核失败； “CARD_STATUS_VERIFY_OK”， 通过审核； “CARD_STATUS_DELETE”， 卡券被商户删除； “CARD_STATUS_DISPATCH”， 在公众平台投放过的卡券；
     * @return array
     * 批量查询卡券列表
     */
    public function CardBatchget($offset, $count = 50, array $status_list = [])
    {
        $data = ['offset' => $offset, 'count' => $count];
        if (!empty($status_list)) $data['status_list'] = $status_list;
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($data,'json');
    }

    /**
     * @param $card_id
     * @param array $member_card
     * @return array
     * 更改卡券信息接口
     */
    public function CardUpdate($card_id, array $member_card)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['card_id' => $card_id, 'member_card' => $member_card],'json');
    }

    /**
     * @param $card_id
     * @param null $increase_stock_value
     * @param null $reduce_stock_value
     * @return array
     * 修改库存接口
     */
    public function CardModifyStock($card_id, $increase_stock_value = null, $reduce_stock_value = null)
    {
        $data = ['card_id' => $card_id];
        if (!empty($increase_stock_value)) $data['increase_stock_value'] = $increase_stock_value;
        if (!empty($reduce_stock_value)) $data['reduce_stock_value'] = $reduce_stock_value;
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($data,'json');
    }

    /**
     * @param $code
     * @param $new_code
     * @param null $card_id
     * @return array
     * 更改Code接口
     */
    public function CodeUpdate($code, $new_code, $card_id = null)
    {
        $data = ['code' => $code, 'new_code' => $new_code];
        if (!empty($card_id)) $data['card_id'] = $card_id;
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($data,'json');
    }

    /***
     * @param $card_id
     * @return array
     * 删除卡券接口
     */
    public function CardDelete($card_id)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['card_id' => $card_id],'json');
    }

    /***
     * @param $card_id
     * @param $code
     * @param $reason
     * @return array
     * 设置卡券失效接口
     */
    public function CardUnavailable($card_id, $code, $reason = null)
    {
        $data = ['card_id' => $card_id, 'code' => $code];
        if (!empty($reason)) $data['reason'] = $reason;
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($data,'json');
    }

    /***
     * @param $begin_date
     * @param $end_date
     * @param $cond_source
     * @return array
     * 拉取卡券概况数据接口
     */
    public function GetCardBizuininfo($begin_date, $end_date, $cond_source)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['begin_date' => $begin_date, 'end_date' => $end_date, 'cond_source' => $cond_source],'json');
    }

    /***
     * @param $begin_date
     * @param $end_date
     * @param $cond_source
     * @param $card_id
     * @return array
     * 获取免费券数据接口
     */
    public function GetCardCardinfo($begin_date, $end_date, $cond_source, $card_id = null)
    {
        $data = ['begin_date' => $begin_date, 'end_date' => $end_date, 'cond_source' => $cond_source];
        if (!empty($card_id)) $data['card_id'] = $card_id;
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($data,'json');
    }

    /***
     * @param $begin_date
     * @param $end_date
     * @param $cond_source
     * @return array
     * 拉取会员卡概况数据接口
     */
    public function GetCardMemberCardinfo($begin_date, $end_date, $cond_source)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['begin_date' => $begin_date, 'end_date' => $end_date, 'cond_source' => $cond_source],'json');
    }

    /***
     * @param $begin_date
     * @param $end_date
     * @param $card_id
     * @return array
     * 拉取单张会员卡数据接口
     */
    public function GetCardMemberCardDetails($begin_date, $end_date, $card_id)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['begin_date' => $begin_date, 'end_date' => $end_date, 'card_id' => $card_id],'json');
    }

    /***
     * @param $card_id
     * @param $outer_str
     * @return array
     * 创建卡公众号的token
     */
    public function CardGeturl($card_id, $outer_str = null)
    {
        $data = ['card_id' => $card_id];
        if (!empty($outer_str)) $data['outer_str'] = $outer_str;
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($data,'json');
    }

    /***
     * @param $activate_ticket
     * @return array
     * 获取用户开卡时提交的信息（跳转型开卡组件）
     */
    public function CardSubmitInfoJump($activate_ticket)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post(['activate_ticket' => $activate_ticket],'json');
    }

    /***
     * @param $code
     * @param null $card_id
     * @return array
     * 获取用户开卡时提交的信息（非跳转型开卡组件）
     */
    public function CardSubmitInfo($code, $card_id = null)
    {
        $data = ['code' => $code];
        if (!empty($card_id)) $data['card_id'] = $card_id;
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($data,'json');
    }

    /***
     * @param array $options
     * @return array
     * 激活用户领取的会员卡（跳转型开卡组件）
     */
    public function CardActivate(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /***
     * @param array $options
     * @return array
     * 创建子商户接口
     */
    public function SubmerChantCreate(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /***
     * @return array
     * 卡券开放类目查询接口
     */
    public function GetApplyProtocol()
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_get();
    }

    /***
     * @param array $options
     * @return array
     *更新子商户接口
     */
    public function SubmerChantUpdate(array $options)
    {

        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');

    }

    /***
     * @param array $options
     * @return array
     * 拉取单个子商户信息接口
     */
    public function GetSubmerChant(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /***
     * @param array $options
     * @return array
     * 批量拉取子商户信息接口
     */
    public function BatchGetSubmerChant(array $options)
    {

        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /***
     * @param array $options
     * @return array
     * 母商户资质申请接口
     */
    public function UploadCardAgent(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /***
     * @return array
     * 母商户资质审核查询接口
     */
    public function CheckCardAgent()
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_get();
    }

    /***
     * @param array $options
     * @return array
     * 子商户资质申请接口
     */
    public function UploadCardMerchant(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /***
     * @param array $options
     * @return array
     * 子商户资质审核查询接口
     */
    public function CheckCardMerchant(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /***
     * @param array $options
     * @return array
     * 拉取单个子商户信息接口
     */
    public function GetCardMerchant(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /***
     * @param array $options
     * @return array
     * 拉取子商户列表接口
     */
    public function BatchgetCardMerchant(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /***
     * @param array $options
     * @return array
     * 第三方强授权相关接口
     */
    public function ApiQueryAuth(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /***
     * @param array $options
     * @return array
     * 确认授权
     */
    public function ApiConfirm(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

    /***
     * @param array $options
     * @return array
     * 获取授权方的账户信息
     */
    public function ApiGetAuthorizer(array $options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__,__FUNCTION__)->_post($options,'json');
    }

}