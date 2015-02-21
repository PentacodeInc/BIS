
	<div class="row">
		<?php echo $form->labelEx($model,'household_id'); ?>
		<?php echo $form->dropDownList($model,'household_id',Household::getAll()); ?>
		<?php echo $form->error($model,'household_id'); ?>
		<button>Add</button>
	</div>
	
