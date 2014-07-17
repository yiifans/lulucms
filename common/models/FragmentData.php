<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_fragment1_data".
 *
 * @property integer $id
 * @property integer $fragment_id
 */
class FragmentData extends \components\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '';
    }

	public function getFragment()
    {
    	return $this->hasOne(Fragment::className(), ['id' => 'fragment_id']);
    }
}
