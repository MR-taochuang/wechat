<?php

namespace wechat\driver\weapi;

use rely\Init;
use rely\init\Config;

/**
 * Class Api
 * @package wechat\driver\weapi
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 11:35
 * 微信小程序地址
 *
 * @method \wechat\driver\weapi\Init init($config=[]) 小程序基础类库
 * @method \wechat\driver\weapi\Custom custom($config=[]) 小程序客服发送消息
 * @method \wechat\driver\weapi\Logistics logistics($config=[]) 小程序物流管理
 * @method \wechat\driver\weapi\Media media($config=[]) 微信小程序素材管理
 * @method \wechat\driver\weapi\Plugin plugin($config=[]) 微信小程序插件管理
 * @method \wechat\driver\weapi\Poi poi($config=[]) 微信小程序地址管理
 * @method \wechat\driver\weapi\Qrcode qrcode($config=[]) 微信小程序二维码管理
 * @method \wechat\driver\weapi\Summary summary($config=[]) 微信小程序数据管理
 * @method \wechat\driver\weapi\Template template($config=[]) 微信模板消息
 * @method \wechat\driver\weapi\User user($config=[]) 微信用户管理
 *
 */
class Api extends Config
{
    const API = [
        // 微信小程序access_token 请求方式 GET
        'AccessToken' => 'https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=APPID&secret=APPSECRET',
        //微信code换取session 请求方式 GET
        'Code2Session' => 'https://api.weixin.qq.com/sns/jscode2session?appid=APPID&secret=APPSECRET&js_code=CODE&grant_type=authorization_code',
        //获取模板库标题列表 请求方式 POST
        'TemplateList' => 'https://api.weixin.qq.com/cgi-bin/wxopen/template/library/list?access_token=ACCESS_TOKEN',
        //获取模板库某个模板标题下关键词库 请求方式 POST
        'TemplateGet' => 'https://api.weixin.qq.com/cgi-bin/wxopen/template/library/get?access_token=ACCESS_TOKEN',
        //组合模板并添加至帐号下的个人模板库 请求方式 POST
        'TemplateAdd' => 'https://api.weixin.qq.com/cgi-bin/wxopen/template/add?access_token=ACCESS_TOKEN',
        //获取帐号下已存在的模板列表 请求方式 POST
        'TemplateLists' => 'https://api.weixin.qq.com/cgi-bin/wxopen/template/list?access_token=ACCESS_TOKEN',
        //删除帐号下的某个模板 请求方式 POST
        'TemplateDelete' => 'https://api.weixin.qq.com/cgi-bin/wxopen/template/del?access_token=ACCESS_TOKEN',
        //发送客服消息给用户 请求方式 POST
        'TemplateSend' => 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=ACCESS_TOKEN',
        //把媒体文件上传到微信服务器。目前仅支持图片。用于发送客服消息或被动回复用户消息。请求方式 POST
        'MediaUpload' => 'https://api.weixin.qq.com/cgi-bin/media/upload?access_token=ACCESS_TOKEN&type=TYPE',
        //获取客服消息内的临时素材。即下载临时的多媒体文件。目前小程序仅支持下载图片文件 请求方式 GET
        'MediaGet' => 'https://api.weixin.qq.com/cgi-bin/media/get?access_token=ACCESS_TOKEN&media_id=MEDIA_ID',
        //下发客服当前输入状态给用户 请求方式 POST
        'CustomTyping' => 'https://api.weixin.qq.com/cgi-bin/message/custom/typing?access_token=ACCESS_TOKEN',
        //发送客服消息给用户 请求方式 POST
        'CustomSend' => 'https://api.weixin.qq.com/cgi-bin/message/custom/send?access_token=ACCESS_TOKEN',
        //用户支付完成后，获取该用户的 UnionId 请求方式 GET
        'GetUnionid' => 'https://api.weixin.qq.com/wxa/getpaidunionid?access_token=ACCESS_TOKEN&openid=OPENID',
        //获取用户访问小程序日留存 请求方式 POST
        'DatacubeDay' => 'https://api.weixin.qq.com/datacube/getweanalysisappiddailyretaininfo?access_token=ACCESS_TOKEN',
        //获取用户访问小程序月留存 请求方式 POST
        'DatacubeMonth' => 'https://api.weixin.qq.com/datacube/getweanalysisappidmonthlyretaininfo?access_token=ACCESS_TOKEN',
        //获取用户访问小程序周留存 请求方式 POST
        'DatacubeWeek' => 'https://api.weixin.qq.com/datacube/getweanalysisappidweeklyretaininfo?access_token=ACCESS_TOKEN',
        //获取用户访问小程序数据概况 请求方式 POST
        'Datacube' => 'https://api.weixin.qq.com/datacube/getweanalysisappiddailysummarytrend?access_token=ACCESS_TOKEN',
        //获取用户访问小程序数据日趋势 请求方式 POST
        'VisitDay' => 'https://api.weixin.qq.com/datacube/getweanalysisappiddailyvisittrend?access_token=ACCESS_TOKEN',
        //获取用户访问小程序数据月趋势 请求方式 POST
        'VisitMonth' => 'https://api.weixin.qq.com/datacube/getweanalysisappidmonthlyvisittrend?access_token=ACCESS_TOKEN',
        //获取用户访问小程序数据周趋势 请求方式 POST
        'VisitWeek' => 'https://api.weixin.qq.com/datacube/getweanalysisappidweeklyvisittrend?access_token=ACCESS_TOKEN',
        //获取小程序新增或活跃用户的画像分布数据。时间范围支持昨天、最近7天、最近30天。其中，新增用户数为时间范围内首次访问小程序的去重用户数，活跃用户数为时间范围内访问过小程序的去重用户数。 请求方式 POST
        'Portrait' => 'https://api.weixin.qq.com/datacube/getweanalysisappiduserportrait?access_token=ACCESS_TOKEN',
        //获取用户小程序访问分布数据 请求方式 POST
        'Distribution' => 'https://api.weixin.qq.com/datacube/getweanalysisappidvisitdistribution?access_token=ACCESS_TOKEN',
        //访问页面 请求方式 POST
        'VisitPage' => 'https://api.weixin.qq.com/datacube/getweanalysisappidvisitpage?access_token=ACCESS_TOKEN',
        //下发小程序和公众号统一的服务消息 请求方式 POST
        'TemplateUniform' => 'https://api.weixin.qq.com/cgi-bin/message/wxopen/template/uniform_send?access_token=ACCESS_TOKEN',
        //创建被分享动态消息的 activity_id 请求方式 POST
        'Activityid' => 'https://api.weixin.qq.com/cgi-bin/message/wxopen/activityid/create?access_token=ACCESS_TOKEN',
        //修改被分享的动态消息 请求方式 POST
        'Updatablemsg' => 'https://api.weixin.qq.com/cgi-bin/message/wxopen/updatablemsg/send?access_token=ACCESS_TOKEN',
        //向插件开发者发起使用插件的申请 请求方式 POST
        'ApplyPlugin' => 'https://api.weixin.qq.com/wxa/plugin?access_token=ACCESS_TOKEN',
        //获取当前所有插件使用方（供插件开发者调用） 请求方式 POST
        'GetPlugin' => 'https://api.weixin.qq.com/wxa/devplugin?access_token=ACCESS_TOKEN',
        //查询已添加的插件 请求方式 POST
        'PluginList' => 'https://api.weixin.qq.com/wxa/plugin?access_token=ACCESS_TOKEN',
        //修改插件使用申请的状态（供插件开发者调用） 请求方式 POST
        'PluginApplyStatus' => 'https://api.weixin.qq.com/wxa/devplugin?access_token=ACCESS_TOKEN',
        //删除已添加的插件 请求方式 POST
        'UnbindPlugin' => 'https://api.weixin.qq.com/wxa/plugin?access_token=ACCESS_TOKEN',
        //添加地点 请求方式 POST
        'AddPoi' => 'https://api.weixin.qq.com/wxa/addnearbypoi?access_token=ACCESS_TOKEN',
        //删除地点 请求方式 POST
        'DelPoi' => 'https://api.weixin.qq.com/wxa/delnearbypoi?access_token=ACCESS_TOKEN',
        //查看地点列表 请求方式 GET
        'PoiList' => 'https://api.weixin.qq.com/wxa/getnearbypoilist?page=1&page_rows=PAGE_ROWS&access_token=ACCESS_TOKEN',
        //展示/取消展示附近小程序 请求方式 POST
        'PoiShow' => 'https://api.weixin.qq.com/wxa/setnearbypoishowstatus?access_token=ACCESS_TOKEN',
        //获取小程序二维码，适用于需要的码数量较少的业务场景。通过该接口生成的小程序码，永久有效，有数量限制， 请求方式 POST
        'CreateQrcode' => 'https://api.weixin.qq.com/cgi-bin/wxaapp/createwxaqrcode?access_token=ACCESS_TOKEN',
        //获取小程序码，适用于需要的码数量较少的业务场景。通过该接口生成的小程序码，永久有效，有数量限制 请求方式 POST
        'GetWXACode' => 'https://api.weixin.qq.com/wxa/getwxacode?access_token=ACCESS_TOKEN',
        //获取小程序码，适用于需要的码数量极多的业务场景。通过该接口生成的小程序码，永久有效，数量暂无限制。 请求方式 POST
        'GetWXACodeUnlimit' => 'https://api.weixin.qq.com/wxa/getwxacodeunlimit?access_token=ACCESS_TOKEN',
        //校验一张图片是否含有违法违规内容 请求方式 POST
        'imgSecCheck' => 'https://api.weixin.qq.com/wxa/img_sec_check?access_token=ACCESS_TOKEN',
        // 检查一段文本是否含有违法违规内容。 请求方式 POST
        'MsgSecCheck' => 'https://api.weixin.qq.com/wxa/msg_sec_check?access_token=ACCESS_TOKEN',
        //生成运单 请求方式 POST
        'AddOrder' => 'https://api.weixin.qq.com/cgi-bin/express/business/order/add?access_token=ACCESS_TOKEN',
        //取消运单 请求方式 POST
        'CancelOrder' => 'https://api.weixin.qq.com/cgi-bin/express/business/order/cancel?access_token=ACCESS_TOKEN',
        //获取支持的快递公司列表 请求方式 GET
        'GetAllDelivery' => 'https://api.weixin.qq.com/cgi-bin/express/business/delivery/getall?access_token=ACCESS_TOKEN',
        //获取运单数据 请求方式 POST
        'GetOrder' => 'https://api.weixin.qq.com/cgi-bin/express/business/order/get?access_token=ACCESS_TOKEN',
        //查询运单轨迹 请求方式 POST
        'GetPath' => 'https://api.weixin.qq.com/cgi-bin/express/business/path/get?access_token=ACCESS_TOKEN',
        //获取打印员。若需要使用微信打单 PC 软件，才需要调用 请求方式 GET
        'GetPrinter' => 'https://api.weixin.qq.com/cgi-bin/express/business/printer/getall?access_token=ACCESS_TOKEN',
        //获取电子面单余额。仅在使用加盟类快递公司时，才可以调用 请求方式 POST
        'GetQuota' => 'https://api.weixin.qq.com/cgi-bin/express/business/quota/get?access_token=ACCESS_TOKEN',
        //更新打印员。若需要使用微信打单 PC 软件，才需要调用 请求方式 POST
        'UpdatePrinter' => 'https://api.weixin.qq.com/cgi-bin/express/business/printer/update?access_token=ACCESS_TOKEN',
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
        return (new \ReflectionClass(\wechat\driver\weapi\Init::class))->newInstanceArgs()->AccessToken();
    }
}

