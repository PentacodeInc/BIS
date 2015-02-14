<?php
/* @var $this PersonalInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Personal Infos',
);

$this->menu=array(
	array('label'=>'Create PersonalInfo', 'url'=>array('create')),
	array('label'=>'Manage PersonalInfo', 'url'=>array('admin')),
);
?>

<h1>Personal Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
