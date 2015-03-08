<?php
/* @var $this HouseholdController */
/* @var $model Household */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'household-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<!--<p class="note">Fields with <span class="required">*</span> are required.</p>-->

	<?php echo $form->errorSummary($model); ?>

	<?php 	$this->widget('ext.widgets.multiselects.XMultiSelects',array(
		    'leftTitle'=>'Citizen',
		    'leftName'=>'PersonalInfo[][]',
		    'leftList'=>PersonalInfo::model()->findUsers(), //without household_id please show fullname
		    'rightTitle'=>'Household Member',
		    'rightName'=>'Person[][]',
		    'rightList'=>PersonalInfo::model()->findUsers(), //with household_id of the head ctzen please show fullname
		    'size'=>20,
		    'width'=>'100%',
		));
	?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->