<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace components\widgets;

use Yii;
use yii\helpers\Html;

class ActiveForm extends \yii\widgets\ActiveForm
{

	public function init()
	{
		if (!isset($this->fieldConfig['class'])) {
			$this->fieldConfig['class'] = ActiveField::className();
		}
		parent::init();
	}
}
