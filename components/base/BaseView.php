<?php

namespace components\base;

use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\View;
use components\LuLu;
use common\models\Channel;
use components\widgets\InhritLayout;
use data\AttachmentAsset;

/**
 * Site controller
 */
class BaseView extends View
{
	public $cachedChannels;
	public $rootChannels;
	public $channelArrayTree;
	
	public function init()
	{
		parent::init();
	
		if($this->cachedChannels==null)
		{
			$this->cachedChannels=LuLu::getAppParam('cachedChannels');
		}
	
		if($this->rootChannels == null)
		{
			$this->rootChannels = Channel::getRootChannels();
		}
	
		if($this->channelArrayTree==null)
		{
			$this->channelArrayTree=Channel::getChannelArrayTree();
		}
		
	}
	
	public function attachment($url)
	{
		echo 'data/attachment/'.$url;
	}
	
	public function beginInhritLayout($viewFile, $params = [],$blocks=[])
	{
		return InhritLayout::begin([
				'viewFile' => $viewFile,
				'params' => $params,
				'blocks' => $blocks,
				'view' => $this,
				]);
	}
	
	/**
	 * Ends the rendering of content.
	 */
	public function endInhritLayout()
	{
		InhritLayout::end();
	}
	
	public function getCachedChannels($id=null)
	{
		$cachedChannels = LuLu::getAppParam('cachedChannels');
		if($id!==null)
		{
			return $cachedChannels[$id];
		}
		return $cachedChannels;
	}
	
	public function buildBreadcrumbs($bondId)
	{
		if(!isset($this->params['breadcrumbs']))
		{
			$this->params['breadcrumbs']=[];
		}
	
		$cachedBoards=$this->getCachedBoards();
		$board=$cachedBoards[$bondId];
		while (($parentId = $board['parent_id'])!=0)
		{
			$breadcrumbs= ['label' => $board['name'], 'url' => ['index&boardid='.$board['id']]];
				
			array_unshift($this->params['breadcrumbs'],$breadcrumbs);
				
			$board = $cachedBoards[$parentId];
		}
	
		$breadcrumbs= ['label' => $board['name'], 'url' => ['board/index&boardid='.$board['id']]];
			
		array_unshift($this->params['breadcrumbs'],$breadcrumbs);
	}
	
	public function addBreadcrumb()
	{
		$argsCount = func_num_args();
		$args = func_get_args();
	
		if ($argsCount == 1)
		{
			$this->params['breadcrumbs'][] = $args[0];
		}
		else
		if ($argsCount == 2)
		{
			$this->params['breadcrumbs'][] = [
				'label' => $args[0],
				'url' => $args[1]
			];
		}
	}
	
	private $_cachedRoles;

	public function getCachedRoles()
	{
		if ($this->_cachedRoles == null)
		{
			$this->_cachedRoles = YiiForum::getAppParam('cachedRoles');
		}
		return $this->_cachedRoles;
	}

	private $_cachedRoleGroups;

	public function getCachedRoleGroups()
	{
		if ($this->_cachedRoleGroups == null)
		{
			$this->_cachedRoleGroups = YiiForum::getAppParam('cachedRoleGroups');
		}
		return $this->_cachedRoleGroups;
	}

	private $_cachedPermissions;

	public function getCachedPermissions()
	{
		if ($this->_cachedPermissions == null)
		{
			$this->_cachedPermissions = YiiForum::getAppParam('cachedPermissions');
		}
		return $this->_cachedPermissions;
	}

	private $_cachedPermissionCategories;

	public function getCachedPermissionCategories()
	{
		if ($this->_cachedPermissionCategories == null)
		{
			$this->_cachedPermissionCategories = YiiForum::getAppParam('cachedPermissionCategories');
		}
		return $this->_cachedPermissionCategories;
	}

	private $_cachedBoards;

	public function getCachedBoards()
	{
		if ($this->_cachedBoards == null)
		{
			$this->_cachedBoards = YiiForum::getAppParam('cachedBoards');
		}
		return $this->_cachedBoards;
	}

	
}
