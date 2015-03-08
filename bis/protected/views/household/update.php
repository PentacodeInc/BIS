<?php
/* @var $this HouseholdController */
/* @var $model Household */

$this->breadcrumbs=array(
	'Households'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	/*array('label'=>'List Household', 'url'=>array('index')),
	array('label'=>'Create Household', 'url'=>array('create')),
	array('label'=>'View Household', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Household', 'url'=>array('admin')),*/
);
?>

<h1>Update Household</h1>
<h3>(<?php echo $head->getFullName(); ?>)</h3>

<?php $this->renderPartial('_form', array('model'=>$model,'head'=>$head)); ?>