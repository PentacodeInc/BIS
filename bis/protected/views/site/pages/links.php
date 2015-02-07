<?php
$this->pageTitle=Yii::app()->name . ' - Maintenance';
$this->breadcrumbs=array(
	'Maintenance',
);
?>

<?php $this->widget('zii.widgets.CMenu',array(
    'items'=>array(
        array('label'=>'User', 'url'=>array('/user')),
        array('label'=>'Modules', 'url'=>array('/modules')),
        array('label'=>'Slide Show', 'url'=>array('/images')),
        array('label'=>'Event', 'url'=>array('/event')),
        array('label'=>'Announcements', 'url'=>array('/announcement')),
    ),
    'htmlOptions'=>array('class'=>'link'),
)); ?>