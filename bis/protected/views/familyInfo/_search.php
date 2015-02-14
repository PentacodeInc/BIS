<?php
/* @var $this FamilyInfoController */
/* @var $model FamilyInfo */
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
		<?php echo $form->label($model,'member_name'); ?>
		<?php echo $form->textField($model,'member_name',array('size'=>60,'maxlength'=>120)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'relationship'); ?>
		<?php echo $form->textField($model,'relationship'); ?>
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