<?php
/* @var $this PersonalInfoController */
/* @var $model PersonalInfo */

$this->breadcrumbs=array(
	'Personal Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List PersonalInfo', 'url'=>array('index')),
	//array('label'=>'Manage PersonalInfo', 'url'=>array('admin'), 'visible'=>Access::hasAccess('search')),
    array('label'=>'Batch Add Residents', 'url'=>array('import'), 'visible'=>Access::hasAccess('batch add')),
    //array('label'=>'Add Household', 'url'=>array('/household/create'), 'visible'=>Access::hasAccess('add residents')),
);
?>
<?php if($model->isNewRecord) : ?>
<h1>Add Residents</h1>
<?php endif; ?>
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
        <?php if(!empty($model->photo_filename)) {?>
        <div class="resPic"><img src="<?php echo Yii::app()->request->baseUrl.'/images/userimage/'.$model->photo_filename?>" width="100"/></div>
        <?php } ?>
        <div class="resDetails">
            <div class="resName"><?php echo $model->getFullName(); ?></div>
            <?php if(!empty($model->barangay_id)) {?>
            <div class="resNumber"><i>Barangay ID: </i><?php if($model->barangay_id) echo $model->barangay_id; else ""; ?></div>
            <?php } ?>
            <div class="resStatus"><i>Status: </i><?php echo $model->getResidencyStatus(); ?></div>
        </div>
        <div class="clear"></div>
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
    $(document).ready(function(e){
       
         $('#saveHousehold').hide();

         $('#PersonalInfo_civil_status').change(function(e){
            if(this.value != '0'){
                $('#PersonalInfo_spouse_name').prop('disabled',false);
            }else{
                $('#PersonalInfo_spouse_name').prop('disabled',true);
            }
         });

         $('#PersonalInfo_citizenship').change(function(e){
            if(this.value === 'Dual' || this.value === 'Foreigner'){
             $('#PersonalInfo_otherCitizenship').prop('disabled',false);
           }else{
             document.getElementById("PersonalInfo_otherCitizenship").value="";
             $('#PersonalInfo_otherCitizenship').prop('disabled',true);
           }
         });
  
        $('#PersonalInfo_citizenship').trigger('change');
        $('#PersonalInfo_civil_status').trigger('change');  

         $('#btnAddSibbling').click(function(){
            var counter = $('.txtsibbling').size() + 2;
            $('#sibbling_div').append("<input size=55 name='FamilyInfo[member_name]["+(counter)+"]' class='txtsibbling' id='FamilyInfo_member_name_"+(counter)+"' type='text'>");
            $('#sibbling_div').append("<input value='2' name='FamilyInfo[relationship]["+(counter)+"]' id='FamilyInfo_relationship_"+(counter)+"' type='hidden'>");
            $('#sibbling_div').append("<input value='' name='FamilyInfo[id]["+(counter)+"]' id='FamilyInfo_id_"+(counter)+"' type='hidden'>");
            $('#sibbling_div').append("<input type='button' value='Remove' id='btnRemoveSibbling' data-counter="+(counter)+" />");
         });

         $("#sibbling_div").delegate("[id^='btnRemoveSibbling']", "click", function() {
            var selected = $(this).data('counter');
            $('#FamilyInfo_member_name_'+selected).remove();
            $('#FamilyInfo_relationship_'+selected).remove();
            $(this).remove();
            var counter = 3;
            $('#btnAddSibbling').nextAll().each(function () { 
                var name = $(this).attr('name');
                var id = $(this).attr('id');
                var type = $(this).attr('type');
                if(name){
                    if(!name.contains('FamilyInfo[id]'))
                     $(this).prop('name', name.replace(/\d+/,counter));
                }

                if(id){
                    if(!id.contains('FamilyInfo_id'))
                     $(this).prop('id', id.replace(/\d+/,counter));
                }
                  
                if(type ==='button'){
                     $(this).attr('data-counter',counter);
                     counter += 1;
                } 
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