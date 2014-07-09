<?php 

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use components\widgets\InhritLayout;

$this->beginInhritLayout('@app/views/layouts/main.php');
?>

<?php $this->beginBlock('leftMenu');?>    

<?php $this->endBlock()?>

<?php echo $content ?>

<?php $this->endInhritLayout();?>

