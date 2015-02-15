<h1>Reset Password</h1>

<div class="form">
 
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-change-password-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>
    
    <?php echo $form->errorSummary($model); ?>
 
    <div class="row"> 
      <?php echo $form->labelEx($model,'old_password'); ?> 
      <?php echo $form->passwordField($model,'old_password'); ?> 
      <?php echo $form->error($model,'old_password'); ?> 
    </div>
 
    <div class="row"> 
        <?php echo $form->labelEx($model,'new_password'); ?> 
        <?php echo $form->passwordField($model,'new_password'); ?> 
        <?php echo $form->error($model,'new_password'); ?>
    </div>
 
    <div class="row"> 
        <?php echo $form->labelEx($model,'repeat_password'); ?> 
        <?php echo $form->passwordField($model,'repeat_password'); ?> 
        <?php echo $form->error($model,'repeat_password'); ?> 
    </div>
 
    <div class="row buttons">
		<?php echo CHtml::submitButton('Save'); ?>
	</div>
    
  <?php $this->endWidget(); ?>
</div>