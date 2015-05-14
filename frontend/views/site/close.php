<?php
use frontend\assets\AppAsset;
use common\includes\CommonUtility;

AppAsset::register($this);
?>

<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
<meta charset="<?= Yii::$app->charset ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>站点关闭——<?php echo CommonUtility::getConfigValue('site_name');?></title>
</head>
<body>
	<div class="wrap">
		<div class="container" style="text-align: center; margin-top: 120px;">
			<h2>站点关闭</h2>
			<p>
				<?php echo CommonUtility::getConfigValue('site_status_message');?>
			</p>
		</div>
	</div>

</body>
</html>

