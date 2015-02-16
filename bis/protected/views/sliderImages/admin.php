<?php
/* @var $this SliderImagesController */
/* @var $model SliderImages */

//MAKE THIS ROW EDIT :)
?>

<h1>Manage Slider Images</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'slider-images-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
        array(
            'name'=>'filename',
            'filter'=>''
        ), 
        array(
            'name'=>'is_active',
            'value' => '$data->is_active?Yii::t(\'app\',\'Yes\'):Yii::t(\'app\', \'No\')',
            'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
        ),
		//'posted_datetime',
		//'user_id',
		array(
			'class'=>'CButtonColumn',
            'template'=>'{delete}'
		),
	),
)); ?>
