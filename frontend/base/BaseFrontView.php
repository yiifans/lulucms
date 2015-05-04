<?php

namespace frontend\base;

use Yii;
use components\base\BaseView;
use yii\base\Theme;
use common\includes\CommonUtility;

class BaseFrontView extends BaseView
{

	public function init()
	{
		$currentTheme = CommonUtility::getCurrentTheme();
		
		$theme = '@app/themes/' . $currentTheme;
		
		$config = [
			'pathMap' => [
				'@app/views' => [
					$theme, 
					'@app/themes/basic'
				], 
				'@app/modules' => $theme . '/modules', 
				'@app/widgets' => $theme . '/widgets'
			], 
			'baseUrl' => '@web/themes/basic'
		];
		
		$this->theme = new Theme($config);
		
		parent::init();
	}

	public function setTitle($title, $append = true)
	{
		$this->title = $title;
		if($append == true)
		{
			$this->title .= '——' . CommonUtility::getCachedConfigValue('site_name');
		}
		else if(is_string($append))
		{
			$this->title .= $append;
		}
	}

	public function buildBreadcrumbs($chnid)
	{
		if(! isset($this->params['breadcrumbs']))
		{
			$this->params['breadcrumbs'] = [];
		}
		
		$channel = $this->getChannel($chnid);
		
		while(($parentId = $channel['parent_id']) != 0)
		{
			$actionId = $channel['is_leaf'] ? 'list' : 'channel';
			$breadcrumbs = ['label' => $channel['name'], 'url' => [$actionId, 'chnid' => $channel['id']]];
			
			array_unshift($this->params['breadcrumbs'], $breadcrumbs);
			
			$channel = $this->getChannel($parentId);
		}
		
		$breadcrumbs = ['label' => $channel['name'], 'url' => ['channel', 'chnid' => $channel['id']]];
		
		array_unshift($this->params['breadcrumbs'], $breadcrumbs);
	}
}
