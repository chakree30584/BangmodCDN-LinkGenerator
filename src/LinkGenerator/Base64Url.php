<?php
/**
 * This is a PHP library that escape string from base64 generated string for URL
 *
 * @copyright Bangmod Enterprise Co., Ltd.
 * @developer @chakree30584
 *
 */
namespace LinkGenerator;
class Base64Url {

    public static function encode($data) {
        return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
    }

    public static function decode($data) {
        return base64_decode(str_pad(strtr($data, '-_', '+/'), strlen($data) % 4, '=', STR_PAD_RIGHT));
    }

}
?>