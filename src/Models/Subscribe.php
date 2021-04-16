<?php

namespace Kuaidi100\Models;

use GuzzleHttp\Client;
use Kuaidi100\Kuaidi100;

class Subscribe extends Kuaidi100
{
    public $client;
    public function __construct($key, $customer)
    {
        parent::__construct($key, $customer);
        $this->client = new Client(['timeout' => 5.0]);
    }

    public function get($param)
    {
        $url      = 'https://poll.Kuaidi100.com/poll'; //订阅
        $response = $this->client->request('POST', $url, ['query' => $this->getPostData($param)]);

        return json_decode($response->getBody(), true);
    }

}
