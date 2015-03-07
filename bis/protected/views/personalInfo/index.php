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

<?php
$this->widget('ext.widgets.google.XGoogleChart',array(
    'type'=>'bar-vertical',
    'title'=>'Street Population',
    'data'=>$street,
    'size'=>array(400,300),
    'color'=>array('6f8a09', '3285ce','dddddd'),
));

$this->widget('ext.widgets.google.XGoogleChart',array(
    'type'=>'bar-vertical',
    'title'=>'Precinct Number',
    'data'=>$precinct,
    'size'=>array(400,300),
    'color'=>array('6f8a09', '3285ce','dddddd'),
));
$this->widget('ext.widgets.google.XGoogleChart',array(
    'type'=>'pie',
    'title'=>'Gender',
    'data'=>$gender,
    'size'=>array(400,300),
    'color'=>array('6f8a09', '3285ce','dddddd'),
));
$this->widget('ext.widgets.google.XGoogleChart',array(
    'type'=>'pie',
    'title'=>'Civil Status',
    'data'=>$cStatus,
    'size'=>array(400,300),
    'color'=>array('6f8a09', '3285ce','dddddd'),
));
$this->widget('ext.widgets.google.XGoogleChart',array(
    'type'=>'pie',
    'title'=>'Residenty Type',
    'data'=>$resType,
    'size'=>array(400,300),
    'color'=>array('6f8a09', '3285ce','dddddd'),
));
$this->widget('ext.widgets.google.XGoogleChart',array(
    'type'=>'pie',
    'title'=>'Age',
    'data'=>$age,
    'size'=>array(400,300),
    'color'=>array('6f8a09', '3285ce','dddddd'),
));
?>
