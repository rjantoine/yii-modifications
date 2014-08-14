<?php

// change the following paths if necessary
$yii=dirname(__FILE__).'/protected/vendor/yiisoft/yii/framework/yii.php';
switch ($_SERVER['SERVER_NAME']) {
	case "local.smiletime":
		$config=dirname(__FILE__).'/protected/config/server_local.php';
		break;
	default:
		$config=dirname(__FILE__).'/protected/config/main.php';
		break;
}


// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',true);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);
require_once(__DIR__.'/protected/vendor/autoload.php');
require_once($yii);
Yii::createWebApplication($config)->run();