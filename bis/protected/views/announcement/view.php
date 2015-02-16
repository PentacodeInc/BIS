<?php
/* @var $this AnnouncementController */
/* @var $model Announcement */

$this->breadcrumbs=array(
	'Announcements'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'View Announcement', 'url'=>array('index')),
	//array('label'=>'Create Announcement', 'url'=>array('create')),
	array('label'=>'Update Announcement', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Announcement', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Announcement', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->title; ?></h1>

<div class="view annoucement">

	<div class="text"><?php echo CHtml::decode($model->description); ?></div>
	<br />

    <div class="information">
        <b><?php echo CHtml::encode($model->getAttributeLabel('posted_datetime')); ?>:</b>
        <?php echo CHtml::encode(Yii::app()->dateFormatter->format("MMM-dd-yyyy",strtotime($model->posted_datetime))); ?>
        <br />

        <b><?php echo CHtml::encode($model->getAttributeLabel('user_id')); ?>:</b>
        <?php echo CHtml::encode($model->user->username); ?>
    </div>

</div>
