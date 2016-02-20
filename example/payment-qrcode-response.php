<?php

require './example.php';

use Thenbsp\Wechat\Payment\Unifiedorder;
use Thenbsp\Wechat\Payment\Qrcode\RequestContext;

/**
 * 一、验证请求：正常情部下请求中包含 appid, openid, mch_id, is_subscribe, nonce_str, product_id, sign
 */
$request = new RequestContext();

if( !$request->isValid() ) {
    $request->fail('Invalid Request');
}

/**
 * 二、统一下单：根据请求中的 $request['product_id'] 去数据库查找订单信息并下单
 */
$unifiedorder = new Unifiedorder(APPID, MCHID, MCHKEY);
$unifiedorder->set('body',          '微信支付测试商品');
$unifiedorder->set('total_fee',     1);
$unifiedorder->set('out_trade_no',  date('YmdHis').mt_rand(10000, 99999));
$unifiedorder->set('notify_url',    'http://dev.funxdata.com/wechat/example/payment-unifiedorder.php');

/**
 * 三、响应订单：将订单响应至微信客户端（XML 格式）
 */
$request->success($unifiedorder);
