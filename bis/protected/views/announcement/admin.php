<?php
/* @var $this AnnouncementController */
/* @var $model Announcement */

$this->breadcrumbs=array(
	'Announcements'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Announcement', 'url'=>array('index')),
	array('label'=>'Create Announcement', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#announcement-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Announcements</h1>

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
	'id'=>'announcement-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		'description',
        array(
            'name'=>'posted_datetime',
            'htmlOptions' => array('style' => 'min-width: 70px;'),
        ),
		array(
            'name'=>'user_id',
            'value'=>'$data->user->username'
        ),
		array(
			'class'=>'CButtonColumn',
            'template'=>'{update}{delete}',
		),
	),
)); ?>
