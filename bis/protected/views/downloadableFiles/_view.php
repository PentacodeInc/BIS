<?php
/* @var $this DownloadableFilesController */
/* @var $data DownloadableFiles */
?>

<div class="view">

    <b><?php echo CHtml::encode($data->getAttributeLabel('filename')); ?>:</b>
	<?php echo CHtml::encode($data->filename); ?>
	<br />
    
	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />
    
</div>