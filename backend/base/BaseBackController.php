<?php

namespace backend\base;

use Yii;
use yii\web;
use yii\web\Controller;
use yii\helpers\VarDumper;
use app\controllers\CatalogController;
use TS\TController;
use common\models\Catalog;
use common\models\DefineModel;
use common\models\DefineTable;
use common\models\Channel;
use components\base\BaseController;
use components\LuLu;
use yii\filters\VerbFilter;
use components\helpers\TFileHelper;

class BaseBackController extends BaseController
{
}