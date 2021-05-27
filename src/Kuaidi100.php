<?php
/*
 * @Author: ZhaohangYang <yangzhaohang@comsenz-service.com>
 * @Date: 2021-04-16 17:05:43
 * @Description: 伙伴智慧大客户研发部
 */

namespace Kuaidi100;

use GuzzleHttp\Client;

/**
 * 快递100基础模型
 */
class Kuaidi100
{
    /**
     * 客户授权key
     *
     * @var [string]
     */
    private $key;
    /**
     * 查询公司编号
     *
     * @var [string]
     */
    private $customer;
    /**
     * 请求客户端
     *
     * @var [GuzzleHttp\Client]
     */
    public $client;
    /**
     * 请求客户端超时时间
     *
     * @var [float]
     */
    public $clientTimeout = 5.0;
    /**
     * 快递100 api_url
     *
     * @var string
     */
    public $kd100ApiUrl = 'https://poll.Kuaidi100.com';

    public function __construct($key, $customer)
    {
        $this->key      = $key;
        $this->customer = $customer;
        $this->client   = new Client([
            'timeout'  => $this->clientTimeout,
            'base_uri' => $this->kd100ApiUrl,
        ]);
    }

    /**
     * 获取签名
     *
     * @param array $post_data 需要发送请求的参数
     * @return string
     */
    public function getSign(array $post_data = [])
    {
        $sign = md5($post_data["param"] . $this->key . $post_data["customer"]);
        return strtoupper($sign);
    }

    /**
     * 根据传入的请求参数，返回格式化的请求体
     *
     * @param array $param
     * @return array
     */
    public function getPostData(array $param = [])
    {
        $post_data             = [];
        $post_data["customer"] = $this->customer;
        $post_data["param"]    = json_encode($param);
        $post_data["sign"]     = $this->getSign($post_data);

        return $post_data;
    }
}
