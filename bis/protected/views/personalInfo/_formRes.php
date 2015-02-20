<div class="form">

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

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
		<?php echo $form->textField($model,'residency_type'); ?>
		<?php echo $form->error($model,'residency_type'); ?>
	</div>

</div><!-- form -->