<?php
$this->pageTitle=Yii::app()->name . ' - Maintenance';
$this->breadcrumbs=array(
	'Maintenance',
);
?>

<?php $this->widget('zii.widgets.CMenu',array(
    'items'=>array(
        array('label'=>'User', 'url'=>array('/user/admin')),
        //array('label'=>'Modules', 'url'=>array('/module/admin')),
        array('label'=>'Slide Show', 'url'=>array('/sliderImages/admin')),
        //array('label'=>'Event', 'url'=>array('/event')),
        array('label'=>'Announcements', 'url'=>array('/announcement')),
        array('label'=>'Downloadable Files', 'url'=>array('/downloadableFiles/admin')),
    ),
    'htmlOptions'=>array('class'=>'link'),
)); ?>