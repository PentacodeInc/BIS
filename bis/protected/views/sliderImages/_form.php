<?php
/* @var $this SliderImagesController */
/* @var $model SliderImages */
/* @var $form CActiveForm */
?>

<div class="form inline">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'slider-images-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'filename'); ?>
		<?php echo $form->fileField($model,'filename',array('style'=>'width:500px')); ?>
		<?php echo $form->error($model,'filename'); ?>
        
        <span class="row buttons">
            <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
        </span>
	</div>
	
<?php $this->endWidget(); ?>

</div><!-- form -->