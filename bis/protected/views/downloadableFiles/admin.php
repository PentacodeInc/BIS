<?php
/* @var $this DownloadableFilesController */
/* @var $model DownloadableFiles */

$this->breadcrumbs=array(
	'Downloadable Files'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List DownloadableFiles', 'url'=>array('index')),
	array('label'=>'Create DownloadableFiles', 'url'=>array('create')),
);
?>

<h1>Manage Downloadable Files</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'downloadable-files-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'class' =>'editable.EditableColumn',
            'name' =>'name',
            'editable' => array(
                'type' => 'text',
                'url' => $this->createUrl('downloadableFiles/update'), 
                'placement' => 'right',
            )               
        ),
        array(
            'class' =>'editable.EditableColumn',
            'name' =>'filename',
            'editable' => array(
                'type' => 'text',
                'url' => $this->createUrl('downloadableFiles/update'), 
                'placement' => 'right',
            )               
        ),
        array( 
            'class' => 'editable.EditableColumn',
            'name' => 'is_active',
            'value' => '$data->is_active?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
            'headerHtmlOptions' => array('style' => 'width: 100px'),
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
            'editable' => array(
                'type'     => 'select',
                'url'      => $this->createUrl('downloadableFiles/update'),
                'source'   => array( 1=>'Yes',0=>'No'),
            )
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{delete}',
        ),
	),
)); ?>
