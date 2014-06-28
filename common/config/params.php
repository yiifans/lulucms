<?php
$params = [
    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'user.passwordResetTokenExpire' => 3600,
    'dataType' => [
		'0'=>'字符串',
		'1'=>'数字',
		'2'=>'布尔型',
		'3'=>'日期',
		'4'=>'数组',
		'5'=>'JSON',
	],
];
$params = array_merge(
		$params,
		require(__DIR__ . '/../../data/cache/cachedData.php')
);

return $params;