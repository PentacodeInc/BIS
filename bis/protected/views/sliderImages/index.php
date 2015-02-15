<?php
/* @var $this SliderImagesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Slider Images',
);

$this->menu=array(
	array('label'=>'Create SliderImages', 'url'=>array('create')),
	array('label'=>'Manage SliderImages', 'url'=>array('admin')),
);
?>

<h1>Slider Images</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
