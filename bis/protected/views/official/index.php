<?php
/* @var $this OfficialController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Officials',
);

$this->menu=array(
	array('label'=>'Create Official', 'url'=>array('create')),
	//array('label'=>'Manage Official', 'url'=>array('admin')),
);
?>

<h1>Officials</h1>

<div class="allofficials">
<?php
$levelcnt ="";
foreach($data as $a){
    $level = $a->level;
    if ($level != $levelcnt){?>
         <div class="newlevel"></div>
    <?php } ?>
    <div class="officials">
        <img src="<?php echo Yii::app()->request->baseUrl.'/images/officials/'.$a->picture; ?>">
        <h4><?php echo CHtml::link($a->name,array("view", "id"=>$a->id)) ?></h4>
        <h4><?php echo $a->position;?></h4>
    </div>
<?php $levelcnt = $level;
} ?>
</div>