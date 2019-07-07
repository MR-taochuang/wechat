<?php

namespace wechat\driver\wepublic;

use wechat\driver\Driver;

/**
 * Class Smart
 * @package wechat\driver\wepublic
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 17:44
 * 微信智能接口
 */
class Smart extends Driver
{
    /***
     * @param $options
     * @return array
     * 发送语意理解请求
     */
    public function SemanticSemproxy($options)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post($options, 'json');
    }

    /***
     * @param $format
     * @param $voice_id
     * @param $lang
     * @return array
     * 提交语音接口
     */
    public function AddVoiceToRecoForText($format, $voice_id, $lang)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['format' => $format, 'voice_id' => $voice_id, 'lang' => $lang], 'json');
    }

    /***
     * @param $voice_id
     * @param $lang
     * @return array
     * 获取语音识别结果
     */
    public function QueryRecoResultForText($voice_id, $lang)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['voice_id' => $voice_id, 'lang' => $lang], 'json');
    }

    /***
     * @param $lfrom
     * @param $lto
     * @return array
     * 微信翻译
     */
    public function TranslateContent($lfrom, $lto)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_post(['lfrom' => $lfrom, 'lto' => $lto], 'json');
    }

    /***
     * @param $file
     * @return array
     * 身份证OCR识别接口
     */
    public function IdCard($file)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_file($file);
    }

    /***
     * @param $file
     * @return array
     * 银行卡OCR接口
     */
    public function BankCard($file)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_file($file);
    }

    /***
     * @param $file
     * @return array
     * 行驶证OCR接口
     */
    public function Driving($file)
    {
        return self::callback(Api::access_token())->instance(__NAMESPACE__, __FUNCTION__)->_file($file);
    }

}