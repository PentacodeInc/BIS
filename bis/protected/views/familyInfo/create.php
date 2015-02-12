<?php
/* @var $this FamilyInfoController */
/* @var $model FamilyInfo */

$this->breadcrumbs=array(
	'Family Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List FamilyInfo', 'url'=>array('index')),
	array('label'=>'Manage FamilyInfo', 'url'=>array('admin')),
);
?>

<h1>Create FamilyInfo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>