<?php

namespace backend\controllers;

use common\models\TplCover;
use common\models\search\TplCoverSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\VerbFilter;
use backend\controllers\BaseBackController;
use ts\helpers\TFileHelper;
use backend\base\BaseBackController;
/**
 * TplCoverController implements the CRUD actions for TplCover model.
 */
class TplBase extends BaseBackController
{
	public function init()
	{
		parent::init();
		$this->layout='tpl';
	}
	
	public function arrayMap($datas,$value,$lable,$params=[],$isHead=true)
	{
		$ret=[];
		foreach ($params as $k=>$v)
		{
			$ret[$k]=$v;
		}
		foreach ($datas as $row)
		{
			$ret[$row[$value]]=$row[$lable];
		}
		return $ret;
	}
	
	
}
