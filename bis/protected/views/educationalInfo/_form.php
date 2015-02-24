	

	<div class="wide form">
		<?php echo $form->labelEx($model,'Elementary'); ?>
		<?php echo $form->hiddenField($model,'level[0]', array('value'=>0)); ?>
		<div class="row">
			<?php echo $form->labelEx($model,'school'); ?>
			<?php echo $form->textField($model,'school[0]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'start_date'); ?>
			<?php echo $form->textField($model,'start_date[0]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'end_date'); ?>
			<?php echo $form->textField($model,'end_date[0]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'course'); ?>
			<?php echo $form->textField($model,'course[0]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'remarks'); ?>
			<?php echo $form->textField($model,'remarks[0]'); ?>
		</div>
	</div>

	<div class="wide form">
		<?php echo $form->labelEx($model,'Secondary'); ?>
		<?php echo $form->hiddenField($model,'level[1]', array('value'=>1)); ?>
		<div class="row">
			<?php echo $form->labelEx($model,'school'); ?>
			<?php echo $form->textField($model,'school[1]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'start_date'); ?>
			<?php echo $form->textField($model,'start_date[1]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'end_date'); ?>
			<?php echo $form->textField($model,'end_date[1]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'course'); ?>
			<?php echo $form->textField($model,'course[1]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'remarks'); ?>
			<?php echo $form->textField($model,'remarks[1]'); ?>
		</div>
	</div>

	<div class="wide form">
		<?php echo $form->labelEx($model,'Teriary'); ?>
		<?php echo $form->hiddenField($model,'level[2]', array('value'=>2)); ?>
		<div class="row">
			<?php echo $form->labelEx($model,'school'); ?>
			<?php echo $form->textField($model,'school[2]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'start_date'); ?>
			<?php echo $form->textField($model,'start_date[2]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'end_date'); ?>
			<?php echo $form->textField($model,'end_date[2]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'course'); ?>
			<?php echo $form->textField($model,'course[2]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'remarks'); ?>
			<?php echo $form->textField($model,'remarks[2]'); ?>
		</div>
	</div>

	<div class="wide form">
		<?php echo $form->labelEx($model,'Vocational'); ?>
		<?php echo $form->hiddenField($model,'level[3]', array('value'=>3)); ?>
		<div class="row">
			<?php echo $form->labelEx($model,'school'); ?>
			<?php echo $form->textField($model,'school[3]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'start_date'); ?>
			<?php echo $form->textField($model,'start_date[3]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'end_date'); ?>
			<?php echo $form->textField($model,'end_date[3]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'course'); ?>
			<?php echo $form->textField($model,'course[3]'); ?>
		</div>

		<div class="row">
			<?php echo $form->labelEx($model,'remarks'); ?>
			<?php echo $form->textField($model,'remarks[3]'); ?>
		</div>
	</div>

	