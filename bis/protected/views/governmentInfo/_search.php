<?php
/* @var $this GovernmentInfoController */
/* @var $model GovernmentInfo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'sss_num'); ?>
		<?php echo $form->textField($model,'sss_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'philhealth_num'); ?>
		<?php echo $form->textField($model,'philhealth_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'gsis_num'); ?>
		<?php echo $form->textField($model,'gsis_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'tin_num'); ?>
		<?php echo $form->textField($model,'tin_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'voters_id'); ?>
		<?php echo $form->textField($model,'voters_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'senior_citizen_num'); ?>
		<?php echo $form->textField($model,'senior_citizen_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'orange_card_num'); ?>
		<?php echo $form->textField($model,'orange_card_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'personal_info_id'); ?>
		<?php echo $form->textField($model,'personal_info_id'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->