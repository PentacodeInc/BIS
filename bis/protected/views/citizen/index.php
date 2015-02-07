<?php
/* @var $this CitizenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Citizens',
);

$this->menu=array(
	array('label'=>'Create Citizen', 'url'=>array('create')),
	array('label'=>'Manage Citizen', 'url'=>array('admin')),
);
?>

<h1>Citizens</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
