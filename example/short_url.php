<?php

require './example.php';

use Thenbsp\Wechat\Wechat\ShortUrl;

$shortUrl = new ShortUrl($accessToken);
// 推荐使用缓存（可选）
$shortUrl->setCache($cache);

try {
    $url = $shortUrl->getShortUrl('http://mp.weixin.qq.com/wiki/6/856aaeb492026466277ea39233dc23ee.html');
} catch (\Exception $e) {
    exit($e->getMessage());
}

var_dump($url);
