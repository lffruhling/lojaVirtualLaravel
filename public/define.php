<?php

ini_set('xdebug.max_nesting_level', 500);

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

define('VERSION', '1.0');
define('CACHE_FILE', sha1(VERSION));

define('NCACHE', 'cache='.sha1(date('Ymd').VERSION));

define('PATH_UPLOAD', 'uploads/');
define('PATH_FILE', 'file/');
define('PATH_TMP', 'tmp/'.date('Ymd').'/');

define('PAGINATION_PAGES', 5);
define('PAGINATION_AUTOCOMPLETE', 30);

define('CACHE_SHORT','10');
define('CACHE_MID','60');
define('CACHE_LONG','360');
define('CACHE_DAY','1440');
define('CACHE_WEEK','1080');
define('CACHE_MONTH','43200');
