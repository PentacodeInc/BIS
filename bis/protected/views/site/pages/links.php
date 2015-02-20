<?php
$this->pageTitle=Yii::app()->name . ' - Maintenance';
$this->breadcrumbs=array(
	'Maintenance',
);
?>

<h1>Maintenance</h1>

<div id="links">
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-users"></i> User</a>', array('/user/admin')); ?>
    </div>
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-picture-o"></i> Slide Show</a>', array('/sliderImages/admin')); ?>
    </div>
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-bullhorn"></i> Announcements', array('/announcement/admin')); ?>
    </div>
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-download"></i> Downloadable Files</a>', array('/downloadableFiles/admin')); ?>
    </div>
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-download"></i> Streets</a>', array('/street/admin')); ?>
    </div>
</div>