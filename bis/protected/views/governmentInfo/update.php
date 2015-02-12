<?php
/* @var $this GovernmentInfoController */
/* @var $model GovernmentInfo */

$this->breadcrumbs=array(
	'Government Infos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List GovernmentInfo', 'url'=>array('index')),
	array('label'=>'Create GovernmentInfo', 'url'=>array('create')),
	array('label'=>'View GovernmentInfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage GovernmentInfo', 'url'=>array('admin')),
);
?>

<h1>Update GovernmentInfo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>