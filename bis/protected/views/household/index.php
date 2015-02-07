<?php
/* @var $this HouseholdController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Households',
);

$this->menu=array(
	array('label'=>'Create Household', 'url'=>array('create')),
	array('label'=>'Manage Household', 'url'=>array('admin')),
);
?>

<h1>Households</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
