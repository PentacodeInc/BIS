<?php
/* @var $this OfficialController */
/* @var $model Official */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'official-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype' => 'multipart/form-data')
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'picture'); ?>
		<?php echo $form->fileField($model,'picture',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'picture'); ?>
	</div>
    
	<div class="row">
		<?php echo $form->labelEx($model,'about'); ?>
		<?php //echo $form->textArea($model,'about',array('rows'=>10, 'cols'=>60)); ?>
        <?php $this->widget('application.extensions.cleditor.ECLEditor', array(
                'model'=>$model,
                'attribute'=>'about',
                'options'=>array(
                    'width'=>'600',
                    'height'=>250,
                    'useCSS'=>true,
                )
            ));
        ?>
		<?php echo $form->error($model,'about'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'level'); ?>
		<?php echo $form->textField($model,'level'); ?>
		<?php echo $form->error($model,'level'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->