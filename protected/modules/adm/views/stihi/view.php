<?php
/* @var $this StihiController */
/* @var $model Stihi */

$this->breadcrumbs=array(
	'Stihis'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Stihi', 'url'=>array('index')),
	array('label'=>'Create Stihi', 'url'=>array('create')),
	array('label'=>'Update Stihi', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Stihi', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Stihi', 'url'=>array('admin')),
);
?>

<h1>View Stihi #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'poet_id',
		'name',
		'date',
		'text',
		'tags',
		'views',
		'time',
	),
)); ?>
