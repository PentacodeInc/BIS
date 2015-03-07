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
    <div class="row">
        <?php echo $form->labelEx($model,'graduation_date'); ?>
        <?php echo $form->textField($model,'graduation_date[0]'); ?>
    </div>
    <div class="row">
        <?php echo $form->labelEx($model,'remarks'); ?>
        <?php echo $form->textField($model,'remarks[0]', array('size'=>87)); ?>
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
        <?php echo $form->labelEx($model,'graduation_date'); ?>
        <?php echo $form->textField($model,'graduation_date[1]'); ?>
    </div>
    
    <div class="row">
        <?php echo $form->labelEx($model,'remarks'); ?>
        <?php echo $form->textField($model,'remarks[1]',array('size'=>87)); ?>
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
        <?php echo $form->labelEx($model,'graduation_date'); ?>
        <?php echo $form->textField($model,'graduation_date[2]'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'remarks'); ?>
        <?php echo $form->textField($model,'remarks[2]',array('size'=>87)); ?>
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
        <?php echo $form->labelEx($model,'graduation_date'); ?>
        <?php echo $form->textField($model,'graduation_date[3]'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model,'remarks'); ?>
        <?php echo $form->textField($model,'remarks[3]',array('size'=>87)); ?>
    </div>
</div>

