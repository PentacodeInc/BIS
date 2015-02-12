<?php
/* @var $this EmploymentInfoController */
/* @var $model EmploymentInfo */

$this->breadcrumbs=array(
	'Employment Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EmploymentInfo', 'url'=>array('index')),
	array('label'=>'Manage EmploymentInfo', 'url'=>array('admin')),
);
?>

<h1>Create EmploymentInfo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>