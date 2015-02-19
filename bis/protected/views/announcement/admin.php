<?php
/* @var $this AnnouncementController */
/* @var $model Announcement */

$this->breadcrumbs=array(
	'Announcements'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Announcement', 'url'=>array('index')),
	array('label'=>'Create Announcement', 'url'=>array('create')),
);

?>

<h1>Manage Announcements</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'announcement-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'id',
            'htmlOptions' => array('style' => 'width: 15px;'),
        ),
        array(
            'name'=>'title',
            'value' => 'CHtml::link($data->title,array("announcement/update", "id"=>$data->id))',
            'type' => 'raw',
        ),
        array(
            'name'=>'posted_datetime',
            'value'=>'Yii::app()->dateFormatter->format("MM/dd/yyyy",strtotime($data->posted_datetime))',
            'htmlOptions' => array('style' => 'width: 100px;text-align:center;'),
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'posted_datetime', 
                'language' => 'en-GB',
                'htmlOptions' => array(
                    'id' => 'datepicker_for_posted_datetime',
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
            'template'=>'{view}{delete}',
		),
	),
)); ?>
