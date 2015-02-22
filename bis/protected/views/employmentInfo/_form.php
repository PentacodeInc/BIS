	<div class="row">
		<?php echo $form->labelEx($model,'position'); ?>
		<?php echo $form->textField($model,'position',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'position'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'employer'); ?>
		<?php echo $form->textField($model,'employer',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'employer'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'attribute'=>'start_date',
			    'model'=>$model,
			    'language'=>'en-GB',
			    'options'=>array(
			    	'changeMonth'=>'true', 
                    'changeYear'=>'true', 
                    'dateFormat'=>'yy-mm-dd',
			        'showAnim'=>'fold',
			        'showOn'=>'focus',
			    )
			)); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'attribute'=>'end_date',
			    'model'=>$model,
			    'language'=>'en-GB',
			    'options'=>array(
			    	'changeMonth'=>'true', 
                    'changeYear'=>'true', 
			        'showAnim'=>'fold',
			        'showOn'=>'focus',
			    )
			)); ?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>
