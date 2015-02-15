<?php
/* @var $this DownloadableFilesController */
/* @var $model DownloadableFiles */

$this->breadcrumbs=array(
	'Downloadable Files'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List DownloadableFiles', 'url'=>array('index')),
	array('label'=>'Manage DownloadableFiles', 'url'=>array('admin')),
);
?>

<h1>Create DownloadableFiles</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>