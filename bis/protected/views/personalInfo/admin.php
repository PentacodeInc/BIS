<?php
/* @var $this PersonalInfoController */
/* @var $model PersonalInfo */

$this->breadcrumbs=array(
	'Personal Infos'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List PersonalInfo', 'url'=>array('index')),
    //array('label'=>'Refresh', 'url'=>array('admin')),
	array('label'=>'Add Resident', 'url'=>array('create'), 'visible'=>Access::hasAccess('add residents')),
    array('label'=>'Batch Add Residents', 'url'=>array('import'), 'visible'=>Access::hasAccess('batch add')),
    array('label'=>'Add Household', 'url'=>array('/household/create'), 'visible'=>Access::hasAccess('add residents')),
    //array('label'=>'Dashboard', 'url'=>array('dashboard')),
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
<?php echo CHtml::link('All',array("personalInfo/admin", "letter"=>'')); ?> | 
<?php foreach (range('A', 'Z') as $column){
        echo CHtml::link($column,array("personalInfo/admin", "letter"=>$column));
        if ($column != 'Z') echo " | ";
} ?>
</div>

<?php $gridWidget = $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'personal-info-grid',
	//'dataProvider'=>$model->search(),
    'dataProvider'=>$model->search(isset($_GET['letter']) ? $_GET['letter'] : ""),
	//'filter'=>$model,
	'columns'=>array(
		array(
            'name'=>'fullName',
            'value' => 'CHtml::link($data->getFullName(),array("personalInfo/update", "id"=>$data->id))',
            'type' => 'raw'
        ),
		'barangay_id',
        array(
            'name'=>'age',
            'value'=>'$data->getAge()',
        ),
        'house_num',
        'street',
        /*array(
            'name'=>'gender',
            'value'=>'$data->gender==0?Yii::t(\'app\',\'Female\'):Yii::t(\'app\', \'Male\')',
        ),*/
        /*'civil_status',
        'citizenship',*/
        array(
            'name'=>'residency_type',
            'value'=>'$data->residency_type==0?Yii::t(\'app\',\'Renter\'):Yii::t(\'app\', \'Owner\')',
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
<?php $this->renderExportGridButton($gridWidget,'Export Grid Results',array('class'=>'btn btn-info pull-right'));?>