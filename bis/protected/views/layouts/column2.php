<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
	<div class="span-25 floatleft">
		<?php echo $content; ?>
	</div>
    
    <?php if (!Yii::app()->user->isGuest){ ?>
    <div class="span-26 floatright adminmenu">
        <?php if(!Yii::app()->user->isGuest){?>
        <div class="menu-header"><i class="fa fa-chevron-circle-down"></i> Menu</div>
        <ul class="menu-content">
            <li><?php echo CHtml::link('<i class="fa fa-area-chart"></i> Dashboard</a>', array('/personalInfo/index')); ?>
            <li><?php echo CHtml::link('<i class="fa fa-database"></i> Residents Database</a>', array('/personalInfo/admin')); ?>
            <li><?php echo CHtml::link('<i class="fa fa-users"></i> User Maintenance</a>', array('/user/admin')); ?>
            <li><?php echo CHtml::link('<i class="fa fa-picture-o"></i> Slide Show Maintenance</a>', array('/sliderImages/admin')); ?>
            <li><?php echo CHtml::link('<i class="fa fa-bullhorn"></i> Announcements Maintenance', array('/announcement/admin')); ?>
            <li><?php echo CHtml::link('<i class="fa fa-download"></i> Downloadable Files Maintenance</a>', array('/downloadableFiles/admin')); ?>
            <li><?php echo CHtml::link('<i class="fa fa-road"></i> Streets Maintenance</a>', array('/street/admin')); ?>
        </ul>
        <?php } ?>
        
        <?php if (count($this->menu)!= 0){ ?>
        <div class="menu-header"><i class="fa fa-bars"></i> Operations</div>
        <?php
            $this->beginWidget('zii.widgets.CPortlet');
            $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'menu-content'),
            ));
            $this->endWidget();
        ?>
        <?php } ?>
    </div>
    <?php } ?>
    
</div>

<?php $this->endContent(); ?>