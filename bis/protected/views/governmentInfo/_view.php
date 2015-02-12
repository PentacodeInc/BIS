<?php
/* @var $this GovernmentInfoController */
/* @var $data GovernmentInfo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('sss_num')); ?>:</b>
	<?php echo CHtml::encode($data->sss_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('philhealth_num')); ?>:</b>
	<?php echo CHtml::encode($data->philhealth_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gsis_num')); ?>:</b>
	<?php echo CHtml::encode($data->gsis_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('tin_num')); ?>:</b>
	<?php echo CHtml::encode($data->tin_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voters_id')); ?>:</b>
	<?php echo CHtml::encode($data->voters_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('senior_citizen_num')); ?>:</b>
	<?php echo CHtml::encode($data->senior_citizen_num); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('orange_card_num')); ?>:</b>
	<?php echo CHtml::encode($data->orange_card_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('personal_info_id')); ?>:</b>
	<?php echo CHtml::encode($data->personal_info_id); ?>
	<br />

	*/ ?>

</div>