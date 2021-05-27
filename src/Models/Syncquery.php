<?php
/*
 * @Author: ZhaohangYang <yangzhaohang@comsenz-service.com>
 * @Date: 2021-04-16 17:06:57
 * @Description: 伙伴智慧大客户研发部
 */

namespace Kuaidi100\Models;

use Kuaidi100\Kuaidi100;

/**
 * 快递同步查询类
 */
class Syncquery extends Kuaidi100
{

    public function __construct($key, $customer)
    {
        parent::__construct($key, $customer);
    }

    /**
     * 根据查询参数获取当前快递信息
     *
     * @param [array] $param
     * @return json
     */
    public function get(array $param)
    {
        $url      = '/poll/query.do'; //实时查询请求地址
        $response = $this->client->request('POST', $url, ['query' => $this->getPostData($param)]);

        return json_decode($response->getBody(), true);
    }
}
