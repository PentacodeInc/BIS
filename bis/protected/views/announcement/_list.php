<ul class="archives">
<?php $months = Announcement::model()->findAll(array('select'=>'posted_datetime', 'order'=>'Year(posted_datetime),MONTH(posted_datetime)', 'group'=>'MONTH(posted_datetime), Year(posted_datetime)'));
foreach($months as $month){
    $mydate = $month->posted_datetime; 
    $month = date("F",strtotime($mydate));
    $year = date("Y",strtotime($mydate));?>
    <li><?php echo CHtml::link($month.", ".$year, array('/site/index', 'month'=>date("m",strtotime($mydate)), 'year'=>$year)); ?></li>
<?php } ?>
</ul>