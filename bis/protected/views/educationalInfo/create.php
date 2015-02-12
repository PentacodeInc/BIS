<?php
/* @var $this EducationalInfoController */
/* @var $model EducationalInfo */

$this->breadcrumbs=array(
	'Educational Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EducationalInfo', 'url'=>array('index')),
	array('label'=>'Manage EducationalInfo', 'url'=>array('admin')),
);
?>

<h1>Create EducationalInfo</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>