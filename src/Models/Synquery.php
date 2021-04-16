<?php

namespace Kuaidi100\Models;

use GuzzleHttp\Client;
use Kuaidi100\Kuaidi100;

class Synquery extends Kuaidi100
{
    public $client;
    public function __construct($key, $customer)
    {
        parent::__construct($key, $customer);
        $this->client = new Client(['timeout' => 5.0]);
    }

    public function get($param)
    {
        $url      = 'http://poll.Kuaidi100.com/poll/query.do'; //实时查询请求地址
        $response = $this->client->request('POST', $url, ['query' => $this->getPostData($param)]);

        return json_decode($response->getBody(), true);
    }
}
