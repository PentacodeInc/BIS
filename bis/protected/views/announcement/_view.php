<?php
/* @var $this AnnouncementController */
/* @var $data Announcement */
?>

<div class="view annoucement">

	<div class="title"><?php echo CHtml::encode($data->title); ?></div>
	<br />

	<div class="text"><?php echo CHtml::decode($data->description); ?></div>
	<br />

    <div class="information">
        <b><?php echo CHtml::encode($data->getAttributeLabel('posted_datetime')); ?>:</b>
        <?php echo CHtml::encode(Yii::app()->dateFormatter->format("MM-dd-yyyy",strtotime($data->posted_datetime))); ?>
        <br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('user_id')); ?>:</b>
        <?php echo CHtml::encode($data->user->username); ?>
    </div>

</div>