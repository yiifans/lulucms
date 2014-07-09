<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace ts\widgets;

use yii\base\InvalidConfigException;
use yii\base\Widget;


class TArea extends TBaseWidget
{
	
	public $viewFile;
	
	public $params = [];

	/**
	 * Starts recording a clip.
	 */
	public function init()
	{
		if ($this->viewFile === null) {
			throw new InvalidConfigException('TArea::viewFile must be set.');
		}
		ob_start();
		ob_implicit_flush(false);
	}

	/**
	 * Ends recording a clip.
	 * This method stops output buffering and saves the rendering result as a named clip in the controller.
	 */
	public function run()
	{
		$params = $this->params;
		$params['content'] = ob_get_clean();
		foreach ($this->view->blocks as $name => $value)
		{
			$params[$name]=$value;
		}
		
		// render under the existing context
		echo $this->view->renderFile($this->viewFile, $params);
	}
}
