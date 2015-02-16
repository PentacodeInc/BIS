<?php
/* @var $this UserController */
/* @var $model User */

$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

?>

<h1>Manage Users</h1>
<?php if(Yii::app()->user->hasFlash('success')):?>
    <div class="flash-success">
       <?php echo Yii::app()->user->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        array(
            'name'=>'fullName',
            'value' => 'CHtml::link($data->getFullName(),array("user/update", "id"=>$data->id))',
            'type' => 'raw',
        ),
		'username',
        array(
            'name'=>'is_active',
            'value' => '$data->is_active?Yii::t(\'app\',\'Active\'):Yii::t(\'app\', \'Inactive\')',
            'filter' => array('0' => Yii::t('app', 'Inactive'), '1' => Yii::t('app', 'Active')),
        ),
		array(
			'class'=>'CButtonColumn',
            'template'=>'{reset}',
            'buttons' => array(
               'reset' => array(
                   'label' => 'Reset Password', 
                   'options' => array(
                            'confirm' => 'Are you sure you want to reset password?',
                    ),
                   'url' => 'CHtml::normalizeUrl(array("user/resetPassword", "id"=>$data->id))', 
                   'imageUrl' => Yii::app()->baseUrl . '/themes/images/reset.png',
                ),
            ),

		),
	),
)); ?>
