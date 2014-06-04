<?php

namespace common\models;

use TS\TActiveRecord;
use components\base\BaseActiveRecord;
/**
 * This is the model class for table "yii_catalog".
 *
 * @property integer $id
 * @property integer $parent_id
 * @property string $name_en
 * @property string $name_zh
 * @property string $redirect_url
 * @property boolean $is_end
 * @property boolean $is_nav
 * @property integer $sort_num
 * @property integer $model_id
 * @property string $tpl_page
 * @property string $tpl_list
 * @property string $tpl_content
 * @property integer $page_size
 * @property string $note
 * @property string $note2
 */
class Content extends BaseActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'ttbb';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [];
	}
	
	
}
