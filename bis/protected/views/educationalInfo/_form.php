<div class="form education">
    <div class="row mainlabel">
        <?php echo $form->labelEx($model,'Elementary'); ?>
        <?php echo $form->hiddenField($model,'level[0]', array('value'=>0)); ?>
    </div>
    <div class="clear"></div>
    <div class="row">
        <?php echo $form->labelEx($model,'school'); ?>
        <?php echo $form->textField($model,'school[0]',array('size'=>60)); ?>
    </div>

    <div class="row inlineDisplay">
        <?php echo $form->labelEx($model,'start_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'attribute'=>'start_date[0]',
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
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'end_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'attribute'=>'end_date[0]',
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
    </div>
     
    <div class="row">
        <?php echo $form->labelEx($model,'course'); ?>
        <?php echo $form->textField($model,'course[0]',array('size'=>48)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'remarks'); ?>
        <?php echo $form->textField($model,'remarks[0]', array('size'=>60)); ?>
    </div>
</div>

<div class="form education">
    <div class="row mainlabel">
        <?php echo $form->labelEx($model,'Secondary'); ?>
        <?php echo $form->hiddenField($model,'level[1]', array('value'=>1)); ?>
    </div>
     <div class="clear"></div>
    <div class="row">
        <?php echo $form->labelEx($model,'school'); ?>
        <?php echo $form->textField($model,'school[1]',array('size'=>60)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'start_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'attribute'=>'start_date[1]',
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
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'end_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'attribute'=>'end_date[1]',
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
    </div>
     
    <div class="row ">
        <?php echo $form->labelEx($model,'course'); ?>
        <?php echo $form->textField($model,'course[1]',array('size'=>48)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'remarks'); ?>
        <?php echo $form->textField($model,'remarks[1]',array('size'=>60)); ?>
    </div>
</div>

<div class="form education">
    <div class="row mainlabel">
        <?php echo $form->labelEx($model,'Tertiary'); ?>
        <?php echo $form->hiddenField($model,'level[2]', array('value'=>2)); ?>
    </div>
     <div class="clear"></div>
    <div class="row ">
        <?php echo $form->labelEx($model,'school'); ?>
        <?php echo $form->textField($model,'school[2]',array('size'=>60)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'start_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'attribute'=>'start_date[2]',
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
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'end_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'attribute'=>'end_date[2]',
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
    </div>
     
    <div class="row">
        <?php echo $form->labelEx($model,'course'); ?>
        <?php echo $form->textField($model,'course[2]',array('size'=>48)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'remarks'); ?>
        <?php echo $form->textField($model,'remarks[2]',array('size'=>60)); ?>
    </div>
</div>

<div class="form education">
    <div class="row mainlabel">
        <?php echo $form->labelEx($model,'Vocational'); ?>
        <?php echo $form->hiddenField($model,'level[3]', array('value'=>3)); ?>
    </div>
     <div class="clear"></div>
    <div class="row">
        <?php echo $form->labelEx($model,'school'); ?>
        <?php echo $form->textField($model,'school[3]',array('size'=>60)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'start_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'attribute'=>'start_date[3]',
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
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'end_date'); ?>
        <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array(
			    'attribute'=>'end_date[3]',
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
    </div>
     
    <div class="row">
        <?php echo $form->labelEx($model,'course'); ?>
        <?php echo $form->textField($model,'course[3]',array('size'=>48)); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'remarks'); ?>
        <?php echo $form->textField($model,'remarks[3]',array('size'=>60)); ?>
    </div>
</div>

