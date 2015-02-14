<?php
/* @var $this EducationalInfoController */
/* @var $model EducationalInfo */

$this->breadcrumbs=array(
	'Educational Infos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EducationalInfo', 'url'=>array('index')),
	array('label'=>'Create EducationalInfo', 'url'=>array('create')),
	array('label'=>'View EducationalInfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EducationalInfo', 'url'=>array('admin')),
);
?>

<h1>Update EducationalInfo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>