<?php
/* @var $this PersonalInfoController */
/* @var $dataProvider CActiveDataProvider */
/*  'dataProvider'=>$dataProvider,
    'street'=>$str,
    'precinct'=> $prct,
    'gender'=> $sex,
    'cStatus'=> $stat,
    'resType'=>$type,
    'age'=>$age*/

$this->breadcrumbs=array(
	'Personal Infos',
);

$this->menu=array(
	array('label'=>'Add Resident', 'url'=>array('create')),
    array('label'=>'Batch Add Residents', 'url'=>array('import')),
	//array('label'=>'Residents Database', 'url'=>array('admin')),
);
?>

<h1>Dashboard</h1>

<div class="charts">
<div class="chart">
    <div class="title">Street Population</div>
    <?php $image = $this->widget('ext.widgets.google.XGoogleChart',array(
        'type'=>'bar-vertical',
        'data'=>$street,
        'size'=>array(800,300),
        'color'=>array('333ea7'),
        'barsSize'=>array('a'),
        'axes'=>array('x','y'),
    )); ?>
</div>

    
<div class="title">Precinct Number</div>
<?php $this->widget('ext.widgets.google.XGoogleChart',array(
    'type'=>'bar-vertical',
    'data'=>$precinct,
    'size'=>array(800,300),
    'color'=>array('333ea7'),
    'barsSize'=>array('a'),
    'axes'=>array('x','y'),
)); ?>

<!--<div class="title">Gender</div> -->
<?php $this->widget('ext.widgets.google.XGoogleChart',array(
    'type'=>'pie',
    'title'=>'Gender',
    'data'=>$gender,
    'size'=>array(400,300),
    'color'=>array('333ea7'),
)); ?>

<?php $this->widget('ext.widgets.google.XGoogleChart',array(
    'type'=>'pie',
    'title'=>'Civil Status',
    'data'=>$cStatus,
    'size'=>array(400,300),
    'color'=>array('333ea7'),
));
$this->widget('ext.widgets.google.XGoogleChart',array(
    'type'=>'pie',
    'title'=>'Residenty Type',
    'data'=>$resType,
    'size'=>array(400,300),
    'color'=>array('333ea7'),
));
$this->widget('ext.widgets.google.XGoogleChart',array(
    'type'=>'pie',
    'title'=>'Age',
    'data'=>$age,
    'size'=>array(400,300),
    'color'=>array('333ea7'),
));
?>
</div>
