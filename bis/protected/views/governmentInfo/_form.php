<?php
/* @var $this GovernmentInfoController */
/* @var $model GovernmentInfo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'government-info-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sss_num'); ?>
		<?php echo $form->textField($model,'sss_num'); ?>
		<?php echo $form->error($model,'sss_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'philhealth_num'); ?>
		<?php echo $form->textField($model,'philhealth_num'); ?>
		<?php echo $form->error($model,'philhealth_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gsis_num'); ?>
		<?php echo $form->textField($model,'gsis_num'); ?>
		<?php echo $form->error($model,'gsis_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tin_num'); ?>
		<?php echo $form->textField($model,'tin_num'); ?>
		<?php echo $form->error($model,'tin_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'voters_id'); ?>
		<?php echo $form->textField($model,'voters_id'); ?>
		<?php echo $form->error($model,'voters_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'senior_citizen_num'); ?>
		<?php echo $form->textField($model,'senior_citizen_num'); ?>
		<?php echo $form->error($model,'senior_citizen_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'orange_card_num'); ?>
		<?php echo $form->textField($model,'orange_card_num'); ?>
		<?php echo $form->error($model,'orange_card_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'personal_info_id'); ?>
		<?php echo $form->textField($model,'personal_info_id'); ?>
		<?php echo $form->error($model,'personal_info_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->