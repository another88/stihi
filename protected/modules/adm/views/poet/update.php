<?php
/* @var $this PoetController */
/* @var $model Poet */

$this->breadcrumbs=array(
	'Poets'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Poet', 'url'=>array('index')),
	array('label'=>'Create Poet', 'url'=>array('create')),
	array('label'=>'View Poet', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Poet', 'url'=>array('admin')),
);
?>

<h1>Update Poet <?php echo $model->name; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>