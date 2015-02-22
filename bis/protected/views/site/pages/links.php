<?php
$this->pageTitle=Yii::app()->name . ' - Maintenance';
$this->breadcrumbs=array(
	'Maintenance',
);
?>

<h1>Admin Menu</h1>

<div id="links">
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-area-chart"></i> Dashboard', array('/personalInfo/dashboard')); ?>
    </div>
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-database"></i> Residents Database</a>', array('/personalInfo/admin')); ?>
    </div>
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-users"></i> User Maintenance', array('/user/admin')); ?>
    </div>
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-picture-o"></i> Slide Show Maintenance', array('/sliderImages/admin')); ?>
    </div>
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-bullhorn"></i> Announcements Maintenance', array('/announcement/admin')); ?>
    </div>
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-download"></i> Downloadable Files Maintenance', array('/downloadableFiles/admin')); ?>
    </div>
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-road"></i> Streets Maintenance', array('/street/admin')); ?>
    </div>
</div>