	<div class="row">
		<?php echo $form->labelEx($model,'member_name'); ?>
		<?php echo $form->textField($model,'member_name',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'member_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'relationship'); ?>
		<?php echo $form->textField($model,'relationship'); ?>
		<?php echo $form->error($model,'relationship'); ?>
	</div>