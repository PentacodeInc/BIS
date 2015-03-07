    <div class="row">
		<?php echo $form->labelEx($model,'photo_filename'); ?>
		<?php echo $form->fileField($model,'photo_filename',array('style'=>'width:600px')); ?>
		<?php echo $form->error($model,'photo_filename'); ?>
	</div>