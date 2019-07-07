<?php

namespace wechat\driver\wepublic;

use rely\Init;
use rely\init\Config;

/**
 * Class Api
 * @package wechat\driver\wechat
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 11:35
 * 微信公众号地址 类库加载
 *
 * @method \wechat\driver\wepublic\Init init($config = [])  初始管理
 * @method \wechat\driver\wepublic\Card card($config = []) 卡券管理
 * @method \wechat\driver\wepublic\Custom custom($config=[]) 客服消息
 * @method \wechat\driver\wepublic\Invoice invoice($config=[]) 发票管理
 * @method \wechat\driver\wepublic\Kfaccount kfaccount($config=[]) 客服管理
 * @method \wechat\driver\wepublic\Media media($config=[]) 微信素材管理
 * @method \wechat\driver\wepublic\Menu menu($config=[]) 微信菜单管理
 * @method \wechat\driver\wepublic\Qrcode qrcode($config=[]) 二维码管理
 * @method \wechat\driver\wepublic\Richscan richscan($config=[]) 微信扫一扫管理
 * @method \wechat\driver\wepublic\Shake shake($config=[]) 微信摇一摇
 * @method \wechat\driver\wepublic\Smart smart($config=[]) 微信智能接口
 * @method \wechat\driver\wepublic\Summary summary($config=[]) 微信数据统计
 * @method \wechat\driver\wepublic\Template tempalte($config=[]) 微信模板消息
 * @method \wechat\driver\wepublic\User user($config=[]) 微信用户管理
 * @method \wechat\driver\wepublic\Weshop weshop($config=[]) 微信小店管理
 * @method \wechat\driver\wepublic\Wifi wifi($config=[]) 微信wifi管理
 * @method \wechat\driver\wepublic\ThingYard thing_yard($config=[]) 微信一物一码
 */
class Api extends Config
{
    const API = [
        //获取微信access_token 请求方式 GET
        'AccessToken' => 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET',
        //获取微信服务器Ip 请求方式 GET
        'GetWechatIp' => 'https://api.weixin.qq.com/cgi-bin/getcallbackip?access_token=ACCESS_TOKEN',
        //检测网络 请求方式 POST
        'WebCheck' => 'https://api.weixin.qq.com/cgi-bin/callback/check?access_token=ACCESS_TOKEN',
        //创建微信菜单 请求方式 POST
        'CreateMenu' => 'https://api.weixin.qq.com/cgi-bin/menu/create?access_token=ACCESS_TOKEN',
        //获取微信菜单 请求方式 GET
        'GetMenu' => 'https://api.weixin.qq.com/cgi-bin/menu/get?access_token=ACCESS_TOKEN',
        //删除微信菜单 请求方式 GET
        'DeleteMenu' => 'https://api.weixin.qq.com/cgi-bin/menu/delete?access_token=ACCESS_TOKEN',
        //创建个性化菜单 请求方式 POST
        'CreateConditionalMenu' => 'https://api.weixin.qq.com/cgi-bin/menu/addconditional?access_token=ACCESS_TOKEN',
        //删除个性化菜单 请求方式 POST
        'DeleteConditionalMenu' => 'https://api.weixin.qq.com/cgi-bin/menu/delconditional?access_token=ACCESS_TOKEN',
        //测试个性化菜单匹配结果 请求方式 POST
        'TryMatch' => 'https://api.weixin.qq.com/cgi-bin/menu/trymatch?access_token=ACCESS_TOKEN',
        //获取自定义菜单配置接口 请求方式 GET
        'GetCurrentSelfmenuInfo' => 'https://api.weixin.qq.com/cgi-bin/get_current_selfmenu_info?access_token=ACCESS_TOKEN',
        //添加客服账号 请求方式 POST
        'CreateKfaccount' => 'https://api.weixin.qq.com/customservice/kfaccount/add?access_token=ACCESS_TOKEN',
        //邀请绑定客服帐号
        'KfaccountInviteworker' => 'https://api.weixin.qq.com/customservice/kfaccount/inviteworker?access_token=ACCESS_TOKEN',
        //修改客服账号 请求方式 POST
        'UpdateKfaccount' => 'https://api.weixin.qq.com/customservice/kfaccount/update?access_token=ACCESS_TOKEN',
        //删除客服账号 请求方式 POST
        'DeleteKfaccount' => 'https://api.weixin.qq.com/customservice/kfaccount/del?access_token=ACCESS_TOKEN',
        //GET方式删除客服账号 请求方式 GET
        'DeleteKfaccountGet' => 'https://api.weixin.qq.com/customservice/kfaccount/del?access_token=ACCESS_TOKEN&kf_account=KFACCOUNT',
        //设置客服帐号的头像 请求方式 FORM/POST
        'UploadHeadimgKfaccount' => 'https://api.weixin.qq.com/customservice/kfaccount/uploadheadimg?access_token=ACCESS_TOKEN&kf_account=KFACCOUNT',
        //获取所有客服账号 请求方式 GET
        'GetKflist' => 'https://api.weixin.qq.com/cgi-bin/customservice/getkflist?access_token=ACCESS_TOKEN',
        //客服在线状态 以及客服接待会话数 请求方式 GET
        'GetOnlineKflist' => 'https://api.weixin.qq.com/cgi-bin/customservice/getonlinekflist?access_token=ACCESS_TOKEN',
        //客服接口-发消息 请求方式 POST
        'CustomSend' => 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=ACCESS_TOKEN',
        //客服输入状态 请求方式 POST
        'CustomTyping' => 'https://api.weixin.qq.com/cgi-bin/message/custom/typing?access_token=ACCESS_TOKEN',
        //创建会话 请求方式 POST
        'CreateKfsession' => 'https://api.weixin.qq.com/customservice/kfsession/create?access_token=ACCESS_TOKEN',
        //关闭会话 请求方式 POST
        'CloseKfsession' => 'https: //api.weixin.qq.com/customservice/kfsession/close?access_token=ACCESS_TOKEN',
        //获取客服会话状态 请求方式 GET
        'KfGetSession' => 'https://api.weixin.qq.com/customservice/kfsession/getsession?access_token=ACCESS_TOKEN&openid=OPENID',
        //获取客服会话列表 请求方式 GET
        'KfGetSessionlist' => 'https://api.weixin.qq.com/customservice/kfsession/getsessionlist?access_token=ACCESS_TOKEN&kf_account=KFACCOUNT',
        //获取客服未接入会话列表 请求方式 GET
        'KfsessionGetWaitcase' => 'https://api.weixin.qq.com/customservice/kfsession/getwaitcase?access_token=ACCESS_TOKEN',
        //获取聊天记录 请求方式 POST
        'GetMsglist' => 'https://api.weixin.qq.com/customservice/msgrecord/ getmsglist ?access_token=ACCESS_TOKEN',
        //上传图文消息内的图片获取URL【订阅号与服务号认证后均可用】 请求方式 POST
        //请注意，本接口所上传的图片不占用公众号的素材库中图片数量的5000个的限制。图片仅支持jpg/png格式，大小必须在1MB以下。
        'MediaUploadimg' => 'https://api.weixin.qq.com/cgi-bin/media/uploadimg?access_token=ACCESS_TOKEN',
        //上传图文消息素材【订阅号与服务号认证后均可用】 请求方式 POST
        'MediaUploadNews' => 'https://api.weixin.qq.com/cgi-bin/media/uploadnews?access_token=ACCESS_TOKEN',
        //根据标签进行群发【订阅号与服务号认证后均可用】 请求方式 POST
        'MassSendAll' => 'https://api.weixin.qq.com/cgi-bin/message/mass/sendall?access_token=ACCESS_TOKEN',
        //根据OpenID列表群发【订阅号不可用，服务号认证后可用】 请求方式 POST
        'MassSend' => 'https://api.weixin.qq.com/cgi-bin/message/mass/send?access_token=ACCESS_TOKEN',
        //删除群发【订阅号与服务号认证后均可用】 请求方式 POST
        'MassDelete' => 'https://api.weixin.qq.com/cgi-bin/message/mass/delete?access_token=ACCESS_TOKEN',
        //预览接口【订阅号与服务号认证后均可用】 请求方式 POST
        'MassPreview' => 'https://api.weixin.qq.com/cgi-bin/message/mass/preview?access_token=ACCESS_TOKEN',
        //查询群发消息发送状态【订阅号与服务号认证后均可用】 请求方式 POST
        'MassGet' => 'https://api.weixin.qq.com/cgi-bin/message/mass/get?access_token=ACCESS_TOKEN',
        //控制群发速度-获取群发速度 请求方式 POST
        'MassSpeedGet' => 'https://api.weixin.qq.com/cgi-bin/message/mass/speed/get?access_token=ACCESS_TOKEN',
        //控制群发速度-设置群发速度 请求方式 POST
        'MassSpeedSet' => 'https://api.weixin.qq.com/cgi-bin/message/mass/speed/set?access_token=ACCESS_TOKEN',
        //设置所属行业 请求方式 POST
        'TemplateSetIndustry' => 'https://api.weixin.qq.com/cgi-bin/template/api_set_industry?access_token=ACCESS_TOKEN',
        //获取设置的行业信息 请求方式 GET
        'TemplateGetIndustry' => 'https://api.weixin.qq.com/cgi-bin/template/get_industry?access_token=ACCESS_TOKEN',
        //获取模板ID 请求方式 POST
        'TemplateId' => 'https://api.weixin.qq.com/cgi-bin/template/api_add_template?access_token=ACCESS_TOKEN',
        //获取模板列表 请求方式 GET
        'TemplateList' => 'https://api.weixin.qq.com/cgi-bin/template/get_all_private_template?access_token=ACCESS_TOKEN',
        //删除模板 请求方式 POST
        'TemplateDelete' => 'https://api.weixin.qq.com/cgi-bin/template/del_private_template?access_token=ACCESS_TOKEN',
        //发送模板消息 请求方式 POST
        'TemplateSend' => 'https://api.weixin.qq.com/cgi-bin/message/template/send?access_token=ACCESS_TOKEN',
        //获取公众号的自动回复规则 请求方式 GET
        'GetCurrent' => 'https://api.weixin.qq.com/cgi-bin/get_current_autoreply_info?access_token=ACCESS_TOKEN',
        //新增临时素材 请求方式 FORM/POST
        'MediaUpload' => 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token=ACCESS_TOKEN&type=TYPE',
        //获取临时素材 请求方式 GET
        'MediaGet' => 'https://api.weixin.qq.com/cgi-bin/media/get?access_token=ACCESS_TOKEN&media_id=MEDIA_ID',
        //获取清晰临时素材 请求方式 GET
        'MediaGetJssdk' => 'https://api.weixin.qq.com/cgi-bin/media/get/jssdk?access_token=ACCESS_TOKEN&media_id=MEDIA_ID',
        //新增永久图文素材 评论 请求方式 POST
        'MediaNews' => 'https://api.weixin.qq.com/cgi-bin/material/add_news?access_token=ACCESS_TOKEN',
        //新增其他永久素材 请求方式 FORM/POST
        'MediaOther' => 'https://api.weixin.qq.com/cgi-bin/material/add_material?access_token=ACCESS_TOKEN&type=TYPE',
        //获取永久素材 请求方式 POST
        'MediaGetMaterial' => 'https://api.weixin.qq.com/cgi-bin/material/get_material?access_token=ACCESS_TOKEN',
        //删除永久素材 请求方式 POST
        'MediaDeleteMaterial' => 'https://api.weixin.qq.com/cgi-bin/material/del_material?access_token=ACCESS_TOKEN',
        //修改永久素材 请求方式 POST
        'MediaUpdateMaterial' => 'https://api.weixin.qq.com/cgi-bin/material/update_news?access_token=ACCESS_TOKEN',
        //获取素材总数 请求方式 GET
        'MediaCount' => 'https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=ACCESS_TOKEN',
        //获取素材列表 请求方式 POST
        'MediaList' => 'https://api.weixin.qq.com/cgi-bin/material/batchget_material?access_token=ACCESS_TOKEN',
        //开启文章评论 请求方式 POST
        'MediaOpenComment' => 'https://api.weixin.qq.com/cgi-bin/comment/open?access_token=ACCESS_TOKEN',
        //关闭文章评论 请求方式 POST
        'MediaCloseComment' => 'https://api.weixin.qq.com/cgi-bin/comment/close?access_token=ACCESS_TOKEN',
        //查看指定文章评论数据 请求方式 POST
        'MediaShowComment' => 'https://api.weixin.qq.com/cgi-bin/comment/list?access_token=ACCESS_TOKEN',
        //标记评论精选 请求方式 POST
        'MediaMarkComment' => 'https://api.weixin.qq.com/cgi-bin/comment/markelect?access_token=ACCESS_TOKEN',
        //将评论取消精选 请求方式 POST
        'MediaUnmarkComment' => 'https://api.weixin.qq.com/cgi-bin/comment/unmarkelect?access_token=ACCESS_TOKEN',
        //删除评论 请求方式 POST
        'MediaDeleteComment' => 'https://api.weixin.qq.com/cgi-bin/comment/delete?access_token=ACCESS_TOKEN',
        //回复评论 请求方式 POST
        'MediaReplyComment' => 'https://api.weixin.qq.com/cgi-bin/comment/reply/add?access_token=ACCESS_TOKEN',
        //删除回复 请求方式 POST
        'MediaDeleteReply' => 'https://api.weixin.qq.com/cgi-bin/comment/reply/delete?access_token=ACCESS_TOKEN',
        //微信网页授权-用户同意授权，获取code 请求方式 GET/header
        'UserGetCode' => 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=APPID&redirect_uri=REDIRECT_URI&response_type=code&scope=SCOPE&state=STATE#wechat_redirect',
        //微信网页授权-用户通过code换取网页 token 请求方式 GET
        'UserAccessToken' => 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=APPID&secret=APPSECRET&code=CODE&grant_type=authorization_code',
        //微信网页授权-用户通过refresh_token刷新 access_token 请求方式 GET
        'RefreshToken' => 'https://api.weixin.qq.com/sns/oauth2/refresh_token?appid=APPID&grant_type=refresh_token&refresh_token=REFRESH_TOKENS',
        //拉取用户信息(需scope为 snsapi_userinfo) 请求方式 GET
        'UserInfo' => 'https://api.weixin.qq.com/sns/userinfo?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN',
        //检测 微信授权的 access_token 是否过期
        'CheckAccessToken' => 'https://api.weixin.qq.com/sns/auth?access_token=ACCESS_TOKEN&openid=OPENID',
        //一次性订阅消息 请求方式 GET/header
        'Subscribemsg' => 'https://mp.weixin.qq.com/mp/subscribemsg?action=get_confirm&appid=APPID&scene=SCENE&template_id=TEMPLATE_ID&redirect_url=REDIRECT_URL&reserved=RESERVED#wechat_redirect',
        //通过API推送订阅模板消息给到授权微信用户 请求方式 POST
        'SubscribeTemplate' => 'https://api.weixin.qq.com/cgi-bin/message/template/subscribe?access_token=ACCESS_TOKEN',
        //公众号调用或第三方平台帮公众号调用对公众号的所有api调用（包括第三方帮其调用）次数进行清零 请求方式 POST
        'ClearQuota' => 'https://api.weixin.qq.com/cgi-bin/clear_quota?access_token=ACCESS_TOKEN',
        //用户标签-创建标签 请求方式 POST
        'UserTagsCreate' => 'https://api.weixin.qq.com/cgi-bin/tags/create?access_token=ACCESS_TOKEN',
        //获取公众号已创建的标签 请求方式 GET
        'UserTagsGet' => 'https://api.weixin.qq.com/cgi-bin/tags/get?access_token=ACCESS_TOKEN',
        //编辑标签 请求方式 POST
        'UserTagsUpdate' => 'https://api.weixin.qq.com/cgi-bin/tags/update?access_token=ACCESS_TOKEN',
        //删除标签 请求方式 POST
        'UserTagsDelete' => 'https://api.weixin.qq.com/cgi-bin/tags/delete?access_token=ACCESS_TOKEN',
        //获取标签下粉丝列表 请求方式 POST
        'UserTagsFans' => 'https://api.weixin.qq.com/cgi-bin/user/tag/get?access_token=ACCESS_TOKEN',
        //批量为用户打标签 请求方式 POST
        'UserTagsMembers' => 'https://api.weixin.qq.com/cgi-bin/tags/members/batchtagging?access_token=ACCESS_TOKEN',
        //批量为用户取消标签 请求方式 POST
        'UserTagsUnmembers' => 'https://api.weixin.qq.com/cgi-bin/tags/members/batchuntagging?access_token=ACCESS_TOKEN',
        //获取用户身上的标签列表 请求方式 POST
        'UserTagslist' => 'https://api.weixin.qq.com/cgi-bin/tags/getidlist?access_token=ACCESS_TOKEN',
        //设置用户备注名 请求方式 POST
        'UserSetRemark' => 'https://api.weixin.qq.com/cgi-bin/user/info/updateremark?access_token=ACCESS_TOKEN',
        //获取用户基本信息（包括UnionID机制） 请求方式 GET
        'UserGetInfo' => 'https://api.weixin.qq.com/cgi-bin/user/info?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN',
        //批量获取用户信息 最多一次100条 请求方式 POST
        'UserGetInfos' => 'https://api.weixin.qq.com/cgi-bin/user/info/batchget?access_token=ACCESS_TOKEN',
        //获取用户列表 请求方式 GET
        'UserGetInfolist' => 'https://api.weixin.qq.com/cgi-bin/user/get?access_token=ACCESS_TOKEN&next_openid=NEXT_OPENID',
        //获取公众号黑名单列表 请求方式 GET
        'UserGetBlack' => 'https://api.weixin.qq.com/cgi-bin/tags/members/getblacklist?access_token=ACCESS_TOKEN',
        //拉黑用户 请求方式 POST
        'UserSetBlack' => 'https://api.weixin.qq.com/cgi-bin/tags/members/batchblacklist?access_token=ACCESS_TOKEN',
        //取消拉黑用户 请求方式 POST
        'UserSetUnblack' => 'https://api.weixin.qq.com/cgi-bin/tags/members/batchunblacklist?access_token=ACCESS_TOKEN',
        //创建二维码ticket 请求方式 POST
        'QrcodeCreate' => 'https://api.weixin.qq.com/cgi-bin/qrcode/create?access_token=ACCESS_TOKEN',
        //通过ticket换取二维码 二维码图片
        'Qrcode' => 'https://mp.weixin.qq.com/cgi-bin/showqrcode?ticket=TICKET',
        //长链接转短链接接口 请求方式 POST
        'ShortUrl' => 'https://api.weixin.qq.com/cgi-bin/shorturl?access_token=ACCESS_TOKEN',
        //获取用户增减数据 请求方式 POST
        'GetUserSummary' => 'https://api.weixin.qq.com/datacube/getusersummary?access_token=ACCESS_TOKEN',
        //获取累计用户数据 请求方式 POST
        'GetUserCumulate' => 'https://api.weixin.qq.com/datacube/getusercumulate?access_token=ACCESS_TOKEN',
        //获取图文群发每日数据 请求方式 POST
        'GetArticleSummary' => 'https://api.weixin.qq.com/datacube/getarticlesummary?access_token=ACCESS_TOKEN',
        //获取图文群发总数据 请求方式 POST
        'GetArticleTotal' => 'https://api.weixin.qq.com/datacube/getarticletotal?access_token=ACCESS_TOKEN',
        //获取图文统计数据 请求方式 POST
        'GetUserRead' => 'https://api.weixin.qq.com/datacube/getuserread?access_token=ACCESS_TOKEN',
        //获取图文统计分时数据 请求方式 POST
        'GetUserReadhour' => 'https://api.weixin.qq.com/datacube/getuserreadhour?access_token=ACCESS_TOKEN',
        //获取图文分享转发数据 请求方式 POST
        'GetUserShare' => 'https://api.weixin.qq.com/datacube/getusershare?access_token=ACCESS_TOKEN',
        //获取图文分享转发分时数据 请求方式 POST
        'GetUserSharehour' => 'https://api.weixin.qq.com/datacube/getusershare?access_token=ACCESS_TOKEN',
        //获取消息发送概况数据 请求方式 POST
        'GetUpstreammsg' => 'https://api.weixin.qq.com/datacube/getupstreammsg?access_token=ACCESS_TOKEN',
        //获取消息分送分时数据 请求方式 POST
        'GetUpstreammsghour' => 'https://api.weixin.qq.com/datacube/getupstreammsghour?access_token=ACCESS_TOKEN',
        //获取消息发送周数据 请求方式 POST
        'GetUpstreammsgweek' => 'https://api.weixin.qq.com/datacube/getupstreammsgweek?access_token=ACCESS_TOKEN',
        //获取消息发送月数据 请求方式 POST
        'GetUpstreammsgmonth' => 'https://api.weixin.qq.com/datacube/getupstreammsgmonth?access_token=ACCESS_TOKEN',
        //获取消息发送分布数据 请求方式 POST
        'GetUpstreammsgdist' => 'https://api.weixin.qq.com/datacube/getupstreammsgdist?access_token=ACCESS_TOKEN',
        //获取消息发送分布周数据 请求方式 POST
        'GetUpstreammsgdistweek' => 'https://api.weixin.qq.com/datacube/getupstreammsgdistweek?access_token=ACCESS_TOKEN',
        //获取消息发送分布月数据 请求方式 POST
        'GetUpstreammsgdistmonth' => 'https://api.weixin.qq.com/datacube/getupstreammsgdistmonth?access_token=ACCESS_TOKEN',
        //获取接口分析数据 请求方式 POST
        'GetInterfaceSummary' => 'https://api.weixin.qq.com/datacube/getinterfacesummary?access_token=ACCESS_TOKEN',
        //获取接口分析分时数据 请求方式 POST
        'GetInterfaceSummaryhour' => 'https://api.weixin.qq.com/datacube/getinterfacesummaryhour?access_token=ACCESS_TOKEN',
        //创建卡劵 请求方式 POST
        'CardCreate' => 'https://api.weixin.qq.com/card/create?access_token=ACCESS_TOKEN',
        //设置买单接口 请求方式 POST
        'PaycellSet' => 'https://api.weixin.qq.com/card/paycell/set?access_token=ACCESS_TOKEN',
        //设置自助核销接口 请求方式 POST
        'SetSelfconsumecell' => 'https://api.weixin.qq.com/card/selfconsumecell/set?access_token=ACCESS_TOKEN',
        //卡劵创建二维码接口 请求方式 POST
        'CardQrcodeCreate' => 'https://api.weixin.qq.com/card/qrcode/create?access_token=ACCESS_TOKEN',
        //创建货架接口 请求方式 POST
        'CreateLandingpage' => 'https://api.weixin.qq.com/card/landingpage/create?access_token=ACCESS_TOKEN',
        //导入code 请求方式 POST
        'CodeDeposit' => 'http://api.weixin.qq.com/card/code/deposit?access_token=ACCESS_TOKEN',
        //查询导入code数目接口 请求方式 POST
        'CodeGetdepositcount' => 'http://api.weixin.qq.com/card/code/getdepositcount?access_token=ACCESS_TOKEN',
        //核查code接口 请求方式 POST
        'CodeCheck' => 'http://api.weixin.qq.com/card/code/checkcode?access_token=ACCESS_TOKEN',
        //图文消息群发卡券 请求方式 POST
        'MpnewsGethtml' => 'https://api.weixin.qq.com/card/mpnews/gethtml?access_token=ACCESS_TOKEN',
        //设置测试白名单 请求方式 POST
        'TestwhitelistSet' => 'https://api.weixin.qq.com/card/testwhitelist/set?access_token=ACCESS_TOKEN',
        //线下核销 查询Code接口 请求方式 POST
        'CodeGet' => 'https://api.weixin.qq.com/card/code/get?access_token=ACCESS_TOKEN',
        //线下核销 核销Code接口 请求方式 POST
        'CodeConsume' => 'https://api.weixin.qq.com/card/code/consume?access_token=ACCESS_TOKEN',
        //Code解码接口 请求方式 POST
        'CodeDecrypt' => 'https://api.weixin.qq.com/card/code/decrypt?access_token=ACCESS_TOKEN',
        //获取用户已领取卡券接口 请求方式 POST
        'CardUserGetcardlist' => 'https://api.weixin.qq.com/card/user/getcardlist?access_token=ACCESS_TOKEN',
        //查看卡券详情 请求方式 POST
        'CardDetails' => 'https://api.weixin.qq.com/card/get?access_token=ACCESS_TOKEN',
        //批量查询卡券列表 请求方式 POST
        'CardBatchget' => 'https://api.weixin.qq.com/card/batchget?access_token=ACCESS_TOKEN',
        //更改卡券信息接口 请求方式 POST
        'CardUpdate' => 'https://api.weixin.qq.com/card/update?access_token=ACCESS_TOKEN',
        //修改库存接口 请求方式 POST
        'CardModifyStock' => 'https://api.weixin.qq.com/card/modifystock?access_token=ACCESS_TOKEN',
        //更改Code接口 请求方式 POST
        'CodeUpdate' => 'https://api.weixin.qq.com/card/code/update?access_token=ACCESS_TOKEN',
        //删除卡券接口 请求方式 POST
        'CardDelete' => 'https://api.weixin.qq.com/card/delete?access_token=ACCESS_TOKEN',
        //设置卡券失效接口 请求方式 POST
        'CardUnavailable' => 'https://api.weixin.qq.com/card/code/unavailable?access_token=ACCESS_TOKEN',
        //拉取卡券概况数据接口 请求方式 POST
        'GetCardBizuininfo' => 'https://api.weixin.qq.com/datacube/getcardbizuininfo?access_token=ACCESS_TOKEN',
        //获取免费券数据接口 请求方式 POST
        'GetCardCardinfo' => 'https://api.weixin.qq.com/datacube/getcardcardinfo?access_token=ACCESS_TOKEN',
        //拉取会员卡概况数据接口 请求方式 POST
        'GetCardMemberCardinfo' => 'https://api.weixin.qq.com/datacube/getcardmembercardinfo?access_token=ACCESS_TOKEN',
        //拉取单张会员卡数据接口 请求方式 POST
        'GetCardMemberCardDetails' => 'https://api.weixin.qq.com/datacube/getcardmembercarddetail?access_token=ACCESS_TOKEN',
        //创建卡公众号的token 请求方式 POST
        'CardGeturl' => 'https://api.weixin.qq.com/card/membercard/activate/geturl?access_token=ACCESS_TOKEN',
        //获取用户开卡时提交的信息（跳转型开卡组件） 请求方式 POST
        'CardSubmitInfoJump' => 'https://api.weixin.qq.com/card/membercard/activatetempinfo/get?access_token=ACCESS_TOKEN',
        //获取用户开卡时提交的信息（非跳转型开卡组件）
        'CardSubmitInfo' => 'https://api.weixin.qq.com/card/code/get?access_token=ACCESS_TOKEN',
        //激活用户领取的会员卡（跳转型开卡组件）
        'CardActivate' => 'https://api.weixin.qq.com/card/membercard/activate?access_token=ACCESS_TOKEN',
        //创建子商户接口 请求方式 POST
        'SubmerChantCreate' => 'https://api.weixin.qq.com/card/submerchant/submit?access_token=ACCESS_TOKEN',
        //卡券开放类目查询接口 请求方式get
        'GetApplyProtocol' => 'https://api.weixin.qq.com/card/getapplyprotocol?access_token=ACCESS_TOKEN',
        //更新子商户接口,请求方式post
        'SubmerChantUpdate' => 'https://api.weixin.qq.com/card/submerchant/update?access_token=ACCESS_TOKEN',
        //拉取单个子商户信息接口 请求方式post
        'GetSubmerChant' => 'https://api.weixin.qq.com/card/submerchant/get?access_token=ACCESS_TOKEN',
        //批量拉取子商户信息接口 请求方式post
        'BatchGetSubmerChant' => 'https://api.weixin.qq.com/card/submerchant/batchget?access_token=ACCESS_TOKEN',
        //母商户资质申请接口 请求方式post
        'UploadCardAgent' => 'http://api.weixin.qq.com/cgi-bin/component/upload_card_agent_qualification?access_token=ACCESS_TOKEN',
        //母商户资质审核查询接口 请求方式get
        'CheckCardAgent' => 'http://api.weixin.qq.com/cgi-bin/component/check_card_agent_qualification?access_token=ACCESS_TOKEN',
        //子商户资质申请接口 请求方式 post
        'UploadCardMerchant' => 'http://api.weixin.qq.com/cgi-bin/component/upload_card_merchant_qualification?access_token=ACCESS_TOKEN',
        //子商户资质审核查询接口 请求方式post
        'CheckCardMerchant' => 'http://api.weixin.qq.com/cgi-bin/component/check_card_merchant_qualification?access_token=ACCESS_TOKEN',
        //拉取单个子商户信息接口 请求方式 post 通过指定的子商户appid，拉取该子商户的基础信息。 注意，用母商户去调用接口，但接口内传入的是子商户的appid。
        'GetCardMerchant' => 'http://api.weixin.qq.com/cgi-bin/component/get_card_merchant?access_token=ACCESS_TOKEN',
        //拉取子商户列表接口 请求方式post
        'BatchgetCardMerchant' => 'http://api.weixin.qq.com/cgi-bin/component/batchget_card_merchant?access_token=ACCESS_TOKEN',
        //第三方强授权相关接口 请求方式post
        'ApiQueryAuth' => 'https://api.weixin.qq.com/cgi-bin/component/api_query_auth?component_access_token=ACCESS_TOKEN',
        //确认授权 请求方式post
        'ApiConfirm' => 'https://api.weixin.qq.com/cgi-bin/component/api_confirm_authorization?component_access_token=ACCESS_TOKEN',
        //获取授权方的账户信息 请求方式post
        'ApiGetAuthorizer' => 'https://api.weixin.qq.com/cgi-bin/component/api_get_authorizer_info?component_access_token=ACCESS_TOKEN',
        //创建门店接口 请求方式post
        'AddPoi' => 'http://api.weixin.qq.com/cgi-bin/poi/addpoi?access_token=ACCESS_TOKEN',
        //查询门店信息 请求方式post
        'GetPoi' => 'http://api.weixin.qq.com/cgi-bin/poi/getpoi?access_token=ACCESS_TOKEN',
        //查询门店列表 请求方式post
        'GetPoiList' => 'https://api.weixin.qq.com/cgi-bin/poi/getpoilist?access_token=ACCESS_TOKEN',
        //修改门店服务信息 请求方式POST/FROM
        'UpdatePoi' => 'https://api.weixin.qq.com/cgi-bin/poi/updatepoi?access_token=ACCESS_TOKEN',
        //删除门店 请求方式POST/FROM
        'DelPoi' => 'https://api.weixin.qq.com/cgi-bin/poi/delpoi?access_token=ACCESS_TOKEN',
        //门店类目表 请求方式get
        'GetWxCategory' => 'http://api.weixin.qq.com/cgi-bin/poi/getwxcategory?access_token=ACCESS_TOKEN',
        //拉取门店小程序类目 请求方式get
        'GetMerchantCategory' => 'https://api.weixin.qq.com/wxa/get_merchant_category?access_token=ACCESS_TOKEN',
        //创建门店小程序 请求方式POST (请使用https协议)
        'ApplyMerchant' => 'https://api.weixin.qq.com/wxa/apply_merchant?access_token=ACCESS_TOKEN',
        //查询门店小程序审核结果 请求方式get
        'GetMerchantAuditInfo' => 'https://api.weixin.qq.com/wxa/get_merchant_audit_info?access_token=ACCESS_TOKEN',
        //修改门店小程序信息 请求方式POST
        'ModifyMerchant' => 'https://api.weixin.qq.com/wxa/modify_merchant?access_token=ACCESS_TOKEN',
        //从腾讯地图拉取省市区信息 请求方式get
        'GetDistrict' => 'https://api.weixin.qq.com/wxa/get_district?access_token=ACCESS_TOKEN',
        //在腾讯地图中搜索门店 请求方式POST
        'SearchMapPoi' => 'https://api.weixin.qq.com/wxa/search_map_poi?access_token=ACCESS_TOKEN',
        //在腾讯地图中创建门店 请求方式POST
        'CreateMapPoi' => 'https://api.weixin.qq.com/wxa/create_map_poi?access_token=ACCESS_TOKEN',
        //添加门店 请求方式POST
        'AddStore' => 'https://api.weixin.qq.com/wxa/add_store?access_token=ACCESS_TOKEN',
        //更新门店信息 请求方式POST
        'UpdateStore' => 'https://api.weixin.qq.com/wxa/update_store?access_token=ACCESS_TOKEN',
        //获取单个门店信息 请求方式POST
        'GetStoreInfo' => 'https://api.weixin.qq.com/wxa/get_store_info?access_token=ACCESS_TOKEN',
        //删除门店 请求方式POST
        'DelStore' => 'https://api.weixin.qq.com/wxa/del_store?access_token=ACCESS_TOKEN',
        //发送语意理解请求 请求方式POST
        'SemanticSemproxy' => 'https://api.weixin.qq.com/semantic/semproxy/search?access_token=ACCESS_TOKEN',
        //提交语音 请求方式POST
        'AddVoiceToRecoForText' => 'http://api.weixin.qq.com/cgi-bin/media/voice/addvoicetorecofortext?access_token=ACCESS_TOKEN',
        //获取语音识别结果 请求方式POST
        'QueryRecoResultForText' => 'http://api.weixin.qq.com/cgi-bin/media/voice/queryrecoresultfortext?access_token=ACCESS_TOKEN',
        //微信翻译接口 请求方式POST
        'TranslateContent' => 'http://api.weixin.qq.com/cgi-bin/media/voice/translatecontent?access_token=ACCESS_TOKEN',
        //身份证OCR识别接口 请求方式File
        'IdCard' => 'http://api.weixin.qq.com/cv/ocr/idcard?type=MODE&img_url=ENCODE_URL&access_token=ACCESS_TOCKEN',
        //银行卡OCR识别接口 请求方式File
        'BankCard' => 'http://api.weixin.qq.com/cv/ocr/bankcard?img_url=ENCODE_URL&access_token=ACCESS_TOCKEN',
        //行驶证OCR识别接口 请求方式File
        'Driving' => 'http://api.weixin.qq.com/cv/ocr/driving?img_url=ENCODE_URL&access_token=ACCESS_TOCKEN',
        //申请开通摇一摇功能接口 请求方式POST
        'Register' => 'https://api.weixin.qq.com/shakearound/account/register?access_token=ACCESS_TOKEN',
        //查询审核状态 请求方式get
        'AuditStatus' => 'https://api.weixin.qq.com/shakearound/account/auditstatus?access_token=ACCESS_TOKEN',
        //申请设备ID 请求方式POST
        'ApplyId' => 'https://api.weixin.qq.com/shakearound/device/applyid?access_token=ACCESS_TOKEN',
        //查询设备ID申请审核状态 请求方式POST
        'ApplyStatus' => 'https://api.weixin.qq.com/shakearound/device/applystatus?access_token=ACCESS_TOKEN',
        //编辑设备信息 请求方式POST
        'DeviceUpdate' => 'https://api.weixin.qq.com/shakearound/device/update?access_token=ACCESS_TOKEN',
        //配备设备与门店的关联关系 or 配备设备与其它公众账号门店的关联关系 请求方式POST
        'BindLocation' => 'https://api.weixin.qq.com/shakearound/device/bindlocation?access_token=ACCESS_TOKEN',
        //查询设备列表 请求方式POST
        'DeviceSearch' => 'https://api.weixin.qq.com/shakearound/device/search?access_token=ACCESS_TOKEN',
        //页面管理接口 请求方式POST
        'PageAdd' => 'https://api.weixin.qq.com/shakearound/page/add?access_token=ACCESS_TOKEN',
        //编辑页面信息 请求方式POST
        'PageUpdate' => 'https://api.weixin.qq.com/shakearound/page/update?access_token=ACCESS_TOKEN',
        //查询页面列表 请求方式POST
        'PageSearch' => 'https://api.weixin.qq.com/shakearound/page/search?access_token=ACCESS_TOKEN',
        //删除页面 请求方式POST
        'PageDelete' => 'https://api.weixin.qq.com/shakearound/page/delete?access_token=ACCESS_TOKEN',
        //上传图片素材 请求方式POST
        'MaterialAdd' => 'https://api.weixin.qq.com/shakearound/material/add?access_token=ACCESS_TOKEN&type=TYPE',
        //配备设备与页面的关联关系 请求方式POST
        'DeviceBindPage' => 'https://api.weixin.qq.com/shakearound/device/bindpage?access_token=ACCESS_TOKEN',
        //查询设备与页面的关联关系 请求方式POST
        'RelationSearch' => 'https://api.weixin.qq.com/shakearound/relation/search?access_token=ACCESS_TOKEN',
        //以设备为维度的数据统计接口 请求方式POST
        'StatisticsDevice' => 'https://api.weixin.qq.com/shakearound/statistics/device?access_token=ACCESS_TOKEN',
        //批量查询设备统计数据接口 请求方式POST
        'DeviceList' => 'https://api.weixin.qq.com/shakearound/statistics/devicelist?access_token=ACCESS_TOKEN',
        //以页面为维度的数据统计接口 请求方式POST
        'StatisticsPage' => 'https://api.weixin.qq.com/shakearound/statistics/page?access_token=ACCESS_TOKEN',
        //批量查询页面统计数据接口 请求方式POST
        'PageList' => 'https://api.weixin.qq.com/shakearound/statistics/pagelist?access_token=ACCESS_TOKEN',
        //新增分组接口 请求方式POST
        'GroupAdd' => 'https://api.weixin.qq.com/shakearound/device/group/add?access_token=ACCESS_TOKEN',
        //编辑分组信息 请求方式POST
        'GroupUpdate' => 'https://api.weixin.qq.com/shakearound/device/group/update?access_token=ACCESS_TOKEN',
        //删除分组 请求方式POST
        'GroupDelete' => 'https://api.weixin.qq.com/shakearound/device/group/delete?access_token=ACCESS_TOKEN',
        //查询分组列表 请求方式POST
        'GroupGetList' => 'https://api.weixin.qq.com/shakearound/device/group/getlist?access_token=ACCESS_TOKEN',
        //查询分组详情 请求方式POST
        'GroupGetDetail' => 'https://api.weixin.qq.com/shakearound/device/group/getdetail?access_token=ACCESS_TOKEN',
        //添加设备到分组 请求方式POST
        'GroupAddDevice' => 'https://api.weixin.qq.com/shakearound/device/group/adddevice?access_token=ACCESS_TOKEN',
        //从分组中移除设备 请求方式POST
        'GroupDeleteDevice' => 'https://api.weixin.qq.com/shakearound/device/group/deletedevice?access_token=ACCESS_TOKEN',
        //获取设备及用户信息 请求方式POST
        'UserGetShakeInfo' => 'https://api.weixin.qq.com/shakearound/user/getshakeinfo?access_token=ACCESS_TOKEN',
        //红包预下单接口 请求方式POST 数据类型XML
        'HbPreOrder' => 'https://api.mch.weixin.qq.com/mmpaymkttransfers/hbpreorder',
        //创建红包活动 请求方式POST
        'AddLotteryInfo' => 'https://api.weixin.qq.com/shakearound/lottery/addlotteryinfo?access_token=ACCESS_TOKEN&use_template=1&logo_url=LOGO_URL',
        //录入红包信息 请求方式POST
        'SetPrizeBucket' => 'https://api.weixin.qq.com/shakearound/lottery/setprizebucket?access_token=ACCESS_TOKEN',
        //设置红包活动抽奖开关 请求方式get
        'SetLotterySwitch' => 'https://api.weixin.qq.com/shakearound/lottery/setlotteryswitch?access_token=ACCESS_TOKEN&lottery_id=LOTTERYID&onoff=1',
        //红包查询接口 请求方式get
        'QueryLottery' => 'https://api.weixin.qq.com/shakearound/lottery/querylottery?access_token=ACCESS_TOKEN&lottery_id=LOTTERYID',
        //第三方平台获取开插件wifi_token 请求方式POST
        'OpenPlugin' => 'https://api.weixin.qq.com/bizwifi/openplugin/token?access_token=ACCESS_TOKEN',
        //连Wi-Fi完成页跳转小程序接口 or 设置连网完成页 请求方式POST
        'FinishPageSet' => 'https://api.weixin.qq.com/bizwifi/finishpage/set?access_token=ACCESS_TOKEN',
        //设置顶部banner跳转小程序接口 设置商家主页 请求方式POST
        'HomePageSet' => 'https://api.weixin.qq.com/bizwifi/homepage/set?access_token=ACCESS_TOKEN',
        //查询门店WiFi信息接口 请求方式POST
        'ShopGet' => 'https://api.weixin.qq.com/bizwifi/shop/get?access_token=ACCESS_TOKEN',
        //获取WiFi门店列表 请求方式POST
        'ShopList' => 'https://api.weixin.qq.com/bizwifi/shop/list?access_token=ACCESS_TOKEN',
        //修改门店网络信息 请求方式POST
        'ShopUpdate' => 'https://api.weixin.qq.com/bizwifi/shop/update?access_token=ACCESS_TOKEN',
        //清空门店网络及其设备 请求方式POST
        'ShopClean' => 'https://api.weixin.qq.com/bizwifi/shop/clean?access_token=ACCESS_TOKEN',
        //添加密码型设备 请求方式POST
        'DeviceAdd' => 'https://api.weixin.qq.com/bizwifi/device/add?access_token=ACCESS_TOKEN',
        //添加portal型设备 请求方式POST
        'ApportalRegister' => 'https://api.weixin.qq.com/bizwifi/apportal/register?access_token=ACCESS_TOKEN',
        //查询设备 请求方式POST
        'BizwwifiDeviceList' => 'https://api.weixin.qq.com/bizwifi/device/list?access_token=ACCESS_TOKEN',
        //删除设备 请求方式POST
        'DeviceDelete' => 'https://api.weixin.qq.com/bizwifi/device/delete?access_token=ACCESS_TOKEN',
        //获取物料的二维码 请求方式POST
        'QrcodeGet' => 'https://api.weixin.qq.com/bizwifi/qrcode/get?access_token=ACCESS_TOKEN',
        //查询商家主页 请求方式POST
        'HomepageGet' => 'https://api.weixin.qq.com/bizwifi/homepage/get?access_token=ACCESS_TOKEN',
        //设置微信首页欢迎语 请求方式POST
        'BarSet' => 'https://api.weixin.qq.com/bizwifi/bar/set?access_token=ACCESS_TOKEN',
        //Wi-Fi数据统计 请求方式POST
        'StatisticsList' => 'https://api.weixin.qq.com/bizwifi/statistics/list?access_token=ACCESS_TOKEN',
        //设置门店卡券投放信息 请求方式POST
        'CouponputSet' => 'https://api.weixin.qq.com/bizwifi/couponput/set?access_token=ACCESS_TOKEN',
        //查询门店卡券投放信息 请求方式POST
        'CouponputGet' => 'https://api.weixin.qq.com/bizwifi/couponput/get?access_token=ACCESS_TOKEN',
        //获取商户信息 请求方式get
        'MerchantInfoGet' => 'https://api.weixin.qq.com/scan/merchantinfo/get?access_token=ACCESS_TOKEN',
        //创建商品 请求方式POST
        'ProductCreate' => 'https://api.weixin.qq.com/scan/product/create?access_token=ACCESS_TOKEN',
        //商品发布 请求方式POST
        'ProductModstatus' => 'https://api.weixin.qq.com/scan/product/modstatus?access_token=ACCESS_TOKEN',
        //设置测试人员白名单 请求方式POST
        'TestWhiteListSet' => 'https://api.weixin.qq.com/scan/testwhitelist/set?access_token=ACCESS_TOKEN',
        //获取商品二维码 请求方式POST
        'ProductGetQrCode' => 'https://api.weixin.qq.com/scan/product/getqrcode?access_token=ACCESS_TOKEN',
        //查询商品信息 请求方式POST
        'ProductGet' => 'https://api.weixin.qq.com/scan/product/get?access_token=ACCESS_TOKEN',
        //批量查询商品信息 请求方式POST
        'ProductGetList' => 'https://api.weixin.qq.com/scan/product/getlist?access_token=ACCESS_TOKEN',
        //更新商品信息 请求方式POST
        'ProductUpdate' => 'https://api.weixin.qq.com/scan/product/update?access_token=ACCESS_TOKEN',
        //清除商品信息 请求方式POST
        'ProductClear' => 'https://api.weixin.qq.com/scan/product/clear?access_token=ACCESS_TOKEN',
        //检查wxticket参数 请求方式POST
        'ScanticketCheck' => 'https://api.weixin.qq.com/scan/scanticket/check?access_token=ACCESS_TOKEN',
        //清除扫码记录 请求方式POST
        'ClearScanticketCheck' => 'https://api.weixin.qq.com/scan/scanticket/check?access_token=ACCESS_TOKEN',
        //获取授权页ticket 请求方式get
        'GetTicket' => 'https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token=ACCESS_TOKEN&type=wx_card',
        //获取授权页链接 请求方式POST
        'GetAuthurl' => 'https://api.weixin.qq.com/card/invoice/getauthurl?access_token=ACCESS_TOKEN',
        //查询授权完成状态 请求方式POST
        'GetAuthData' => 'https://api.weixin.qq.com/card/invoice/getauthdata?access_token=ACCESS_TOKEN',
        //拒绝开票 请求方式POST
        'RejectInsert' => 'https://api.weixin.qq.com/card/invoice/rejectinsert?access_token=ACCESS_TOKEN',
        //设置授权页字段信息 请求方式POST
        'SetAuthField' => 'https://api.weixin.qq.com/card/invoice/setbizattr?action=set_auth_field&access_token=ACCESS_TOKEN',
        //查询授权页字段信息 请求方式POST
        'GetAuthField' => 'https://api.weixin.qq.com/card/invoice/setbizattr?action=get_auth_field&access_token=ACCESS_TOKEN',
        //关联商户号与开票平台 请求方式POST
        'SetPayMch' => 'https://api.weixin.qq.com/card/invoice/setbizattr?action=set_pay_mch&access_token=ACCESS_TOKEN',
        //查询商户号与开票平台关联情况 请求方式POST
        'GetPayMch' => 'https://api.weixin.qq.com/card/invoice/setbizattr?action=get_pay_mch&access_token=ACCESS_TOKEN',
        //统一开票接口-开具蓝票 请求方式POST
        'MakeOutInvoice' => 'https://api.weixin.qq.com/card/invoice/makeoutinvoice?access_token=ACCESS_TOKEN',
        //统一发票接口发票冲红 请求方式POST
        'ClearOutInvoice' => 'https://api.weixin.qq.com/card/invoice/clearoutinvoice?access_token=ACCESS_TOKEN',
        //统一开票接口查询已开发票 请求方式POST
        'QueryInvoceInfo' => 'https://api.weixin.qq.com/card/invoice/queryinvoceinfo?access_token=ACCESS_TOKEN',
        //设置商户联系方式 请求方式POST
        'SetContact' => 'https://api.weixin.qq.com/card/invoice/setbizattr?action=set_contact&access_token=ACCESS_TOKEN',
        //查询商户联系方式 请求方式POST
        'GetContact' => 'https://api.weixin.qq.com/card/invoice/setbizattr?action=get_contact&access_token=ACCESS_TOKEN',
        //获取自身的开票平台识别码 请求方式POST
        'SetUrl' => 'https://api.weixin.qq.com/card/invoice/seturl?access_token=ACCESS_TOKEN',
        //创建发票卡券模板 请求方式POST
        'CreateCard' => 'https://api.weixin.qq.com/card/invoice/platform/createcard?access_token=ACCESS_TOKEN',
        //上传PDF 请求方式POST
        'SetPdf' => 'https://api.weixin.qq.com/card/invoice/platform/setpdf?access_token=ACCESS_TOKEN',
        //查询以上传的PDF文件 请求方式POST
        'GetPdf' => 'https://api.weixin.qq.com/card/invoice/platform/getpdf?action=get_url&access_token=ACCESS_TOKEN',
        //将电子发票卡券插入用户卡包 请求方式POST
        'InvoiceInsert' => 'https://api.weixin.qq.com/card/invoice/insert?access_token=ACCESS_TOKEN',
        //更新发票卡券状态 请求方式POST
        'InvoiceUpdateStatus' => 'https://api.weixin.qq.com/card/invoice/platform/updatestatus?access_token=ACCESS_TOKEN',
        //查询报销发票信息 请求方式POST
        'GetInvoiceInfo' => 'https://api.weixin.qq.com/card/invoice/reimburse/getinvoiceinfo?access_token=ACCESS_TOKEN',
        //批量查询报销发票信息 请求方式POST
        'GetInvoiceBatch' => 'https://api.weixin.qq.com/card/invoice/reimburse/getinvoicebatch?access_token=ACCESS_TOKEN',
        //报销方更新发票状态 请求方式POST
        'UpdateInvoiceStatus' => 'https://api.weixin.qq.com/card/invoice/reimburse/updateinvoicestatus?access_token=ACCESS_TOKEN',
        //报销方批量更新发票状态 请求方式POST
        'UpdateStatusBatch' => 'https://api.weixin.qq.com/card/invoice/reimburse/updatestatusbatch?access_token=ACCESS_TOKEN',
        //将发票抬头信息录入到用户微信中 请求方式POST
        'GetUserTitleUrl' => 'https://api.weixin.qq.com/card/invoice/biz/getusertitleurl?access_token=ACCESS_TOKEN',
        //获取用户抬头（方式一）:获取商户专属二维码，立在收银台 请求方式POST
        'GetSelectTitleUrl' => 'https://api.weixin.qq.com/card/invoice/biz/getselecttitleurl?access_token=ACCESS_TOKEN',
        //获取用户抬头（方式二）:商户扫描用户的发票抬头二维码 请求方式POST
        'ScanTitle' => 'URL:https://api.weixin.qq.com/card/invoice/scantitle?access_token=ACCESS_TOKEN',
        //获取授权页链接 请求方式POST
        'GetBillAuthUrl' => 'https://api.weixin.qq.com/nontax/getbillauthurl?access_token=ACCESS_TOKEN',
        //创建财政电子票据接口 请求方式POST
        'CreateBillCard' => 'https://api.weixin.qq.com/nontax/createbillcard?access_token=ACCESS_TOKEN',
        //将财政电子票据添加到用户微信卡包 请求方式POST
        'InsertBill' => 'https://api.weixin.qq.com/nontax/insertbill?access_token=ACCESS_TOKEN',
        //一物一码申请二维码接口 请求方式 POST
        'ApplyQrcode'=>'https://api.weixin.qq.com/intp/marketcode/applycode?access_token=ACCESS_TOKEN',
        //查询二维码申请单接口 请求方式 POST
        'ShowQrcode'=>'https://api.weixin.qq.com/intp/marketcode/applycodequery?access_token=ACCESS_TOKEN',
        //下载二维码包接口 请求方式 POST
        'DowloadQrcode'=>'https://api.weixin.qq.com/intp/marketcode/applycodedownload?access_token=ACCESS_TOKEN',
        //激活二维码接口 请求方式 POST
        'ActiveQrcode'=>'https://api.weixin.qq.com/intp/marketcode/codeactive?access_token=ACCESS_TOKEN',
        //查询二维码激活状态接口 请求方式 POST
        'ShowQrcodeState'=>'https://api.weixin.qq.com/intp/marketcode/codeactivequery?access_token=ACCESS_TOKEN',
        //code_ticket换code接口 请求方式 POST
        'TicketCode'=>'https://api.weixin.qq.com/intp/marketcode/tickettocode?access_token=ACCESS_TOKEN'
    ];
    public function get_url($name)
    {
        strpos($name, '_') === false ? $name = ucwords($name) : $name = ucwords(Init::dataswitch()->convert2Underline($name));
        return self::API[$name]??$name;
    }

    public function __call($name, $arguments)
    {
        return (new \ReflectionClass(__NAMESPACE__ . '\\' . ucwords(Init::dataswitch()->convert2Underline($name))))->newInstanceArgs($arguments);
    }
    public static function access_token(){
        return (new \ReflectionClass(\wechat\driver\wepublic\Init::class))->newInstanceArgs()->access_token();
    }
}