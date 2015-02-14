<?php
/* @var $this FamilyInfoController */
/* @var $model FamilyInfo */

$this->breadcrumbs=array(
	'Family Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List FamilyInfo', 'url'=>array('index')),
	array('label'=>'Create FamilyInfo', 'url'=>array('create')),
	array('label'=>'Update FamilyInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete FamilyInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage FamilyInfo', 'url'=>array('admin')),
);
?>

<h1>View FamilyInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'member_name',
		'relationship',
		'personal_info_id',
	),
)); ?>
