<?php
/* @var $this SliderImagesController */
/* @var $model SliderImages */

$this->breadcrumbs=array(
	'Slider Images'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List SliderImages', 'url'=>array('index')),
	array('label'=>'Create SliderImages', 'url'=>array('create')),
	array('label'=>'Update SliderImages', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete SliderImages', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SliderImages', 'url'=>array('admin')),
);
?>

<h1>View SliderImages #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'filename',
		'is_active',
		'posted_datetime',
		'user_id',
	),
)); ?>
