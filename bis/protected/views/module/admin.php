<h1>Modules</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'module-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
        'name'
	),
)); ?>
