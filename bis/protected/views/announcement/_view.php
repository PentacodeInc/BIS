<?php
/* @var $this AnnouncementController */
/* @var $data Announcement */
?>

<div class="view annoucement">

	<div class="title">
        <?php $title=CHtml::encode($data->subject); ?>
        <?php echo CHtml::link($title,array("announcement/view", "id"=>$data->id)); ?>
    </div>
    
    <div class="information">
        posted by <?php echo CHtml::encode($data->user->username); ?> on
        <?php echo CHtml::encode(Yii::app()->dateFormatter->format("MMM-dd-yyyy",strtotime($data->posted_datetime))); ?>
        
    </div>

	<div class="text">
        <?php //echo CHtml::decode($data->description); ?>
        
        <?php $string=CHtml::decode($data->message);
            $isLong = false;
            $string = $string;
            if (strlen($string) > 1000) {
                $isLong = true;
                $stringCut = substr($string, 0, 1000);
                $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
            }
            echo $string;
        ?>
        <div class="readmore">
            <?php if ($isLong) echo CHtml::link("Read More",array("announcement/view", "id"=>$data->id)) ?>
        </div>
    </div>
	<br />

</div>