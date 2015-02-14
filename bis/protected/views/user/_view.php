<?php
/* @var $this UserController */
/* @var $data User */
?>

<div class="view user">

    <div class="title"><?php echo CHtml::encode($data->getFullname()); ?></div>
    
    <b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('is_active')); ?>:</b>
	<?php echo CHtml::encode($data->is_active == 0 ? "no" : "yes"); ?>
	<br />

</div>