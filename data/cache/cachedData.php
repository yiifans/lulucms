<?php
$cachedTables=[];
$cachedFields=[];
$cachedChannels=[];
$cachedConfigs=[];
$cachedContentFlags=[];
$cachedVariables=[];
$cachedDicts=[];

require(__DIR__ . '/cachedTables.php');
require(__DIR__ . '/cachedFields.php');
require(__DIR__ . '/cachedChannels.php');
require(__DIR__ . '/cachedConfigs.php');
require(__DIR__ . '/cachedContentFlags.php');
require(__DIR__ . '/cachedVariables.php');
require(__DIR__ . '/cachedDicts.php');

return [
	'cachedTables' => $cachedTables,
	'cachedFields' => $cachedFields,
	'cachedChannels' => $cachedChannels,
	'cachedConfigs' => $cachedConfigs,
	'cachedContentFlags' => $cachedContentFlags,
	'cachedVariables' => $cachedVariables,
	'cachedDicts' => $cachedDicts,
];
