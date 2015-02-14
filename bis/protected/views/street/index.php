<?php
/* @var $this StreetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Streets',
);

$this->menu=array(
	array('label'=>'Create Street', 'url'=>array('create')),
	array('label'=>'Manage Street', 'url'=>array('admin')),
);
?>

<h1>Streets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
