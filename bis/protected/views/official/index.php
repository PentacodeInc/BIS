<?php
/* @var $this OfficialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Officials',
);

$this->menu=array(
	array('label'=>'Create Official', 'url'=>array('create')),
	array('label'=>'Manage Official', 'url'=>array('admin')),
);
?>

<h1>Officials</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
