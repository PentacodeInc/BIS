<?php
/* @var $this OfficialController */
/* @var $model Official */

$this->breadcrumbs=array(
	'Officials'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Official', 'url'=>array('index')),
	array('label'=>'Create Official', 'url'=>array('create')),
	array('label'=>'Update Official', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Official', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Official', 'url'=>array('admin')),
);
?>

<h1><?php echo $model->name; ?></h1>
<div class="floatleft officialImage">
    <img src="<?php echo Yii::app()->request->baseUrl.'/images/officials/'.$model->picture; ?>">
</div>
<div class="official_info">
    <?php echo $model->about; ?>
</div>
