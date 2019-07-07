<?php

namespace wechat\driver;

use rely\Init;
use rely\init\Config;

/**
 * Class Wechat
 * @package wechat\driver
 * @author Mr.taochuang <mr_taochuang@163.com>
 * @date 2019/7/6 11:40
 * 微信支持类
 *
 * @method  _get($param = '')  get请求
 * @method _post($param, $type) post 请求
 * @method _file($param) file文件请求
 */
class Driver extends Config
{

    public static $url;
    /**
     * api地址位置
     */
    protected static $api = 'Api';

    /**
     * @var string
     * 数组转换
     */
    private static $array = 'toArray';

    /**
     * @param $namespace
     * @param $function
     * @return $this
     * 请求url
     */
    public  function instance($namespace, $function='')
    {
        self::$url = class_exists($namespace . '\\' . self::$api)?self::url2apiurl((new \ReflectionClass($namespace . '\\' . self::$api))->newInstanceArgs()->get_url($function)):$namespace;
        return $this;
    }

    /**
     * @param $url
     * @param $config
     * @return string
     * url转apiurl
     */
    private function url2apiurl($url)
    {
        if (strpos($url, '?') === false) return $url;
        $start_url = substr($url, 0, strrpos($url, '?'));
        $query = parse_url($url);
        $param = explode('&', $query['query']);
        foreach ($param as &$vs) {
            $v = explode('=', $vs);
            $v[1] = self::get(strtolower($v[1]))??$v[1];
            $vs = implode('=', $v);
        }
        $end_url = implode('&', $param);
        if (!empty($query['fragment'])) $end_url = $end_url . '#' . $query['fragment'];
        return $start_url . '?' . $end_url;
    }

    /**
     * @param $name /请求执行方法
     * @param $arguments /请求执行参数
     * @return mixed
     * 请求处理
     */
    public function __call($name, $arguments)
    {
        return call_user_func_array([Init::dataswitch(), self::$array], [call_user_func_array([Init::curl()->instance(self::$url), str_replace('_', '', $name)], $arguments)]);
    }

    /**
     * @return $this
     * 执行回调
     */
    public function callback()
    {
        $func = func_get_args();
        foreach ($func as $maps) {
            if (is_object($maps)) $maps = $maps($this, $func);
            if (!is_array($maps)) continue;
            foreach ($maps as $key => $value) {
                self::set($key, $value);
            }
        }
        return $this;
    }
    /**
     * @return string
     * 获取命名空间
     */
    public static function get_namespace($class='')
    {
        return !empty($class)?__NAMESPACE__.'\\'.$class.'\\'.self::$api:__NAMESPACE__;
    }
}