<?php
/* @var $this StreetController */
/* @var $model Street */

$this->breadcrumbs=array(
	'Streets'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Street', 'url'=>array('index')),
	array('label'=>'Create Street', 'url'=>array('create')),
	array('label'=>'Update Street', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Street', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Street', 'url'=>array('admin')),
);
?>

<h1>View Street #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'remarks',
		'is_active',
		'last_update_datetime',
		'user_id',
	),
)); ?>
