<?php

namespace common\models\content;


use yii\base\DynamicModel;
use components\LuLu;
/**
 * This is the model class for table "model_news".
 *
 * @property string $content
 * @property string $source
 */
class BaseContent extends DynamicModel
{
	public  $id;				//integer
	public  $channel_id;		//integer
	public  $user_id;			//integer
	public  $user_name;			//string
	public  $publish_time;		//string
	public  $modify_time;		//string
	public  $att1;				//integer
	public  $att2;				//integer
	public  $att3;				//integer
	public  $flag;				//integer
	public  $status;			//integer
	public  $views;				//integer
	public  $commonts;			//integer
	public  $title;				//string
	public  $title_format;		//string
	public  $title_pic;			//string
	public  $is_pic;			//integer
	public  $redirect_url;		//string
	public  $keywords;			//string
	public  $sub_title;			//string
	public  $summary;			//string
	
	
	protected $modelRules=[];
	protected $modelAttributeLabels=[];
	
    /**
     * @inheritdoc
     */
    public function rules()
    {
        $currentRules = [
            [['channel_id', 'user_id', 'user_name', 'status', 'title'], 'required'],
            [['channel_id', 'user_id', 'att1', 'att2', 'att3', 'flag', 'views', 'commonts', 'status', 'is_pic'], 'integer'],
            [['id', 'publish_time', 'modify_time'], 'safe'],
            [['user_name'], 'string', 'max' => 80],
            [['title', 'title_format', 'title_pic', 'redirect_url', 'keywords', 'sub_title'], 'string', 'max' => 128],
            [['summary'], 'string', 'max' => 512],
        ];
        
        return array_merge($currentRules,$this->modelRules);
    }

    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        $currentAttributeLabels = [
            'id' => '编号',
            'channel_id' => '频道',
            'user_id' => '用户ID',
            'user_name' => '用户名',
            'publish_time' => '发布时间',
            'modify_time' => '修改时间',
            'att1' => '属性1',
            'att2' => '属性2',
            'att3' => '属性3',
            'flag' => '聚合标签',
            'views' => '浏览数',
            'commonts' => '评论数',
            'status' => '状态',
            'title' => '标题',
            'title_format' => '标题格式',
            'title_pic' => '标题图片',
            'is_pic' => '是否图片',
            'redirect_url' => '转向连接',
            'keywords' => '关键字',
            'sub_title' => '副标题',
            'summary' => '简介',
        ];
        
        return array_merge($currentAttributeLabels,$this->modelAttributeLabels);
    }
   
    

    
    public function formName()
    {
    	return 'Content';
    }
    
    public function getDynamicAttributes()
    {
    	return parent::attributes();
    }
    
    public function attributes()
    {
    	$class = new \ReflectionClass($this);
    	$names = [];
    	foreach ($class->getProperties(\ReflectionProperty::IS_PUBLIC) as $property) {
    		if (!$property->isStatic()) {
    			$names[] = $property->getName();
    		}
    	}
    	
    	$dynamicAtts = parent::attributes();
    	
    	return array_merge($names,$dynamicAtts);
    }
    
    private $_isNewRecord=true;
    public function getIsNewRecord()
    {
    	return $this->_isNewRecord;
    }
    public function setIsNewRecord($value)
    {
    	$this->_isNewRecord=$value;
    }
}
