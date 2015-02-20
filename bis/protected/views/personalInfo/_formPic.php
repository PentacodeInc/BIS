	<div class="row">
		<?php echo $form->labelEx($model,'photo_filename'); ?>
		<?php echo $form->textField($model,'photo_filename',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'photo_filename'); ?>
	</div>