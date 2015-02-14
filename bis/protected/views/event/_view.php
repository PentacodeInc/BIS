<?php
/* @var $this EventController */
/* @var $data Event */
?>

<div class="view event">

    <div class="title"><?php echo CHtml::encode($data->name); ?></div>
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->start_datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_datetime')); ?>:</b>
	<?php echo CHtml::encode($data->end_datetime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
	<?php echo CHtml::encode($data->user->username); ?>
	<br />


</div>