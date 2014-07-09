<?php
	
$cachedTables=[];
$cachedFields=[];
$cachedChannels=[];

require(__DIR__ . '/cachedTables.php');
require(__DIR__ . '/cachedFields.php');
require(__DIR__ . '/cachedChannels.php');

return [
	'cachedTables' => $cachedTables,
	'cachedFields' => $cachedFields,
	'cachedChannels' => $cachedChannels,
];
