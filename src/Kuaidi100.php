<?php

namespace Kuaidi100;

class Kuaidi100
{
    //参数设置
    private $key, $customer;

    public function __construct($key, $customer)
    {

        $this->key      = $key; //客户授权key
        $this->customer = $customer; //查询公司编号
    }

    public function getSign($post_data = [])
    {
        $sign = md5($post_data["param"] . $this->key . $post_data["customer"]);
        return strtoupper($sign);
    }

    public function getPostData($param = [])
    {
        $post_data             = [];
        $post_data["customer"] = $this->customer;
        $post_data["param"]    = json_encode($param);
        $post_data["sign"]     = $this->getSign($post_data);

        return $post_data;
    }
}
