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
        <?php echo CHtml::link('<i class="fa fa-users"></i> Maintain User', array('/user/admin')); ?>
    </div>
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-picture-o"></i> Maintain Slide Show', array('/sliderImages/admin')); ?>
    </div>
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-bullhorn"></i> Maintain Announcements', array('/announcement/admin')); ?>
    </div>
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-download"></i> Maintain Downloadable Files', array('/downloadableFiles/admin')); ?>
    </div>
    <div class="link">
        <?php echo CHtml::link('<i class="fa fa-road"></i> Maintain Streets', array('/street/admin')); ?>
    </div>
</div>