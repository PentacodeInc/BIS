<?php
/* @var $this SliderImagesController */
/* @var $model SliderImages */

?>

<h1>Maintain Slideshow</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'slider-images-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
    'htmlOptions'=>array('style'=>'margin:0;padding:0;'),
	'columns'=>array(
		//'id',
       array(
			'class' =>'editable.EditableColumn',
			'name' =>'filename',
            'filter'=>'',
			'editable' => array(
				'type' => 'text',
                 'url' => $this->createUrl('sliderImages/update'), 
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
              'url'      => $this->createUrl('sliderImages/update'),
              'source'   => array( 1=>'Yes',0=>'No'),
             )
        ),
        array(
            'name'=>'posted_datetime',
            'value'=>'Yii::app()->dateFormatter->format("MM/dd/yyyy",strtotime($data->posted_datetime))',
            'headerHtmlOptions' => array('style' => 'width: 100px;text-align:center;'),
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
            'headerHtmlOptions' => array('style' => 'width: 100px;text-align:center;'),
        ),
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{delete}',
            'buttons' => array(
                'view' => array(
                    'label' => 'Show Image', 
                    'url' => 'CHtml::normalizeUrl($data->filename)', 
                    'options'=>array('target'=>'_blank')
                    //'imageUrl' => Yii::app()->baseUrl . '/themes/images/reset.png',
                    )
                )
		),
	),
)); ?>
