<?php
/* @var $this PersonalInfoController */
/* @var $model PersonalInfo */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'Name'); ?>
		<?php echo $form->textField($model,'fullName',array('size'=>35,'maxlength'=>35)); ?>
	</div>
    
	<div class="row">
		<?php echo $form->label($model,'street'); ?>
        <?php echo $form->dropDownList($model,'street',Street::getAll(),array('empty'=>'')); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
        <?php echo CHtml::resetButton('Reset'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->