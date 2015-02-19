<?php
/* @var $this SliderImagesController */
/* @var $model SliderImages */

?>

<h1>Manage Slider Images</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'slider-images-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
    'htmlOptions'=>array('style'=>'margin:0;padding:0;'),
	'columns'=>array(
		//'id',
       array(
			'class' =>'editable.EditableColumn',
			'name' =>'filename',
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
       /*array(
            'name'=>'is_active',
            'value' => '$data->is_active?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
        ),*/
		//'posted_datetime',
		//'user_id',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}{delete}',
            'buttons' => array(
                'view' => array(
                    'label' => 'Show Image', 
                    'url' => 'CHtml::normalizeUrl($data->filename)', 
                    //'imageUrl' => Yii::app()->baseUrl . '/themes/images/reset.png',
                    )
                )
		),
	),
)); ?>
