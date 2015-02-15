<?php
/* @var $this DownloadableFilesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Downloadable Files',
);

$this->menu=array(
	array('label'=>'Create DownloadableFiles', 'url'=>array('create')),
	array('label'=>'Manage DownloadableFiles', 'url'=>array('admin')),
);
?>

<h1>Downloadable Files</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
