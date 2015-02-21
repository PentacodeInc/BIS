<?php
/* @var $this PersonalInfoController */
/* @var $model PersonalInfo */

$this->breadcrumbs=array(
	'Personal Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List PersonalInfo', 'url'=>array('index')),
    array('label'=>'Refresh', 'url'=>array('admin')),
	array('label'=>'Add Resident', 'url'=>array('create')),
    array('label'=>'Batch Add Residents', 'url'=>array('import')),
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

<h1>Residents Database</h1>

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
            'value' => 'CHtml::link($data->getFullName(),array("personalInfo/view", "id"=>$data->id))',
            'type' => 'raw'
        ),
		'barangay_id',
        'age',
        'house_num',
        'street',
        array(
            'name'=>'residency_type',
            'headerHtmlOptions' => array('style' => 'width: 100px;text-align:center;'),
        ),
        array(
            'name'=>'residencyStatus',
            'value'=>'$data->getResidencyStatus()',
            'headerHtmlOptions' => array('style' => 'width: 100px;text-align:center;'),
        ),
		/*array(
			'class'=>'CButtonColumn',
            'template'=>'{view}',
		),*/
	),
)); ?>
