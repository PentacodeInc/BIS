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
    
<?php $form=$this->beginWidget('CActiveForm', array( 
            'id'=>'default-parent-form', 
            'enableAjaxValidation'=>false, 
));?>

    <?php $this->widget('zii.widgets.jui.CJuiTabs', array(
        'tabs' => array(
            'Personal Information'=>  $this->renderPartial('_form',array('form' => $form,'model' => $model,'governmentInfo'=>$governmentInfo),true),
            'Residency'=>  $this->renderPartial('_formRes',array('form' => $form,'model' => $model),true),
            'Family'=>  $this->renderPartial('_formFam',array('form' => $form,'model' => $model),true),
            'Education'=>  $this->renderPartial('_formEdu',array('form' => $form,'model' => $model),true),
            'Employment'=>  $this->renderPartial('_formEmp',array('form' => $form,'model' => $employmentInfo),true),
            'Household'=>  $this->renderPartial('_formHou',array('form' => $form,'model' => $model),true),
            'Photo'=>  $this->renderPartial('_formPic',array('form' => $form,'model' => $model),true),
        ),
    ));
    ?>
    
    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
    </div>
    
<?php $this->endWidget(); ?> 
    
</div>