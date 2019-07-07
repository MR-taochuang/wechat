<?php

namespace wechat\driver\wethird;
use wechat\driver\Driver;
use rely\Init;

/**
 * Class Wepublic
 * @package wechat\driver\wethird
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 19:58
 * 注册公众号类
 *
 * @method \wechat\driver\wethird\wepublic\User user($config=[]) 代理公众号处理用户信息
 *
 */
class Wepublic extends Driver{

    public function __call($name, $arguments)
    {
       return (new \ReflectionClass(strtolower(__CLASS__).'\\'.ucwords($name)))->newInstanceArgs($arguments);
    }

}