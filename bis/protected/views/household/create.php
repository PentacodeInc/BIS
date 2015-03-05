<?php
/* @var $this HouseholdController */
/* @var $model Household */

$this->breadcrumbs=array(
	'Households'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Household', 'url'=>array('index')),
	//array('label'=>'Manage Household', 'url'=>array('admin')),
    array('label'=>'Manage PersonalInfo', 'url'=>array('/personalInfo/admin'), 'visible'=>Access::hasAccess('search')),
    array('label'=>'Add Resident', 'url'=>array('/personalInfo/create'), 'visible'=>Access::hasAccess('add residents')),
    array('label'=>'Batch Add Residents', 'url'=>array('/personalInfo/import'), 'visible'=>Access::hasAccess('batch add')),
);
?>

<h1>Add Household</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>