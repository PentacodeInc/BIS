<?php
/* @var $this EducationalInfoController */
/* @var $model EducationalInfo */
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
		<?php echo $form->label($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'school'); ?>
		<?php echo $form->textArea($model,'school',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'end_date'); ?>
		<?php echo $form->textField($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'course'); ?>
		<?php echo $form->textArea($model,'course',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'remarks'); ?>
		<?php echo $form->textField($model,'remarks',array('size'=>45,'maxlength'=>45)); ?>
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