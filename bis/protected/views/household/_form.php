
	<div class="row">
		<?php echo $form->labelEx($model,'household_id'); ?>
		<?php echo $form->dropDownList($model,'household_id',Household::getAll()); ?>
		<?php echo $form->error($model,'household_id'); ?>
		<?php echo $form->hiddenField($model,'is_head',array('value'=>0)); ?>
		<input type="text" id="household" style="display:none;">
        
        <span class="row buttons">
		  <input type="button" id="addHousehold" value="Add">
		  <input type="button" id="saveHousehold" value="Save">
        </span>
	</div>
	
