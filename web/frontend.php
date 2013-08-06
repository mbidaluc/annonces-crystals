<?php
use Applications\Frontend\FrontendApplication;
use Applications\Mobile\MobileApplication;
use Library\MobileDetect\MobileDetect;

//dirname(__FILE__).
//require 'Library/autoload.php';
require dirname(__FILE__).'/../Library/autoload.php';

$device =  new MobileDetect();

if($device->isMobile() || $device->isTablet())
    $app = new MobileApplication;
else
    $app = new FrontendApplication;
$app->run();
?>
