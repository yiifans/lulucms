<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->params['breadcrumbs'][] = ['label' => '返回上级', 'url' => ['index', 'currentdir' => $parentDir], ['target' => 'mainFrame']];

?>

<div class="filemanager-default-index">

    <?php $form = ActiveForm::begin(['action'=>['create']]);?>
    <input type="hidden" name="currentDir"
		value="<?php echo $currentDir?>">
	<table class="table">
		<tr class="form-group">
			<td class="hAlign_right padding_r10">当前目录:<?php echo $currentDir?></td>
			<td width="150px"><input type="text" class="form-control"
				name="dirName" maxlength="256"></td>
			<td width="120px">
			    <?= Html::submitButton('新建文件夹', ['class' => 'btn btn-primary'])?>
			</td>
			<td width="120px"><?php echo Html::a('新建文件', ['edit-file', 'currentdir' => $currentDir], ['target' => 'mainFrame','class' => 'btn btn-primary']);?></td>
		</tr>
	</table>
	<?php ActiveForm::end();?>

	<table class="table">
		<tr>
			<th>目录</th>
			<th width="120">操作</th>
		</tr>
    <?php
		foreach($files as $file)
		{
			if($file == '.' || $file == '..')
			{
				continue;
			}
			
			$tempDirFullPath = $basePath;
			if(! empty($currentDir) && $currentDir !== DIRECTORY_SEPARATOR)
			{
				$tempDirFullPath .= DIRECTORY_SEPARATOR . $currentDir;
			}
			$tempDirFullPath .= DIRECTORY_SEPARATOR . $file;
			
			$action = is_dir($tempDirFullPath) ? 'index' : 'edit-file';
			$editAction = is_dir($tempDirFullPath) ? 'edit-dir' : 'edit-file';
	?>
		<tr>
			<td><?php echo Html::a($file, [$action, 'currentdir' => $currentDir, 'name'=>$file], ['target' => 'mainFrame']) ?></td>
			<td>
			<?php echo Html::a('编辑', [$editAction, 'currentdir' => $currentDir, 'name'=>$file], ['target' => 'mainFrame'])?>
			<?php echo Html::a('删除', ['delete', 'currentdir' => $currentDir, 'name' => $file], [
						'data-confirm' => Yii::t('app', 'Are you sure to delete this item?'), 
						'data-method' => 'post', 
						'target' => 'mainFrame']);
			?>
			</td>
		</tr>
	<?php
		}
	?>
   </table>
</div>
