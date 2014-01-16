<?php
/* @var $this PoetController */
/* @var $model Poet */

$this->breadcrumbs=array(
	'Poets'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Poet', 'url'=>array('index')),
	array('label'=>'Create Poet', 'url'=>array('create')),
	array('label'=>'Update Poet', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Poet', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Poet', 'url'=>array('admin')),
);
?>

<h1>View Poet #<?php echo $model->name; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'name',
        array('name' => 'photo_id',
            'type'=>'html',
            'value' =>CHtml::image($model->photoImgBehavior->getFileUrl('ava_small'))),
		'views',
		'start_date',
		'end_date',
		'short_text',
		'text',
		'time',
        ),
)); ?>
