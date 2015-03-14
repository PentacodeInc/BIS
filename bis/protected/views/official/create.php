<?php
/* @var $this OfficialController */
/* @var $model Official */

$this->breadcrumbs=array(
	'Officials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Official', 'url'=>array('index')),
	array('label'=>'Manage Official', 'url'=>array('admin')),
);
?>

<h1>Create Official</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>