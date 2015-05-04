<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace components\widgets;

use Yii;
use yii\helpers\Html;

class Breadcrumbs extends \yii\widgets\Breadcrumbs
{

	public $separator = '<li>></li>';

	public function run()
	{
		if(empty($this->links))
		{
			return;
		}
		$links = [];
		if($this->homeLink === null)
		{
			$links[] = $this->renderItem(['label' => Yii::t('yii', 'Home'), 'url' => Yii::$app->homeUrl], $this->itemTemplate);
		}
		elseif($this->homeLink !== false)
		{
			$links[] = $this->renderItem($this->homeLink, $this->itemTemplate);
		}
		foreach($this->links as $link)
		{
			if(! is_array($link))
			{
				$link = ['label' => $link];
			}
			$links[] = $this->renderItem($link, isset($link['url']) ? $this->itemTemplate : $this->activeItemTemplate);
		}
		echo Html::tag($this->tag, implode($this->separator, $links), $this->options);
	}
}
