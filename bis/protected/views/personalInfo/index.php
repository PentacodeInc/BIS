<?php
/* @var $this PersonalInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Personal Infos',
);

$this->menu=array(
	array('label'=>'Add Resident', 'url'=>array('create')),
    array('label'=>'Batch Add Residents', 'url'=>array('import')),
	//array('label'=>'Residents Database', 'url'=>array('admin')),
);
?>

<h1>Dashboard</h1>

<!--<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>-->
