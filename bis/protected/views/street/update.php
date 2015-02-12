<?php
/* @var $this StreetController */
/* @var $model Street */

$this->breadcrumbs=array(
	'Streets'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Street', 'url'=>array('index')),
	array('label'=>'Create Street', 'url'=>array('create')),
	array('label'=>'View Street', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Street', 'url'=>array('admin')),
);
?>

<h1>Update Street <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>