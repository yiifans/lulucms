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


/**
 * Site controller
 */
class BaseBackView extends BaseView
{
	public function getCachedChannels($id=null)
	{
		$cachedChannels = LuLu::getAppParam('cachedChannels');
		if($id!==null)
		{
			return $cachedChannels[$id];
		}
		return $cachedChannels;
	}

	public function buildBreadcrumbs($bondId)
	{
		if(!isset($this->params['breadcrumbs']))
		{
			$this->params['breadcrumbs']=[];
		}
		
		
		$cachedBoards=$this->getCachedBoards();
		$board=$cachedBoards[$bondId];
		while (($parentId = $board['parent_id'])!=0)
		{
			$breadcrumbs= ['label' => $board['name'], 'url' => ['index&boardid='.$board['id']]];
			
			array_unshift($this->params['breadcrumbs'],$breadcrumbs);
			//$this->params['breadcrumbs'][] = ['label' => $board['name'], 'url' => ['index&boardid='.$board['id']]];
			
			$board = $cachedBoards[$parentId];
		}
		
		$breadcrumbs= ['label' => $board['name'], 'url' => ['board/index&boardid='.$board['id']]];
			
		array_unshift($this->params['breadcrumbs'],$breadcrumbs);
	}
}
