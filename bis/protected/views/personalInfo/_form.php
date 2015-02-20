<?php
/* @var $this PersonalInfoController */
/* @var $model PersonalInfo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'personal-info-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'barangay_id'); ?>
		<?php echo $form->textField($model,'barangay_id'); ?>
		<?php echo $form->error($model,'barangay_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'middle_name'); ?>
		<?php echo $form->textField($model,'middle_name',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'middle_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>35,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthdate'); ?>
		<?php echo $form->textField($model,'birthdate'); ?>
		<?php echo $form->error($model,'birthdate'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->textField($model,'gender'); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'house_num'); ?>
		<?php echo $form->textField($model,'house_num',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'house_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'street'); ?>
		<?php echo $form->textField($model,'street',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provincial_address'); ?>
		<?php echo $form->textArea($model,'provincial_address',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'provincial_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'is_head'); ?>
		<?php echo $form->textField($model,'is_head'); ?>
		<?php echo $form->error($model,'is_head'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'household_id'); ?>
		<?php echo $form->textField($model,'household_id'); ?>
		<?php echo $form->error($model,'household_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthplace'); ?>
		<?php echo $form->textArea($model,'birthplace',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'birthplace'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'civil_status'); ?>
		<?php echo $form->textField($model,'civil_status'); ?>
		<?php echo $form->error($model,'civil_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spouse_name'); ?>
		<?php echo $form->textField($model,'spouse_name',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'spouse_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'height'); ?>
		<?php echo $form->textField($model,'height'); ?>
		<?php echo $form->error($model,'height'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight'); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'citizenship'); ?>
		<?php echo $form->textField($model,'citizenship',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'citizenship'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'religion'); ?>
		<?php echo $form->textField($model,'religion',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'religion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_num'); ?>
		<?php echo $form->textField($model,'contact_num',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'contact_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_address'); ?>
		<?php echo $form->textField($model,'email_address',array('size'=>60,'maxlength'=>254)); ?>
		<?php echo $form->error($model,'email_address'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'photo_filename'); ?>
		<?php echo $form->textField($model,'photo_filename',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'photo_filename'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'residency_start'); ?>
		<?php echo $form->textField($model,'residency_start'); ?>
		<?php echo $form->error($model,'residency_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'residency_end'); ?>
		<?php echo $form->textField($model,'residency_end'); ?>
		<?php echo $form->error($model,'residency_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'residency_type'); ?>
		<?php echo $form->textField($model,'residency_type'); ?>
		<?php echo $form->error($model,'residency_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_update_datetime'); ?>
		<?php echo $form->textField($model,'last_update_datetime'); ?>
		<?php echo $form->error($model,'last_update_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'user_id'); ?>
		<?php echo $form->textField($model,'user_id'); ?>
		<?php echo $form->error($model,'user_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($employmentInfo,'position'); ?>
		<?php echo $form->textField($employmentInfo,'position',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($employmentInfo,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($employmentInfo,'employer'); ?>
		<?php echo $form->textField($employmentInfo,'employer',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($employmentInfo,'employer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($employmentInfo,'start_date'); ?>
		<?php echo $form->textField($employmentInfo,'start_date'); ?>
		<?php echo $form->error($employmentInfo,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($employmentInfo,'end_date'); ?>
		<?php echo $form->textField($employmentInfo,'end_date'); ?>
		<?php echo $form->error($employmentInfo,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($governmentInfo,'sss_num'); ?>
		<?php echo $form->textField($governmentInfo,'sss_num'); ?>
		<?php echo $form->error($governmentInfo,'sss_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($governmentInfo,'philhealth_num'); ?>
		<?php echo $form->textField($governmentInfo,'philhealth_num'); ?>
		<?php echo $form->error($governmentInfo,'philhealth_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($governmentInfo,'gsis_num'); ?>
		<?php echo $form->textField($governmentInfo,'gsis_num'); ?>
		<?php echo $form->error($governmentInfo,'gsis_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($governmentInfo,'tin_num'); ?>
		<?php echo $form->textField($governmentInfo,'tin_num'); ?>
		<?php echo $form->error($governmentInfo,'tin_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($governmentInfo,'voters_id'); ?>
		<?php echo $form->textField($governmentInfo,'voters_id'); ?>
		<?php echo $form->error($governmentInfo,'voters_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($governmentInfo,'senior_citizen_num'); ?>
		<?php echo $form->textField($governmentInfo,'senior_citizen_num'); ?>
		<?php echo $form->error($governmentInfo,'senior_citizen_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($governmentInfo,'orange_card_num'); ?>
		<?php echo $form->textField($governmentInfo,'orange_card_num'); ?>
		<?php echo $form->error($governmentInfo,'orange_card_num'); ?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->