<?php
/* @var $this DownloadableFilesController */
/* @var $model DownloadableFiles */

$this->breadcrumbs=array(
	'Downloadable Files'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List DownloadableFiles', 'url'=>array('index')),
	array('label'=>'Create DownloadableFiles', 'url'=>array('create')),
	//array('label'=>'View DownloadableFiles', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage DownloadableFiles', 'url'=>array('admin')),
);
?>

<h1>Update Downlodable Files</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>