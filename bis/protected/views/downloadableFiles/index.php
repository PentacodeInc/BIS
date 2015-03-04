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

<div id="about" class="pictures">
    <div id="white">
        <div class="aboutTitle">Downloadable Files</div>
    </div>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'downloadable-files-grid',
	'dataProvider'=>$dataProvider,
	'columns'=>array(
        array(
            'name'=>'filename',
            'value' => 'CHtml::link($data->filename,Yii::app()->request->baseUrl."/images/downloadable/".$data->filename,array("target"=>"_blank"))',
            'headerHtmlOptions' => array('style' => 'width: 500px'),
            'type' => 'raw',
        ),
        'name'
    )
)); ?>
