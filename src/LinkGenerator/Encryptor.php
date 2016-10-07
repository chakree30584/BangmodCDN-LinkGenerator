<?php

/**
 * This is a PHP library that encrypted the Token for Bangmod CDN Protected URL
 *
 * @copyright Bangmod Enterprise Co., Ltd.
 * @developer @chakree30584
 *
 */

namespace LinkGenerator;

class Encryptor {

    function encrypt($token) {
        return md5($token, true);
    }

}

?>