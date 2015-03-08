<?php
/* @var $this HouseholdController */
/* @var $model Household */

$this->breadcrumbs=array(
	'Households'=>array('index'),
	'Create',
);

$this->menu=array(
	/*array('label'=>'List Household', 'url'=>array('index')),
	array('label'=>'Manage Household', 'url'=>array('admin')),*/
);
?>

<h1>Create Household</h1>
<h3>(<?php echo $head->getFullName(); ?>)</h3>

<?php $this->renderPartial('_form', array('model'=>$model, 'head'=>$head)); ?>