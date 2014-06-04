<?php
namespace TS;

use Yii;

use yii\web;
use yii\web\Controller;
use yii\helpers\VarDumper;
use yii\db\ActiveRecord;

class TActiveRecord extends ActiveRecord
{
	public static function findAll($q = null)
	{
		$query = static::createQuery();
		if (is_array($q)) {
			return $query->where($q)->all();
		} elseif ($q !== null) {
			// query by primary key
			$primaryKey = static::primaryKey();
			if (isset($primaryKey[0])) {
				return $query->where([$primaryKey[0] => $q])->all();
			} else {
				throw new InvalidConfigException(get_called_class() . ' must have a primary key.');
			}
		}
		return $query->all();
	}
	
	public function info($var)
	{
		$dump=VarDumper::dumpAsString($var);
		Yii::info($dump);
	}
}