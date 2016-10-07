# Bangmod Cloud CDN Protected Link PHP client library
* Version: 1.0.0
* **Author**: Chakree Kaewchai
* **Copyright**: Bangmod Enterprise Co., Ltd.

## Installation

clone the repo or download
the [ZIP file](https://github.com/chakree30584/BangmodCDN-LinkGenerator/archive/master.zip). For
convenience, an autoloader script is provided in `src/autoload.php` which you
can require into your script. For
example:

```php
require('/path/to/BangmodCDN-LinkGenerator/src/autoload.php');
$generator = new \LinkGenerator\LinkGenerator($key, $url, $expiry);
```

The classes in the project are structured according to the
[PSR-4](http://www.php-fig.org/psr/psr-4/) standard, so you may of course also
use your own autoloader or require the needed files directly in your code.

## Usage

```php
<?php

$url = "http://cdn.bangmod.cloud/secure/test.m3u8";
$expiry = time() + 3600; #expiry 1 hour later
$key = "bangmod";

$generator = new \LinkGenerator\LinkGenerator($key, $url, $expiry);
echo $generator->getLink();
```

working example are in  
Auto Detect IP and Useragent : [examples/example-auto.php](examples/example-auto.php)  
Specify IP and Useragent : [examples/example.php](examples/example.php)  