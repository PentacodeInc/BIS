<?php
/* @var $this GovernmentInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Government Infos',
);

$this->menu=array(
	array('label'=>'Create GovernmentInfo', 'url'=>array('create')),
	array('label'=>'Manage GovernmentInfo', 'url'=>array('admin')),
);
?>

<h1>Government Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
