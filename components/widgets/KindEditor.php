<?php

namespace components\widgets;

use yii\web\View;

class KindEditor extends BaseWidget
{

	public $kindUrl = 'static/common/libs/kindeditor';

	public $input = null;
	
	public $editorId = null;

	public $defaultParams = [
		'allowFileManager' => 'true'
	];

	public function init()
	{
	}

	public function run()
	{
		$view = $this->view;
		
		if(! isset($view->params['__kindeditor']))
		{
			$view->registerCssFile($this->kindUrl . '/themes/default/default.css');
			$view->registerJsFile($this->kindUrl . '/kindeditor-min.js');
			$view->registerJsFile($this->kindUrl . '/lang/zh_CN.js');
			
			$view->params['__kindeditor'] = true;
		}
		
		if($this->input === null)
		{
			$this->input = '#' . $this->id;
		}
		
		if($this->editorId === null)
		{
			$this->editorId = 'editor_' . str_replace('-', '_', $this->id);
		}
		
		$this->params = array_merge($this->defaultParams, $this->params);
		
		$editorParmas = '';
		foreach($this->params as $name => $value)
		{
			$editorParmas .= $name . ' : ' . $value . ",\r\n";
		}
		
		$js = <<<JS
			var $this->editorId;
			KindEditor.ready(function(K) {
				$this->editorId = K.create('$this->input', {
					$editorParmas
				});
			});
JS;
		$view->registerJs($js, View::POS_END);
	}
}
