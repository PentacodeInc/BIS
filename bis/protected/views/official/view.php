<?php
/* @var $this OfficialController */
/* @var $model Official */

$this->breadcrumbs=array(
	'Officials'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Official', 'url'=>array('index')),
	array('label'=>'Create Official', 'url'=>array('create')),
	array('label'=>'Update Official', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Official', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Official', 'url'=>array('admin')),
);
?>

<h1>View Official #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'position',
		'level',
		'about',
		'user_id',
	),
)); ?>
