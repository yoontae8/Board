<?php 

#db
define('DB_USER', 'ryangwa');
define('DB_NAME', 'ryangwa');
define('DB_PASSWORD', 'skfkzk28()');

//define('DB_ADDR', '172.30.1.20');
define('DB_ADDR', 'ryangwa.ddns.net');
define('DB_PORT', '13306');

// currentPath includes '/' at trail
define('DS', DIRECTORY_SEPARATOR);
$currentPath = __FILE__;
$currentPath = substr($currentPath, 0, strrpos($currentPath, DS));

$httproot = '/ryangwa/board';
define ('HTTPROOT', $httproot);

define ('APIROOT', $currentPath);
define ('JSROOT', HTTPROOT.'/public/js');
define ('CSSROOT', HTTPROOT.'/public/css');
define ('IMGROOT', HTTPROOT.'/public/img');

?>
