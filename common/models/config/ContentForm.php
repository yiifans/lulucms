<?php

namespace common\models\config;

use Yii;
use yii\base\Model;
use common\models\Config;
use components\LuLu;

/**
 * LoginForm is the model behind the login form.
 */
class ContentForm extends BaseForm
{
	protected $scope="content";
	
	public $content_att1_label;
	public $content_att2_label;
	public $content_att3_label;
	
	public $content_att1_name;
	public $content_att2_name;
	public $content_att3_name;
	

	/**
	 * @return array the validation rules.
	 */
	public function rules()
	{
		return [
			[['content_att1_label','content_att2_label','content_att3_label','content_att1_name', 'content_att2_name', 'content_att3_name'], 'string'],
		];
	}

	public function attributeLabels()
	{
		return [
			'content_att1_label' => '属性1标签',
			'content_att2_label' => '属性2标签',
			'content_att3_label' => '属性3标签',
			'content_att1_name' => '属性1名称',
			'content_att2_name' => '属性2名称',
			'content_att3_name' => '属性3名称',
		];
	}
	
	private function checkName($value)
	{
		LuLu::info($value,__METHOD__);
		
		$ret=[];
		
		$level=['一','二','三','四','五','六','七','八','九'];
		
		$items = explode("\r\n", $value);
	
		for($i = 0; $i<9; $i++)
		{
			if(isset($items[$i])&&!empty($items[$i]))
			{
				$ret[]=$items[$i];
			}
			else
			{
				$ret[]= ($level[$i].'级属性');
			}
		}
		
		return implode("\r\n", $ret);
	}
	
	public function save()
	{
		$attributes = $this->getAttributes();
		
		foreach ($attributes as $name=>$value)
		{
			if($name=='content_att1_name'||$name=='content_att2_name'||$name=='content_att3_name')
			{
				$value = $this->checkName($value);
			}
			
			$this->saveItem($name, $value);
		}
	}	
}
