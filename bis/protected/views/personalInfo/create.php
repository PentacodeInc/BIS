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

<h1>Add Residents</h1>

<?php $form=$this->beginWidget('CActiveForm', array(
    'id'=>'personal-info-form',
    // Please note: When you enable ajax validation, make sure the corresponding
    // controller action is handling ajax validation correctly.
    // There is a call to performAjaxValidation() commented in generated controller code.
    // See class documentation of CActiveForm for details on this.
    'enableAjaxValidation'=>true,
    'htmlOptions'=>array('enctype' => 'multipart/form-data')
)); ?>
<div class="form personalInfo">
    
    <?php if(!$model->isNewRecord){ ?>
    <div class="residentsInfo">
        <div class="resName"><?php echo $model->getFullName(); ?></div>
        <div class="resNumber"><?php if($model->barangay_id) echo $model->barangay_id; else ""; ?></div>
        <div class="resStatus"><?php echo $model->getResidencyStatus(); ?></div>
    </div>
    <?php } ?>
    
    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo $form->errorSummary(array($model,$governmentInfo,$employmentInfo)); ?>
    
    <?php $this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs'=>array(
            'Personal Information'=>$this->renderPartial('_form', array('form'=>$form,'model'=>$model),true),
            'Government'=>$this->renderPartial('//governmentInfo/_form', array('form'=>$form,'model'=>$governmentInfo),true), 
            'Residency'=>$this->renderPartial('_formRes', array('form'=>$form,'model'=>$model),true),
            'Family'=>$this->renderPartial('//familyInfo/_form', array('form'=>$form,'model'=>$familyInfo),true),
            'Educational'=>$this->renderPartial('//educationalInfo/_form', array('form'=>$form,'model'=>$educationalInfo),true),
            'Employment'=>$this->renderPartial('//employmentInfo/_form', array('form'=>$form,'model'=>$employmentInfo),true),
            'Photo'=>$this->renderPartial('_formPic', array('form'=>$form,'model'=>$model),true)
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
       
         $('#PersonalInfo_otherCitizenship').change();      
         $('#PersonalInfo_citizenship').change(function(e){
           if(this.value==='Dual'){
              $('#PersonalInfo_otherCitizenship').show();
           }else{
            $('#PersonalInfo_otherCitizenship').hide();
           }
         });
        

         $('#btnAddSibbling').click(function(){
            var counter = $('.txtsibbling').size();

            
            $('#sibbling_div').append("<input size=60 name='FamilyInfo[member_name]["+(counter+3)+"]' class='txtsibbling' id='FamilyInfo_member_name_"+(counter+3)+"' type='text'>");
            $('#sibbling_div').append("<input value='2' name='FamilyInfo[relationship]["+(counter+3)+"]' id='FamilyInfo_relationship_"+(counter+3)+"' type='hidden'>");
            $('#sibbling_div').append("<input type='button' value='Remove' id='btnRemoveSibbling' data="+(counter+3)+" name='remove"+(counter+3)+"' />");
         });


         $("#sibbling_div").delegate("[id^='btnRemoveSibbling']", "click", function() {
            var selected = $(this).attr('data');
            $('#FamilyInfo_member_name_'+selected).remove();
            $('#FamilyInfo_relationship_'+selected).remove();
            $(this).remove();
            var counter = $('.txtsibbling').size();
            console.log(counter);
             $('#sibbling_div > input[id=btnAddSibbling]').each(function () { 
                console.log($(this).attr('name'));
             });
        });
      
       
        
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