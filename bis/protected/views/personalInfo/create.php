<?php
/* @var $this PersonalInfoController */
/* @var $model PersonalInfo */

$this->breadcrumbs=array(
	'Personal Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PersonalInfo', 'url'=>array('index')),
	array('label'=>'Manage PersonalInfo', 'url'=>array('admin')),
);
?>

<h1>Create PersonalInfo</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'employmentInfo'=>$employmentInfo,'governmentInfo'=>$governmentInfo)); ?>