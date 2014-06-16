<?php 

use yii\helpers\Html;

$this->beginContent('@app/views/layouts/main.php');
?>

<table class="table">
  <tr>
    <td width="200px">
    	<div class="tbox">
			<div class="hd">
				<h2>频道管理</h2>
			</div>
			<div class="bd">
				<ul>
					<li><?= Html::a('频道管理', ['channel/index']) ?></li>
				</ul>
			</div>
		</div>
	

    </td>
    <td><?= $content ?></td>
  </tr>
</table>

<?php $this->endContent();?>