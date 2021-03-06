<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div id="content">
    <?php if (!Yii::app()->user->isGuest){ ?>
	<div class="span-25 floatleft">
    <?php }else{ ?>
    <div class="span-100">
    <?php } ?>
		<?php echo $content; ?>
	</div>
    
    <?php if (!Yii::app()->user->isGuest){ ?>
    <div class="span-26 floatright adminmenu">
        <?php if(Access::hasAccess('')){?>
        <div class="menu-header"><i class="fa fa-chevron-circle-down"></i> Menu</div>
        <ul class="menu-content">
            <?php if (Access::hasAccess('Dashboard')){?>
                <li><?php echo CHtml::link('<i class="fa fa-area-chart"></i> Dashboard</a>', array('/personalInfo/index')); ?>
            <?php } ?>
            <?php if (Access::hasAccess('Search')){?>
                <li><?php echo CHtml::link('<i class="fa fa-database"></i> Residents Database</a>', array('/personalInfo/admin')); ?>
            <?php } ?>
            <?php if (Access::hasAccess('Maintain Users')){?>
                <li><?php echo CHtml::link('<i class="fa fa-users"></i> Maintain User</a>', array('/user/admin')); ?>
            <?php } ?>
            <?php if (Access::hasAccess('Maintain Slideshow')){?>
                <li><?php echo CHtml::link('<i class="fa fa-picture-o"></i> Maintain Slideshow</a>', array('/sliderImages/admin')); ?>
            <?php } ?>
            <?php if (Access::hasAccess('Maintain Announcements')){?>
                <li><?php echo CHtml::link('<i class="fa fa-bullhorn"></i> Maintain Announcements', array('/announcement/admin')); ?>
            <?php } ?>
            <?php if (Access::hasAccess('Maintain Downloadable Files')){?>
                <li><?php echo CHtml::link('<i class="fa fa-download"></i> Maintain Downloadable Files</a>', array('/downloadableFiles/admin')); ?>
            <?php } ?>
            <?php if (Access::hasAccess('Maintain Streets')){?>
                <li><?php echo CHtml::link('<i class="fa fa-road"></i> Maintain Streets</a>', array('/street/admin')); ?>
            <?php } ?>
        </ul>
        <?php } ?>
        
        <?php if (count($this->menu)!= 0){ ?>
        <div class="menu-header"><i class="fa fa-bars"></i> Actions</div>
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