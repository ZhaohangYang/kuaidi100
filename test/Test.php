<?php
/*
 * @Author: ZhaohangYang <yangzhaohang@comsenz-service.com>
 * @Date: 2021-04-16 17:09:03
 * @Description: 伙伴智慧大客户研发部
 */

require_once __DIR__ . '/../vendor/autoload.php';

use Kuaidi100\Models\Syncquery;

//参数设置
$key      = ''; //客户授权key
$customer = ''; //查询公司编号

$syncquery = new Syncquery($key, $customer);

$param = array(
    'com' => 'yuantong', //快递公司编码
    'num' => 'YT9526943311350', //快递单号
);

$data = $synquery->get($param);
print_r($data);exit;
