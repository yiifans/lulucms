<?php
namespace backend\base;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use components\base\BaseView;
use components\LuLu;
use common\models\Channel;
use yii\helpers\Html;


/**
 * Site controller
 */
class BaseBackView extends BaseView
{
	public function getDefaultFieldConfig()
	{
		return [
			'options' => ['tag' => 'tr','class' => 'form-group'],
			'template' => '<td class="hAlign_left padding_r10" width="150">{label}:</td><td width="300">{input}</td><td>{hint}{error}</td>',
		];
	}
	

	public function echoButtons($model)
	{
		$buttons = Html::submitButton($model->isNewRecord ? '确定' : '保存', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']);
		
		$str = '<tr class="form-group">
					<td class="hAlign_left padding_r10" width="150">&nbsp;</td>
					<td width="300">'.$buttons.'</td>
					<td></td>
				</tr>';
		echo $str;
	}
}
