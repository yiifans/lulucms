<?php
$cachedTables=[];
$cachedFields=[];
$cachedChannels=[];
$cachedConfigs=[];
$cachedContentFlags=[];

require(__DIR__ . '/cachedTables.php');
require(__DIR__ . '/cachedFields.php');
require(__DIR__ . '/cachedChannels.php');
require(__DIR__ . '/cachedConfigs.php');
require(__DIR__ . '/cachedContentFlags.php');

return [
	'cachedTables' => $cachedTables,
	'cachedFields' => $cachedFields,
	'cachedChannels' => $cachedChannels,
	'cachedConfigs' => $cachedConfigs,
	'cachedContentFlags' => $cachedContentFlags,
];
