<?php

namespace components\base;

use Yii;
use yii\web\View;
use components\widgets\InhritLayout;
use common\includes\CommonUtility;
use yii\base\InvalidParamException;

/**
 * Site controller
 */
class BaseView extends View
{

	public $channels;

	public $rootChannels;

	public function init()
	{
		parent::init();
		
		if($this->channels == null)
		{
			$this->channels = CommonUtility::getCachedChannel();
		}
		
		if($this->rootChannels == null)
		{
			$this->rootChannels = CommonUtility::getRootChannels();
		}
	}

	public function getChannel($chnid)
	{
		if(! isset($this->channels[$chnid]))
		{
			LuLu::info('channel id:' . $chnid . ' does not exist');
			throw new InvalidParamException('channel id:' . $chnid . ' does not exist');
		}
		return $this->channels[$chnid];
	}

	public function getChildChannels($chnid)
	{
		$ret = [];
		
		$currentChannel = $this->getChannel($chnid);
		$childIds = explode(',', $currentChannel['child_ids']);
		foreach($childIds as $id)
		{
			if(empty($id))
			{
				continue;
			}
			$ret[$id] = $this->getChannel($id);
		}
		return $ret;
	}

	public function setMetaTag($name, $content)
	{
		$this->registerMetaTag(['name' => $name, 'content' => $content]);
	}

	public function beginInhritLayout($viewFile, $params = [], $blocks = [])
	{
		return InhritLayout::begin(['viewFile' => $viewFile, 'params' => $params, 'blocks' => $blocks, 'view' => $this]);
	}

	public function endInhritLayout()
	{
		InhritLayout::end();
	}

	public function addBreadcrumb()
	{
		$argsCount = func_num_args();
		$args = func_get_args();
		
		if($argsCount == 1)
		{
			$this->params['breadcrumbs'][] = $args[0];
		}
		else if($argsCount == 2)
		{
			$this->params['breadcrumbs'][] = ['label' => $args[0], 'url' => $args[1]];
		}
	}
}
