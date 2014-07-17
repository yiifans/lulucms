<?php


return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
	  'assetManager' => [
		'basePath' => '@webroot/static/assets',
		'baseUrl'=>'@web/static/assets',
	      'bundles' => [
	          // you can override AssetBundle configs here
	      ],
	      //'linkAssets' => true,
	      // ...
	  ]
    ],
];
