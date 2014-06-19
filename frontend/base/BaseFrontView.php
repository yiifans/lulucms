<?php
namespace frontend\base;

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
class BaseFrontView extends BaseView
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

	public function buildBreadcrumbs($chnid)
	{
		if(!isset($this->params['breadcrumbs']))
		{
			$this->params['breadcrumbs']=[];
		}
		
		$cachedChannels=$this->getCachedChannels();
		LuLu::info($cachedChannels);
		
		$channel=$cachedChannels[$chnid];
		
		while (($parentId = $channel['parent_id'])!=0)
		{
			$breadcrumbs= ['label' => $channel['name'], 'url' => ['list','chnid'=>$channel['id']]];
			
			array_unshift($this->params['breadcrumbs'],$breadcrumbs);
			//$this->params['breadcrumbs'][] = ['label' => $board['name'], 'url' => ['index&boardid='.$board['id']]];
			
			$channel = $cachedChannels[$parentId];
		}
		
		$breadcrumbs= ['label' => $channel['name'], 'url' => ['channel','chnid'=>$channel['id']]];
			
		array_unshift($this->params['breadcrumbs'],$breadcrumbs);
	}
}
