<?php
/*
 * @Author: ZhaohangYang <yangzhaohang@comsenz-service.com>
 * @Date: 2021-04-16 17:06:57
 * @Description: 伙伴智慧大客户研发部
 */

namespace Kuaidi100\Models;

use Kuaidi100\Kuaidi100;

/**
 * 快递订阅类
 */
class Subscribe extends Kuaidi100
{
    public $client;
    public function __construct($key, $customer)
    {
        parent::__construct($key, $customer);
    }

    public function get($param)
    {
        $url      = '/poll'; //订阅
        $response = $this->client->request('POST', $url, ['query' => $this->getPostData($param)]);

        return json_decode($response->getBody(), true);
    }

}
