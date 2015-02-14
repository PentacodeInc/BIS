<?php
/* @var $this EmploymentInfoController */
/* @var $model EmploymentInfo */

$this->breadcrumbs=array(
	'Employment Infos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EmploymentInfo', 'url'=>array('index')),
	array('label'=>'Create EmploymentInfo', 'url'=>array('create')),
	array('label'=>'View EmploymentInfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EmploymentInfo', 'url'=>array('admin')),
);
?>

<h1>Update EmploymentInfo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>