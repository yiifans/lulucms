<?php

namespace common\models;

use Yii;


class CommonData extends \components\base\BaseModel
{
	public function getStatus()
	{
		$ret=[];
		$ret['0']='草稿';
		$ret['1']='发布';
		return $ret;
	}
   
  
}
