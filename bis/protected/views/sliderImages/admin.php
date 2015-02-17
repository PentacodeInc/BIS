<?php
/* @var $this SliderImagesController */
/* @var $model SliderImages */

$this->menu=array(
	array('label'=>'Add Slider Image Link', 'url'=>array('create')),
);
?>

<h1>Manage Slider Images</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'slider-images-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
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
            'template'=>'{delete}'
		),
	),
)); ?>
