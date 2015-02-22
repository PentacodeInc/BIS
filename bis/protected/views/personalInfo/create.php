<?php
/* @var $this PersonalInfoController */
/* @var $model PersonalInfo */

$this->breadcrumbs=array(
	'Personal Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PersonalInfo', 'url'=>array('index')),
	array('label'=>'Manage PersonalInfo', 'url'=>array('admin')),
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
<div class="form">
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary(array($model,$educationalInfo,$employmentInfo,$familyInfo,$governmentInfo)); ?>
   <?php /*$this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs'=>array(
            'Personal '=>$this->renderPartial('_form', array('form'=>$form,'model'=>$model),true),
            'Educational'=>$this->renderPartial('//educationalInfo/_form', array('form'=>$form,'model'=>$educationalInfo),true),
            'Household' => $this->renderPartial('//household/_form', array('form'=>$form,'model'=>$model),true),
            'Family'=>$this->renderPartial('//familyInfo/_form', array('form'=>$form,'model'=>$familyInfo),true),
            'Government'=>$this->renderPartial('//governmentInfo/_form', array('form'=>$form,'model'=>$governmentInfo),true)
        ),
        'options'=>array(
            'collapsible'=>true,
            // 'selected'=>1,
        ),
        'htmlOptions'=>array(
            'style'=>'width:500px;'
        ),
    ));*/ ?>
    <?php $this->renderPartial('_form', array('form'=>$form,'model'=>$model)); ?>
    <?php $this->renderPartial('//educationalInfo/_form', array('form'=>$form,'model'=>$educationalInfo)); ?>
    <?php $this->renderPartial('//household/_form', array('form'=>$form,'model'=>$model)); ?>
    <?php $this->renderPartial('//employmentInfo/_form', array('form'=>$form,'model'=>$employmentInfo)); ?>
    <?php $this->renderPartial('//familyInfo/_form', array('form'=>$form,'model'=>$familyInfo)); ?>
    <?php $this->renderPartial('//governmentInfo/_form', array('form'=>$form,'model'=>$governmentInfo)); ?>
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
</div>
<?php $this->endWidget(); ?>
<script type="text/javascript">
    $(document).ready(function(){

        $('#addHousehold').click(function(){
             $('#household').show();
        });

        $('#saveHousehold').click(function(){
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