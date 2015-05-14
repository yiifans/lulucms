<?php
use yii\helpers\Html;
use components\LuLu;
use yii\widgets\Breadcrumbs;
use yii\helpers\Url;
use components\helpers\TStringHelper;

?>


<div class="tbox">
	<div class="hd">
		<h2>内容管理</h2>
	</div>
	<div class="bd">
		<ul>
			<?php
			foreach($this->channels as $channel)
			{
				$txt = '';
				if($channel['is_leaf'])
				{
					$txt = '<a href="admin.php?r=content/manager&chnid=' . $channel['id'] . '" target="mainFrame">' . $channel['name'] . '</a>';
				}
				else
				{
					$txt = $channel['name'];
				}
				$txt = TStringHelper::blank($channel['level']) . $txt;
				echo '<li>' . $txt . '</li>';
			}
			?>
		
		</ul>
	</div>
</div>







