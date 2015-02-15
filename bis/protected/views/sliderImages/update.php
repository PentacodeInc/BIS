<?php
/* @var $this SliderImagesController */
/* @var $model SliderImages */

$this->breadcrumbs=array(
	'Slider Images'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SliderImages', 'url'=>array('index')),
	array('label'=>'Create SliderImages', 'url'=>array('create')),
	array('label'=>'View SliderImages', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage SliderImages', 'url'=>array('admin')),
);
?>

<h1>Update SliderImages <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>