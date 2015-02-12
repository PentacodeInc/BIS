<?php
/* @var $this PersonalInfoController */
/* @var $model PersonalInfo */

$this->breadcrumbs=array(
	'Personal Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PersonalInfo', 'url'=>array('index')),
	array('label'=>'Create PersonalInfo', 'url'=>array('create')),
	array('label'=>'Update PersonalInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PersonalInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PersonalInfo', 'url'=>array('admin')),
);
?>

<h1>View PersonalInfo #<?php echo $model->id; ?></h1>

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
		'provincial_address',
		'birthplace',
		'civil_status',
		'spouse_name',
		'height',
		'weight',
		'citizenship',
		'religion',
		'contact_num',
		'email_address',
		'residence_year',
	),
)); ?>
