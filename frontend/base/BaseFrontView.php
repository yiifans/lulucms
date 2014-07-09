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
use yii\base\Theme;
use yii\helpers\Html;
use yii\helpers\Url;
use components\helpers\TStringHelper;


/**
 * Site controller
 */
class BaseFrontView extends BaseView
{
	public $currentTheme='default';
	
	public function init()
	{
		$basicTheme='@app/themes/basic';
		
		$theme = '@app/themes/'.$this->currentTheme;
		
		$config = [
            'pathMap' => [
            	'@app/views' => [
            		$theme,
            		$basicTheme,
				],
            	'@app/modules' => $theme.'/modules',
            	'@app/widgets' => $theme.'/widgets'
			],
            'baseUrl' => '@web/themes/basic',
        ];
		
		$this->theme = new Theme($config);
		
		parent::init();
	}
	
	public function getCachedChannels($id=null)
	{
		$cachedChannels = LuLu::getAppParam('cachedChannels');
		if($id!==null)
		{
			return $cachedChannels[$id];
		}
		return $cachedChannels;
	}

	public function getChannelUrl($id,$options=[])
	{
		$cachedChannels = LuLu::getAppParam('cachedChannels');
		$channel = $cachedChannels[$id];
				
		$actionId = $channel['is_leaf']? 'list' : 'channel';
		
		if($options===false)
		{
			return Url::to(['content/'.$actionId,'chnid'=>$id]);
		}
		
		if(isset($options['title']))
		{
			$title = $options['title'];
			unset($options['title']);
		}
		else
		{
			$title = $channel['name'];
		}
		
		return Html::a($title,['content/'.$actionId,'chnid'=>$id],$options);
		
	}
	public function getContentUrl($row,$length=0,$options=[])
	{
		if($options===false)
		{
			return Url::to(['content/detail','id'=>$row['id'],'chnid'=>$row['channel_id']]);
		}
		
		if(isset($options['title']))
		{
			$title = $options['title'];
			unset($options['title']);
		}
		else 
		{
			$title = $row['title'];
		}
		
		if($length>1)
		{
			$title=TStringHelper::subStr($title,$length);
		}
		
		return Html::a($title,['content/detail','id'=>$row['id'],'chnid'=>$row['channel_id']],$options);
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
			$actionId = $channel['is_leaf']?'list':'channel';
			$breadcrumbs= ['label' => $channel['name'], 'url' => [$actionId,'chnid'=>$channel['id']]];
			
			array_unshift($this->params['breadcrumbs'],$breadcrumbs);
			
			$channel = $cachedChannels[$parentId];
		}
		
		$breadcrumbs= ['label' => $channel['name'], 'url' => ['channel','chnid'=>$channel['id']]];
			
		array_unshift($this->params['breadcrumbs'],$breadcrumbs);
	}
}
