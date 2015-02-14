<?php
/* @var $this PersonalInfoController */
/* @var $data PersonalInfo */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('barangay_id')); ?>:</b>
	<?php echo CHtml::encode($data->barangay_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('first_name')); ?>:</b>
	<?php echo CHtml::encode($data->first_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('middle_name')); ?>:</b>
	<?php echo CHtml::encode($data->middle_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_name')); ?>:</b>
	<?php echo CHtml::encode($data->last_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthdate')); ?>:</b>
	<?php echo CHtml::encode($data->birthdate); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('gender')); ?>:</b>
	<?php echo CHtml::encode($data->gender); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('address')); ?>:</b>
	<?php echo CHtml::encode($data->address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_head')); ?>:</b>
	<?php echo CHtml::encode($data->is_head); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('household_id')); ?>:</b>
	<?php echo CHtml::encode($data->household_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('provincial_address')); ?>:</b>
	<?php echo CHtml::encode($data->provincial_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('birthplace')); ?>:</b>
	<?php echo CHtml::encode($data->birthplace); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('civil_status')); ?>:</b>
	<?php echo CHtml::encode($data->civil_status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('spouse_name')); ?>:</b>
	<?php echo CHtml::encode($data->spouse_name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('height')); ?>:</b>
	<?php echo CHtml::encode($data->height); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('weight')); ?>:</b>
	<?php echo CHtml::encode($data->weight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('citizenship')); ?>:</b>
	<?php echo CHtml::encode($data->citizenship); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('religion')); ?>:</b>
	<?php echo CHtml::encode($data->religion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_num')); ?>:</b>
	<?php echo CHtml::encode($data->contact_num); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_address')); ?>:</b>
	<?php echo CHtml::encode($data->email_address); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('residence_year')); ?>:</b>
	<?php echo CHtml::encode($data->residence_year); ?>
	<br />

	*/ ?>

</div>