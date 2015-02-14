<?php
/* @var $this FamilyInfoController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Family Infos',
);

$this->menu=array(
	array('label'=>'Create FamilyInfo', 'url'=>array('create')),
	array('label'=>'Manage FamilyInfo', 'url'=>array('admin')),
);
?>

<h1>Family Infos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
