<?php

namespace backend\base;

use Yii;
use components\base\BaseView;
use yii\helpers\Html;

class BaseBackView extends BaseView
{
	private $labelWidth='120px';
	
	public function getDefaultFieldConfig()
	{
		return [
			'options' => ['tag' => 'tr','class' => 'form-group'],
			'template' => '<td class="hAlign_left padding_r10" width="'.$this->labelWidth.'">{label}:</td><td width="600">{input}</td><td>{hint}{error}</td>',
			'labelOptions'=>['style'=>'font-weight:normal;'],
		];
	}
	
	public function getDefaultFieldConfig2()
	{
		return [
			'options' => ['tag' => 'tr','class' => 'form-group'],
			'template' => '<td class="hAlign_left padding_r10" width="'.$this->labelWidth.'">{label}:</td><td width="750">{input}</td><td>{hint}{error}</td>',
			'labelOptions'=>['style'=>'font-weight:normal;'],
		];
	}

	public function echoButtons($model)
	{
		$buttons = Html::submitButton($model->isNewRecord ? '确定' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
		
		$str = '<tr class="form-group">
					<td class="hAlign_left padding_r10">&nbsp;</td>
					<td >'.$buttons.'</td>
					<td></td>
				</tr>';
		echo $str;
	}
	
	public function echoButtons2($model)
	{
		$buttons = Html::submitButton($model->isNewRecord ? '确定' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
	
		$str = '<div style="margin-left:'.$this->labelWidth.'">'.$buttons.'</div>';
		echo $str;
	}
}
