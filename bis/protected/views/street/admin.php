<?php
/* @var $this StreetController */
/* @var $model Street */

$this->breadcrumbs=array(
	'Streets'=>array('index'),
	'Manage',
);
?>

<h1>Maintain Streets</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'street-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'htmlOptions'=>array('style'=>'margin:0;padding:0;'),
	'columns'=>array(
		/*'name',
		'remarks',
		'is_active',
		'last_update_datetime',
		'user_id',*/
        array(
			'class' =>'editable.EditableColumn',
			'name' =>'name',
			'editable' => array(
				'type' => 'text',
                 'url' => $this->createUrl('street/update'), 
				'placement' => 'right',
				)               
		),
        array(
			'class' =>'editable.EditableColumn',
			'name' =>'remarks',
			'editable' => array(
				'type' => 'text',
                 'url' => $this->createUrl('street/update'), 
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
              'url'      => $this->createUrl('street/update'),
              'source'   => array( 1=>'Yes',0=>'No'),
             )
        ),
        array(
            'name'=>'last_update_datetime',
            'value'=>'Yii::app()->dateFormatter->format("MM/dd/yyyy",strtotime($data->last_update_datetime))',
            'headerHtmlOptions' => array('style' => 'width: 100px;'),
            'filter' => $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$model, 
                'attribute'=>'last_update_datetime', 
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
            'headerHtmlOptions' => array('style' => 'width: 100px;text-align:center;'),
        ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
