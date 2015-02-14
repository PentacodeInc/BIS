<?php
/* @var $this GovernmentInfoController */
/* @var $model GovernmentInfo */

$this->breadcrumbs=array(
	'Government Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List GovernmentInfo', 'url'=>array('index')),
	array('label'=>'Create GovernmentInfo', 'url'=>array('create')),
	array('label'=>'Update GovernmentInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete GovernmentInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage GovernmentInfo', 'url'=>array('admin')),
);
?>

<h1>View GovernmentInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'sss_num',
		'philhealth_num',
		'gsis_num',
		'tin_num',
		'voters_id',
		'senior_citizen_num',
		'orange_card_num',
		'personal_info_id',
	),
)); ?>
