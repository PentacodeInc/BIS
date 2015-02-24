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
        <?php echo $form->dropDownList($model,'street',Street::getAll(),array('empty'=>'All')); ?>
	</div>
    
    <div class="row">
		<?php echo $form->label($model,'gender'); ?>
        <?php echo $form->dropDownList($model,'gender',$model->getGenders(),array('empty'=>'All')); ?>
	</div>
    
    <div class="row">
		<?php echo $form->label($model,'age'); ?>
        <?php echo $form->dropDownList($model,'age',$model->getAgeList(),array('empty'=>'All')); ?>
	</div>
    
    <div class="row">
		<?php echo $form->label($model,'civil_status'); ?>
        <?php echo $form->dropDownList($model,'civil_status',$model->getCivilStatus(),array('empty'=>'All')); ?>
	</div>
    
    <div class="row">
		<?php echo $form->label($model,'citizenship'); ?>
        <?php echo $form->dropDownList($model,'citizenship',$model->getCitizenship(),array('empty'=>'All')); ?>
	</div>
    
    <div class="row">
		<?php echo $form->label($model,'residency_type'); ?>
        <?php echo $form->dropDownList($model,'residency_type',$model->getResidencyType(),array('empty'=>'All')); ?>
	</div>
    
    <!--<div class="row">
		<?php //echo $form->label($model,'precinct_no'); ?>
        <?php //echo $form->dropDownList($model,'precinct_no',$model->getPrecinctNo(),array('empty'=>'')); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
        <?php echo CHtml::resetButton('Reset'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->