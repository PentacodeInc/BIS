<?php
/* @var $this CitizenController */
/* @var $model Citizen */

$this->breadcrumbs=array(
	'Citizens'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Citizen', 'url'=>array('index')),
	array('label'=>'Create Citizen', 'url'=>array('create')),
	array('label'=>'Update Citizen', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Citizen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Citizen', 'url'=>array('admin')),
);
?>

<h1>View Citizen #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'barangay_id',
		'first_name',
		'middle_name',
		'last_name',
		'birthdate',
		'gender',
		'address',
		'is_head',
		'household_id',
	),
)); ?>
