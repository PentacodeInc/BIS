<?php
/* @var $this GovernmentInfoController */
/* @var $model GovernmentInfo */

$this->breadcrumbs=array(
	'Government Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List GovernmentInfo', 'url'=>array('index')),
	array('label'=>'Create GovernmentInfo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#government-info-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Government Infos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'government-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'sss_num',
		'philhealth_num',
		'gsis_num',
		'tin_num',
		'voters_id',
		/*
		'senior_citizen_num',
		'orange_card_num',
		'personal_info_id',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
