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

<?php //$this->widget('zii.widgets.CListView', array(
	//'dataProvider'=>$dataProvider,
	//'itemView'=>'_view',
//)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'downloadable-files-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
        array(
            'name'=>'filename',
            'value' => 'CHtml::link($data->filename,Yii::app()->request->baseUrl."/download/".$data->filename,array("target"=>"_blank"))',
            'type' => 'raw',
        ),
        //'filename',
        'name'
    )
)); ?>
