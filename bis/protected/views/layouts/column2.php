<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="">
	<div id="content">
        <?php
            $this->beginWidget('zii.widgets.CPortlet');
            $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'operations floatright'),
            ));
            $this->endWidget();
        ?>
		<?php echo $content; ?>
	</div><!-- content -->
</div>

<?php $this->endContent(); ?>