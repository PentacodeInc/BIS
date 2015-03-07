	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>100,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employer'); ?>
		<?php echo $form->textField($model,'employer',array('size'=>100,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'employer'); ?>
	</div>