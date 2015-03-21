<?php
/* @var $this OfficialController */
/* @var $model Official */

$this->breadcrumbs=array(
	'Officials'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Official', 'url'=>array('index')),
	array('label'=>'Create Official', 'url'=>array('create')),
	array('label'=>'View Official', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Official', 'url'=>array('admin')),
);
?>

<h1>Update</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>