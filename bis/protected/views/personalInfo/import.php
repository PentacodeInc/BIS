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
    array('label'=>'Add Residents', 'url'=>array('create'), 'visible'=>Access::hasAccess('add residents')),
    //array('label'=>'Add Household', 'url'=>array('/household/create'), 'visible'=>Access::hasAccess('add residents')),
);
?>

<h1>Batch Residents Addition</h1>

<div class="form">
    
    <p class="note">INSTRUCTIONS:</p>
    <ol>
        <li><?php echo CHtml::link('Download a Copy of .csv template here',Yii::app()->request->baseUrl."/files/bis.csv",array("target"=>"_blank")) ?></li>
        <li>After Downloading, opne in Microsoft Excel</li>
        <li>Fill it up with data. Take note of the following fields</li>
        <img src="<?php echo Yii::app()->request->baseUrl."/images/import.jpg" ?>" />
        <li>Save it. Note that file extension must be .csv NOT .xls</li>
        <li>Upload the completed file below. Fields with <span class="required">*</span> are required.</li>
    </ol>

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'import-form',
 	'enableAjaxValidation'=>true,
     'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	
    
	<?php echo $form->errorSummary($model); ?>
    
	<div class="row">
		<?php echo $form->labelEx($model,'csv_file'); ?>
		<?php echo $form->fileField($model,'csv_file'); ?>
		<?php echo $form->error($model,'csv_file'); ?>
	</div>
    
    <div class="row">
		<?php echo $form->labelEx($model,'street'); ?>
		<?php echo $form->dropDownList($model,'street',Street::getAll(),array('empty'=>'','style'=>'width:230px'));?>
		<?php echo $form->error($model,'street'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton("Submit"); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
