<?php

namespace wechat\driver\wethird;
use wechat\driver\Driver;
use rely\Init;

/**
 * Class Weapi
 * @package wechat\driver\wethird
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/7 20:59
 * 注册代理小程序类
 */
class Weapi extends Driver{

    public function __call($name, $arguments)
    {
        return (new \ReflectionClass(strtolower(__CLASS__).'\\'.ucwords($name)))->newInstanceArgs($arguments);
    }

}