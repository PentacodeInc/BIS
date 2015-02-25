<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'import-form',
 	'enableAjaxValidation'=>true,
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'household'); ?>
		<?php echo $form->textField($model,'household'); ?>
		<?php echo $form->error($model,'household'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'csv_file'); ?>
		<?php echo $form->fileField($model,'csv_file'); ?>
		<?php echo $form->error($model,'csv_file'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton("Submit"); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->