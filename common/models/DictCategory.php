<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "yii_dict_category".
 *
 * @property string $id
 * @property string $name
 * @property boolean $is_sys
 * @property string $note
 */
class DictCategory extends \components\base\BaseActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'yii_dict_category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            [['id'], 'unique'],
            [['is_sys'], 'boolean'],
            [['id', 'name'], 'string', 'max' => 64],
            [['note'], 'string', 'max' => 512]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '缓存Key',
            'name' => '名称',
            'is_sys' => '系统分类',
            'note' => '备注',
        ];
    }
    
    public function checkExist()
    {
    	if($this->isNewRecord||$this->id!=$this->oldAttributes['id'])
    	{
    		$ret = DictCategory::findOne($this->id);
    		return $ret!==null;
    	}
    	return false;
    }
}
