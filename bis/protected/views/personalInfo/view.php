<?php
/* @var $this PersonalInfoController */
/* @var $model PersonalInfo */

$this->breadcrumbs=array(
	'Personal Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	// array('label'=>'List PersonalInfo', 'url'=>array('index')),
	array('label'=>'Create PersonalInfo', 'url'=>array('create')),
	array('label'=>'Update PersonalInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete PersonalInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PersonalInfo', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->getFullName(); ?></h1>
<h2><?php echo $model->barangay_id; ?></h2>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'birthdate',
		array(
			'name'=>'gender',
			'value'=>$model->genderLabel
			),
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
