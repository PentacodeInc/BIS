	<div class="row">
		<?php //echo "Father's Name"; ?>
        <?php echo $form->labelEx($model,'Father\'s Name'); ?>
		<?php echo $form->textField($model,'member_name[0]',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'member_name[0]'); ?>
	</div>

	<div class="row">
		<?php //echo "Mother's Name"; ?>
        <?php echo $form->labelEx($model,'Monther\'s Name'); ?>
		<?php echo $form->textField($model,'member_name[1]',array('size'=>60,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'member_name[1]'); ?>
	</div>
	
	<div class="row">
		<?php echo $form->hiddenField($model,'relationship[0]',array('value'=>1)); ?>
		<?php echo $form->hiddenField($model,'relationship[1]',array('value'=>0)); ?>
	</div>