<?php

/**
 * This is a PHP library that handles Bangmod CDN Protected Link Creation
 *
 * @copyright Bangmod Enterprise Co., Ltd.
 * @developer @chakree30584
 *
 */

namespace LinkGenerator;

class LinkGenerator {

    /**
     * Version of this client library.
     * @const string
     */
    const VERSION = 'php_1.0.0';

    /**
     * Shared secret for the site.
     * @var string
     */
    private $key;
    private $url;
    private $expiry;
    private $useragent;
    private $ip;

    /**
     * Create a configured instance to use the Bangmod CDN Protected Link
     *
     * @param string $key shared key between you and Bangmod CDN server.
     * @param string $url the URL of .m3u8 HLS Playlist on Bangmod CDN Server.
     * @param timestamp $expiry is the expiry time of generated URL.
     * @param string $useragent the Browser User Agent String. Defaults to Requested Client.
     * @param string $ip the IP Address of Allowed Client. Defaults to Requested Client.
     * @throws \RuntimeException if params is invalid
     */
    public function __construct($key, $url, $expiry, $useragent = null, $ip = null) {
        if (empty($key)) {
            throw new \RuntimeException('No Key provided');
        }

        if (!is_string($key)) {
            throw new \RuntimeException('The provided Key must be a string');
        }
        $this->key = $key;

        if (empty($url)) {
            throw new \RuntimeException('No URL provided');
        }

        if (!is_string($url)) {
            throw new \RuntimeException('The provided URL must be a string');
        }
        $this->url = $url;

        $timestampchecker = new TimestampChecker();
        if (empty($expiry)) {
            throw new \RuntimeException('No URL provided');
        }

        if (!$timestampchecker->isTimestamp($expiry)) {
            throw new \RuntimeException('The provided Timestamp must be valid');
        }
        $this->expiry = $expiry;

        if (!is_null($useragent)) {
            $this->useragent = $useragent;
        } else {
            $this->useragent = $_SERVER['HTTP_USER_AGENT'];
        }

        if (!is_null($ip)) {
            $this->ip = $ip;
        } else {
            $this->ip = $_SERVER['REMOTE_ADDR'];
        }
    }

    public function getLink() {
        $encryptor = new Encryptor();
        $plaintoken = $this->ip . $this->useragent. $this->expiry . " " . $this->key;
        $encryptedToken = $encryptor->encrypt($plaintoken);
        return $this->url."?t=".Base64Url::encode($encryptedToken)."&e=".$this->expiry;
    }

}
