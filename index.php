<?php
use common\includes\CommonUtility;
defined('YII_DEBUG') or define('YII_DEBUG', true);
defined('YII_ENV') or define('YII_ENV', 'dev');

require (__DIR__ . '/vendor/autoload.php');
require (__DIR__ . '/vendor/yiisoft/yii2/Yii.php');
require (__DIR__ . '/common/config/bootstrap.php');
require (__DIR__ . '/frontend/config/bootstrap.php');

require (__DIR__ . '/common/config/autoload.php');

$config = yii\helpers\ArrayHelper::merge(
		require(__DIR__ . '/common/config/main.php'),
		require(__DIR__ . '/common/config/main-local.php'),
		require(__DIR__ . '/frontend/config/main.php'),
		require(__DIR__ . '/frontend/config/main-local.php')
);

$application = new yii\web\Application($config);
$application->language = 'zh-CN';
$siteStatus = CommonUtility::getCachedConfigValue('site_status');
if($siteStatus === '0')
{
	$application->catchAll = ['site/close', 'message' => 'test'];
}
$application->run();

