    <div class="row">
		<?php echo $form->labelEx($model,'household_id'); ?>
		<?php echo $form->textField($model,'household_id'); ?>
		<?php echo $form->error($model,'household_id'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'is_head'); ?>
		<?php echo $form->dropDownList($model,'is_head',$model->getIsHead()); ?>
		<?php echo $form->error($model,'is_head'); ?>
	</div>