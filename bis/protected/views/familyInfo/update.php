<?php
/* @var $this FamilyInfoController */
/* @var $model FamilyInfo */

$this->breadcrumbs=array(
	'Family Infos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List FamilyInfo', 'url'=>array('index')),
	array('label'=>'Create FamilyInfo', 'url'=>array('create')),
	array('label'=>'View FamilyInfo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage FamilyInfo', 'url'=>array('admin')),
);
?>

<h1>Update FamilyInfo <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>