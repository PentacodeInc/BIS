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
		<?php echo $form->dropDownList($model,'residency_type',$model->getResidencyType(),array('empty'=>'','style'=>'width:230px')); ?>
		<?php echo $form->error($model,'residency_type'); ?>
	</div>