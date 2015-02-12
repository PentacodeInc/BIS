<?php
/* @var $this FamilyInfoController */
/* @var $data FamilyInfo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('member_name')); ?>:</b>
	<?php echo CHtml::encode($data->member_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('relationship')); ?>:</b>
	<?php echo CHtml::encode($data->relationship); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personal_info_id')); ?>:</b>
	<?php echo CHtml::encode($data->personal_info_id); ?>
	<br />


</div>