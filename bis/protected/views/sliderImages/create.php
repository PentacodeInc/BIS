<?php
/* @var $this SliderImagesController */
/* @var $model SliderImages */

$this->breadcrumbs=array(
	'Slider Images'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SliderImages', 'url'=>array('index')),
	array('label'=>'Manage SliderImages', 'url'=>array('admin')),
);
?>

<h1>Create SliderImages</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>