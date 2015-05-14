<?php

namespace components\base;

use Yii;
use yii\base\Action;

/**
 * Site controller
 */
class BaseAction extends Action
{

	public $channels;

	public $rootChannels;

	public function init()
	{
		parent::init();
		
		$this->channels = $this->controller->channels;
		$this->rootChannels = $this->controller->rootChannels;
	}

	public function getChannel($chnid)
	{
		return $this->controller->getChannel($chnid);
	}

	public function getChildChannels($chnid)
	{
		return $this->controller->getChildChannels($chnid);
	}

	public function render($view, $params = [])
	{
		return $this->controller->render($view, $params);
	}

	public function redirect($url, $statusCode = 302)
	{
		return $this->controller->redirect($url, $statusCode);
	}
}
