<?php
/* @var $this EducationalInfoController */
/* @var $model EducationalInfo */

$this->breadcrumbs=array(
	'Educational Infos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EducationalInfo', 'url'=>array('index')),
	array('label'=>'Create EducationalInfo', 'url'=>array('create')),
	array('label'=>'Update EducationalInfo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EducationalInfo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EducationalInfo', 'url'=>array('admin')),
);
?>

<h1>View EducationalInfo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'level',
		'school',
		'graduation_date',
		'remarks',
		'personal_info_id',
	),
)); ?>
