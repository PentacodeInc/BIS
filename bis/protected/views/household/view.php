<?php
/* @var $this HouseholdController */
/* @var $model Household */

$this->breadcrumbs=array(
	'Households'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Household', 'url'=>array('index')),
	array('label'=>'Create Household', 'url'=>array('create')),
	array('label'=>'Update Household', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Household', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Household', 'url'=>array('admin')),
);
?>

<h1>View Household #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
	),
)); ?>
