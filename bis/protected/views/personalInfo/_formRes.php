	<div class="row">
		<?php echo $form->labelEx($model,'residency_type'); ?>
		<?php echo $form->dropDownList($model,'residency_type',$model->getResidencyType(),array('empty'=>'','style'=>'width:150px','options'=>array(0 =>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'residency_type'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'residency_start'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'attribute'=>'residency_start',
			    'model'=>$model,
			    'language'=>'en-GB',
			    'options'=>array(
			    	'changeMonth'=>'true', 
                    'changeYear'=>'true', 
                    'dateFormat'=>'yy-dd-mm',
                    'yearRange'=>'-100:+0',
			        'showAnim'=>'fold',
			        'showOn'=>'focus',
			    )
			)); ?>
		<?php echo $form->error($model,'residency_start'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'residency_end'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'attribute'=>'residency_end',
			    'model'=>$model,
			    'language'=>'en-GB',
			    'options'=>array(
			    	'changeMonth'=>'true', 
                    'changeYear'=>'true', 
                    'dateFormat'=>'yy-dd-mm',
                    'yearRange'=>'-70:+5',
			        'showAnim'=>'fold',
			        'showOn'=>'focus',
			    )
			)); ?>
		<?php echo $form->error($model,'residency_end'); ?>
	</div>
