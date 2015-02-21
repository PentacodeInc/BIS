<?php
/* @var $this PersonalInfoController */
/* @var $model PersonalInfo */

$this->breadcrumbs=array(
	'Personal Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PersonalInfo', 'url'=>array('index')),
	array('label'=>'Create PersonalInfo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$('#personal-info-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Personal Infos</h1>

<div class="search-form">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<div class="searchLetters">
<?php foreach (range('A', 'Z') as $column){
        echo CHtml::link($column,array("personalInfo/admin", "letter"=>$column));
        if ($column != 'Z') echo " | ";
} ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'personal-info-grid',
	//'dataProvider'=>$model->search(),
    'dataProvider'=>$model->search(isset($_GET['letter']) ? $_GET['letter'] : ""),
	//'filter'=>$model,
	'columns'=>array(
		array(
            'name'=>'fullName',
            'value' => 'CHtml::link($data->getFullName(),array("user/update", "id"=>$data->id))',
            'type' => 'raw',
        ),
		'barangay_id',
        'house_num',
        'street',
        'residency_type',
		/*
        'birthdate',
		'gender',
		'house_num',
		'street',
		'provincial_address',
		'is_head',
		'household_id',
		'birthplace',
		'civil_status',
		'spouse_name',
		'height',
		'weight',
		'citizenship',
		'religion',
		'contact_num',
		'email_address',
		'photo_filename',
		'residency_start',
		'residency_end',
		'residency_type',
		'last_update_datetime',
		'user_id',
		*/
		array(
			'class'=>'CButtonColumn',
            'template'=>'{view}',
		),
	),
)); ?>
