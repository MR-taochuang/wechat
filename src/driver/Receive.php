<?php

namespace wechat\driver;

use rely\Init;

/**
 * Class Receive
 * @package wechat\driver
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 14:57
 * 接收微信推送的事件
 */
class Receive extends Driver{

    /**
     * 第三方获取 componet_verify_ticket;
     */
    public function ThirdEvent(){
        $post = file_get_contents('php://input');
        $encode_ticket =self::isimplexml_load_string($post);
        if (empty($post) || empty($encode_ticket)) exit('fail');
        $decode_ticket =self::aes_decode($encode_ticket);
        $ticket_xml = self::isimplexml_load_string($decode_ticket, 'SimpleXMLElement', LIBXML_NOCDATA);
        if (empty($ticket_xml)) {
            exit('fail');
        }
        if (!empty($ticket_xml->ComponentVerifyTicket) && $ticket_xml->InfoType == 'component_verify_ticket') {
            $ticket = strval($ticket_xml->ComponentVerifyTicket);
            Init::cache()->set('component_verify_ticket',$ticket);
        }
        exit('success');
    }
    /**
     * @param $string
     * @param string $class_name
     * @param int $options
     * @param string $ns
     * @param bool $is_prefix
     * @return bool|\SimpleXMLElement
     * 解密微信推送的数据
     */
    public function isimplexml_load_string($string, $class_name = 'SimpleXMLElement', $options = 0, $ns = '', $is_prefix = false) {
        libxml_disable_entity_loader(true);
        if (preg_match('/(\<\!DOCTYPE|\<\!ENTITY)/i', $string)) {
            return false;
        }
        $string = preg_replace("/[\\x00-\\x08\\x0b-\\x0c\\x0e-\\x1f\\x7f]/", '', $string); 	return simplexml_load_string($string, $class_name, $options, $ns, $is_prefix);
    }

    /**
     * @param $message
     * @param string $encodingaeskey
     * @param string $appid
     * @return string
     * 解密数据
     */
    public function aes_decode($message, $encodingaeskey = '', $appid = '') {
        $key = base64_decode($encodingaeskey . '=');
        $ciphertext_dec = base64_decode($message);
        $iv = substr($key, 0, 16);
        $decrypted = openssl_decrypt($ciphertext_dec, 'AES-256-CBC', $key, OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, $iv);
        $pad = ord(substr($decrypted, -1));
        if ($pad < 1 || $pad > 32) {
            $pad = 0;
        }
        $result = substr($decrypted, 0, (strlen($decrypted) - $pad));
        if (strlen($result) < 16) {
            return '';
        }
        $content = substr($result, 16, strlen($result));
        $len_list = unpack("N", substr($content, 0, 4));
        $contentlen = $len_list[1];
        $content = substr($content, 4, $contentlen);
        $from_appid = substr($content, 4);
        if (!empty($appid) && $appid != $from_appid) {
            return '';
        }
        return $content;
    }

    /**
     * @param $message
     * @param string $encodingaeskey
     * @param string $appid
     * @return string
     * 加密数据
     */
    public function aes_encode($message, $encodingaeskey = '', $appid = '') {
        $key = base64_decode($encodingaeskey . '=');
        $text = self::random(16) . pack("N", strlen($message)) . $message . $appid;
        $iv = substr($key, 0, 16);
        $block_size = 32;
        $text_length = strlen($text);
        $amount_to_pad = $block_size - ($text_length % $block_size);
        if ($amount_to_pad == 0) {
            $amount_to_pad = $block_size;
        }
        $pad_chr = chr($amount_to_pad);
        $tmp = '';
        for ($index = 0; $index < $amount_to_pad; $index++) {
            $tmp .= $pad_chr;
        }
        $text = $text . $tmp;
        $encrypted = openssl_encrypt($text, 'AES-256-CBC', $key, OPENSSL_RAW_DATA|OPENSSL_ZERO_PADDING, $iv);
        $encrypt_msg = base64_encode($encrypted);
        return $encrypt_msg;
    }

    /**
     * @param $length
     * @param bool $numeric
     * @return string
     */
    public function random($length, $numeric = FALSE) {
        $seed = base_convert(md5(microtime() . $_SERVER['DOCUMENT_ROOT']), 16, $numeric ? 10 : 35);
        $seed = $numeric ? (str_replace('0', '', $seed) . '012340567890') : ($seed . 'zZ' . strtoupper($seed));
        if ($numeric) {
            $hash = '';
        } else {
            $hash = chr(rand(1, 26) + rand(0, 1) * 32 + 64);
            $length--;
        }
        $max = strlen($seed) - 1;
        for ($i = 0; $i < $length; $i++) {
            $hash .= $seed{mt_rand(0, $max)};
        }
        return $hash;
    }
}