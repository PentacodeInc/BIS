<?php
/* @var $this UserController */
/* @var $model User */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'import-form',
 	'enableAjaxValidation'=>true,
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'household'); ?>
		<?php echo $form->dropDownList($model,'household',Household::getAll(),array('empty'=>'','style'=>'width:230px'));?>
		<?php echo $form->error($model,'household'); ?>
		<input type="text" id="household" style="display:none;">
        
        <span class="row buttons">
		  <input type="button" id="addHousehold" value="Add">
		  <input type="button" id="saveHousehold" value="Save">
        </span>
	</div>
		

	<div class="row">
		<?php echo $form->labelEx($model,'csv_file'); ?>
		<?php echo $form->fileField($model,'csv_file'); ?>
		<?php echo $form->error($model,'csv_file'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton("Submit"); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
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
            console.log(household);
            $.ajax({
                'url' : '<?php echo Yii::app()->createUrl("personalInfo/createHousehold");?>',
                'data' : { 'householdName' : household},
                'type' : 'POST',
                'success' : function (output){
                	console.log(output);
                   if(output.success){
                      $('#ImportForm_household')
                         .append($("<option></option>")
                         .attr("value",output.houseHold.id)
                         .attr("selected","selected")
                         .text(output.houseHold.name)); 
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