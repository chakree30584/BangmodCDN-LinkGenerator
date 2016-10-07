<?php
/**
 * This is a Example Script for Bangmod CDN Protected Link Creation
 * Without specify Useragent and IP Address (Auto Detected By Requested Client)
 *
 * @copyright Bangmod Enterprise Co., Ltd.
 * @developer @chakree30584
 *
 */
require __DIR__ . "/../src/autoload.php";

$url = "http://cdn.bangmod.cloud/secure/test.m3u8";
$url = "http://103.27.203.15:8080/secure/test.m3u8";
$expiry = time() + 3600;
$key = "bangmod";

$generator = new \LinkGenerator\LinkGenerator($key, $url, $expiry);
echo $generator->getLink();