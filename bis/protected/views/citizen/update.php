<?php
/* @var $this CitizenController */
/* @var $model Citizen */

$this->breadcrumbs=array(
	'Citizens'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Citizen', 'url'=>array('index')),
	array('label'=>'Create Citizen', 'url'=>array('create')),
	array('label'=>'View Citizen', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Citizen', 'url'=>array('admin')),
);
?>

<h1>Update Citizen <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>