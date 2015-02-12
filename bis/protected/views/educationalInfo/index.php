<?php
/* @var $this EducationalInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Educational Infos',
);

$this->menu=array(
	array('label'=>'Create EducationalInfo', 'url'=>array('create')),
	array('label'=>'Manage EducationalInfo', 'url'=>array('admin')),
);
?>

<h1>Educational Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
