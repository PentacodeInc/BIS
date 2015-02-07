<?php
/* @var $this CitizenController */
/* @var $model Citizen */

$this->breadcrumbs=array(
	'Citizens'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Citizen', 'url'=>array('index')),
	array('label'=>'Manage Citizen', 'url'=>array('admin')),
);
?>

<h1>Create Citizen</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>