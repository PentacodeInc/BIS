<?php
/* @var $this StreetController */
/* @var $model Street */

$this->breadcrumbs=array(
	'Streets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Street', 'url'=>array('index')),
	array('label'=>'Manage Street', 'url'=>array('admin')),
);
?>

<h1>Create Street</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>