<?php
/* @var $this GovernmentInfoController */
/* @var $model GovernmentInfo */

$this->breadcrumbs=array(
	'Government Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List GovernmentInfo', 'url'=>array('index')),
	array('label'=>'Manage GovernmentInfo', 'url'=>array('admin')),
);
?>

<h1>Create GovernmentInfo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>