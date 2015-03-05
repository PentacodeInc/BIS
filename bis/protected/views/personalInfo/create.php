<?php
/* @var $this PersonalInfoController */
/* @var $model PersonalInfo */

$this->breadcrumbs=array(
	'Personal Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List PersonalInfo', 'url'=>array('index')),
	array('label'=>'Manage PersonalInfo', 'url'=>array('admin'), 'visible'=>Access::hasAccess('search')),
    array('label'=>'Batch Add Residents', 'url'=>array('import'), 'visible'=>Access::hasAccess('batch add')),
    array('label'=>'Add Household', 'url'=>array('/household/create'), 'visible'=>Access::hasAccess('add residents')),
);
?>

<h1>Create PersonalInfo</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'personal-info-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>true,
)); ?>
<div class="form personalInfo">
    
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary(array($model,$educationalInfo,$employmentInfo,$familyInfo,$governmentInfo)); ?>
    
    <div class="row">
		<?php echo $form->labelEx($model,'photo_filename'); ?>
		<?php echo $form->fileField($model,'photo_filename',array('style'=>'width:500px')); ?>
		<?php echo $form->error($model,'photo_filename'); ?>
	</div>
    
    <?php $this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs'=>array(
            'Personal Information'=>$this->renderPartial('_form', array('form'=>$form,'model'=>$model),true),
            'Government'=>$this->renderPartial('//governmentInfo/_form', array('form'=>$form,'model'=>$governmentInfo),true), 
            'Residency'=>$this->renderPartial('_formRes', array('form'=>$form,'model'=>$model),true),
            'Family'=>$this->renderPartial('//familyInfo/_form', array('form'=>$form,'model'=>$familyInfo),true),
            'Educational'=>$this->renderPartial('//educationalInfo/_form', array('form'=>$form,'model'=>$educationalInfo),true),
            'Employment'=>$this->renderPartial('//employmentInfo/_form', array('form'=>$form,'model'=>$employmentInfo),true),
        ),
        'options'=>array(
            'collapsible'=>true,
            // 'selected'=>1,
        )
    )); ?>
    
    <div class="clear"></div>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
</div>
<?php $this->endWidget(); ?>
<script type="text/javascript">
    $(document).ready(function(){
         $('#saveHousehold').hide();
        
        $('#addHousehold').click(function(){
            $('#household').show();
            $('#addHousehold').hide();
            $('#saveHousehold').show();
        });

        $('#saveHousehold').click(function(){
            $('#addHousehold').show();
            $('#saveHousehold').hide();
            var household = $('#household').val();
            $.ajax({
                'url' : '<?php echo Yii::app()->createUrl("personalInfo/createHousehold");?>',
                'data' : { 'householdName' : household},
                'type' : 'POST',
                'success' : function (output){
                   if(output.success){
                      $('#PersonalInfo_household_id')
                         .append($("<option></option>")
                         .attr("value",output.houseHold.id)
                         .attr("selected","selected")
                         .text(output.houseHold.name)); 
                         $('#PersonalInfo_is_head').val(1);
                   }else{
                        alert("Already Exist");
                   }
                }
            });
          $('#household').val("");
          $('#household').hide();
        });
    });
</script>