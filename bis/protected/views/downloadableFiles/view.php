<?php
/* @var $this DownloadableFilesController */
/* @var $model DownloadableFiles */

$this->breadcrumbs=array(
	'Downloadable Files'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List DownloadableFiles', 'url'=>array('index')),
	array('label'=>'Create DownloadableFiles', 'url'=>array('create')),
	array('label'=>'Update DownloadableFiles', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete DownloadableFiles', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage DownloadableFiles', 'url'=>array('admin')),
);
?>

<h1>View DownloadableFiles #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
		'filename',
		'is_active',
		'last_update_datetime',
		'user_id',
	),
)); ?>
