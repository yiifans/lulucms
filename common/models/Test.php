<?php

namespace common\models;

/**
 * This is the model class for table "test".
 *
 * @property integer $q
 * @property string $w
 * @property string $e
 * @property string $r
 */
class Test extends \yii\db\ActiveRecord
{
	/**
	 * @inheritdoc
	 */
	public static function tableName()
	{
		return 'test';
	}

	/**
	 * @inheritdoc
	 */
	public function rules()
	{
		return [
			[['w', 'e', 'r'], 'required'],
			[['w', 'e', 'r'], 'string']
		];
	}

	/**
	 * @inheritdoc
	 */
	public function attributeLabels()
	{
		return [
			'q' => 'Q',
			'w' => 'W',
			'e' => 'E',
			'r' => 'R',
		];
	}
}
