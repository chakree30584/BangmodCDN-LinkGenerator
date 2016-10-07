<?php
/**
 * This is a Example Script for Bangmod CDN Protected Link Creation
 * Specify Useragent and IP Address
 *
 * @copyright Bangmod Enterprise Co., Ltd.
 * @developer @chakree30584
 *
 */
require __DIR__ . "/../src/autoload.php";

$url = "http://cdn.bangmod.cloud/secure/test.m3u8";
$url = "http://103.27.203.15:8080/secure/test.m3u8";
$ip = "1.2.3.4";
$useragent = $_SERVER['HTTP_USER_AGENT'];
$expiry = time() + 3600;
$key = "bangmod";

$generator = new \LinkGenerator\LinkGenerator($key, $url, $expiry, $useragent, $ip);
echo $generator->getLink();