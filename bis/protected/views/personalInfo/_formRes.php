	<div class="row">
		<?php echo $form->labelEx($model,'residency_start'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'name'=>'residency_start',
			    'language'=>Yii::app()->language=='et' ? 'et' : null,
			    'options'=>array(
			        'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
			        'showOn'=>'button', // 'focus', 'button', 'both'
			        'buttonText'=>Yii::t('ui','Select form calendar'),
			        // 'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.gif',
			        // 'buttonImageOnly'=>true,
			    ),
			    'htmlOptions'=>array(
			        'style'=>'width:80px;vertical-align:top'
			    ),
			)); ?>
		<?php echo $form->error($model,'residency_start'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'residency_end'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'name'=>'residency_end',
			    'language'=>Yii::app()->language=='et' ? 'et' : null,
			    'options'=>array(
			        'showAnim'=>'fold', // 'show' (the default), 'slideDown', 'fadeIn', 'fold'
			        'showOn'=>'button', // 'focus', 'button', 'both'
			        'buttonText'=>Yii::t('ui','Select form calendar'),
			        // 'buttonImage'=>Yii::app()->request->baseUrl.'/images/calendar.gif',
			        // 'buttonImageOnly'=>true,
			    ),
			    'htmlOptions'=>array(
			        'style'=>'width:80px;vertical-align:top'
			    ),
			)); ?>
		<?php echo $form->error($model,'residency_end'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'residency_type'); ?>
		<?php echo $form->dropDownList($model,'residency_type',$model->getResidencyType()); ?>
		<?php echo $form->error($model,'residency_type'); ?>
	</div>