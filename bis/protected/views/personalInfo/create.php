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

<div class="form">
<p class="note">Fields with <span class="required">*</span> are required.</p>    
<?php $form=$this->beginWidget('CActiveForm', array( 
            'id'=>'default-parent-form', 
            'enableAjaxValidation'=>false, 
));?>

    <?php echo $form->errorSummary(array($model,$familyInfo,$educationalInfo,$employmentInfo)); ?>
    <?php $this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs' => array(
            'Personal Information'=>  $this->renderPartial('_form',array('form' => $form,'model' => $model,'governmentInfo'=>$governmentInfo),true),
            'Residency'=>  $this->renderPartial('_formRes',array('form' => $form,'model' => $model),true),
            'Family'=>  $this->renderPartial('//familyInfo/_form',array('form' => $form,'model' => $familyInfo),true),
            'Education'=>  $this->renderPartial('//educationalInfo/_form',array('form'=>$form,'model' => $educationalInfo),true),
            'Employment'=>  $this->renderPartial('//employmentInfo/_form',array('form' => $form,'model' => $employmentInfo),true),
            'Household'=>  $this->renderPartial('//household/_form',array('form' => $form,'model' => $model),true),
            'Photo'=>  $this->renderPartial('_formPic',array('form' => $form,'model' => $model),true),
        ),
    ));
    ?>
    
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
    
<?php $this->endWidget(); ?> 
</div>