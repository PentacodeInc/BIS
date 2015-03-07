	<div class="row">
		<?php echo $form->labelEx($model,'barangay_id'); ?>
		<?php echo $form->textField($model,'barangay_id',array('size'=>20)); ?>
		<?php echo $form->error($model,'barangay_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'first_name'); ?>
		<?php echo $form->textField($model,'first_name',array('size'=>25,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'first_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'middle_name'); ?>
		<?php echo $form->textField($model,'middle_name',array('size'=>25,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'middle_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_name'); ?>
		<?php echo $form->textField($model,'last_name',array('size'=>25,'maxlength'=>35)); ?>
		<?php echo $form->error($model,'last_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'birthdate'); ?>
		<?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'attribute'=>'birthdate',
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
		<?php echo $form->error($model,'birthdate'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'birthplace'); ?>
		<?php //echo $form->textArea($model,'birthplace',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->textField($model,'birthplace',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'birthplace'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'gender'); ?>
		<?php echo $form->dropDownList($model,'gender',$model->getGenders(),array('empty'=>'')); ?>
		<?php echo $form->error($model,'gender'); ?>
	</div>

    <div class="row">
		<?php echo $form->labelEx($model,'precinct_no'); ?>
		<?php echo $form->dropDownList($model,'precinct_no',$model->getPrecintNo(),array('empty'=>'')); ?>
		<?php echo $form->error($model,'precinct_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'house_num'); ?>
		<?php echo $form->textField($model,'house_num',array('size'=>13,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'house_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'street'); ?>
		<?php echo $form->dropDownList($model,'street',Street::getAll(),array('empty'=>'','style'=>'width:230px')); ?>
		<?php echo $form->error($model,'street'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provincial_address'); ?>
		<?php //echo $form->textArea($model,'provincial_address',array('rows'=>6, 'cols'=>50)); ?>
        <?php echo $form->textField($model,'provincial_address',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'provincial_address'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'civil_status'); ?>
		<?php echo $form->dropDownList($model,'civil_status',$model->getCivilStatus(),array('empty'=>'')); ?>
		<?php echo $form->error($model,'civil_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'spouse_name'); ?>
		<?php echo $form->textField($model,'spouse_name',array('size'=>98,'maxlength'=>120)); ?>
		<?php echo $form->error($model,'spouse_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'height'); ?>
		<?php echo $form->textField($model,'height'); ?>
		<?php echo $form->error($model,'height'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'weight'); ?>
		<?php echo $form->textField($model,'weight'); ?>
		<?php echo $form->error($model,'weight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'citizenship'); ?>
		<?php echo $form->dropDownList($model,'citizenship',$model->getCitizenship(),array('empty'=>'','style'=>'width:150px')); ?>
        <?php echo $form->textField($model,'otherCitizenship',array('size'=>40,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'citizenship'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'religion'); ?>
		<?php echo $form->textField($model,'religion',array('size'=>25,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'religion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contact_num'); ?>
		<?php echo $form->textField($model,'contact_num',array('size'=>20,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'contact_num'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_address'); ?>
		<?php echo $form->textField($model,'email_address',array('size'=>57,'maxlength'=>254)); ?>
		<?php echo $form->error($model,'email_address'); ?>
	</div>	