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
    array('label'=>'Batch Add PersonalInfo', 'url'=>array('import')),
);

?>

<h1>Residents Database</h1>

<?php $this->renderPartial('_search', array('model'=>$model)); ?>

<div class="searchLetters">
<?php foreach (range('A', 'Z') as $column){
        echo CHtml::link($column,array("personalInfo/searchByLetter", "letter"=>$column));
        if ($column != 'Z') echo " | ";
} ?>
</div>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'personal-info-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'fullName',
        'gender',
        'civil_status',
        'residency_type',
        'street',
        /*'household_id',
		
        'birthdate',
		'gender',
		'address',
		'household_id',
		'provincial_address',
		'birthplace',
		'civil_status',
		'spouse_name',
		'height',
		'weight',
		'citizenship',
		'religion',
		'contact_num',
		'email_address',
		'residence_year',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
