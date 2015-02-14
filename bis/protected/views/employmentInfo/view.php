<?php
/* @var $this EmploymentInfoController */
/* @var $model EmploymentInfo */

$this->breadcrumbs=array(
	'Employment Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EmploymentInfo', 'url'=>array('index')),
	array('label'=>'Create EmploymentInfo', 'url'=>array('create')),
	array('label'=>'Update EmploymentInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EmploymentInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EmploymentInfo', 'url'=>array('admin')),
);
?>

<h1>View EmploymentInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'position',
		'employer',
		'start_date',
		'end_date',
		'personal_info_id',
	),
)); ?>
