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
            'name' =>'filename',
            'filter'=>'',
            'editable' => array(
                'type' => 'text',
                'url' => $this->createUrl('downloadableFiles/update'), 
                'placement' => 'right',
            )               
        ),
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
            'name'=>'last_update_datetime',
            'value'=>'Yii::app()->dateFormatter->format("MM/dd/yyyy",strtotime($data->last_update_datetime))',
            'htmlOptions' => array('style' => 'width: 100px;text-align:center;'),
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'last_update_datetime', 
                'language' => 'en-GB',
                'htmlOptions' => array(
                    'id' => 'datepicker_for_last_update_datetime',
                    'size' => '10',
                ),
                'options' => array(
                    'dateFormat' => 'mm/dd/yy',
                    'changeMonth' => true,
                    'changeYear' => true,
                )
            ), 
            true),
        ),
        array(
            'name'=>'user.username',
            'filter' => CHtml::activeTextField($model, 'user_id'),
            'value'=>'$data->user->username',
            'htmlOptions' => array('style' => 'width: 100px;text-align:center;'),
        ),
        array(
            'class'=>'CButtonColumn',
            'template'=>'{delete}',
        ),
	),
)); ?>
