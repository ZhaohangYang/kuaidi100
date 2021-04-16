<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Kuaidi100\Models\Synquery;

//参数设置
$key      = ''; //客户授权key
$customer = ''; //查询公司编号

$synquery = new Synquery($key, $customer);

$param = array(
    'com' => 'yuantong', //快递公司编码
    'num' => 'YT9526943311350', //快递单号
);

$data = $synquery->get($param);
print_r($data);exit;
