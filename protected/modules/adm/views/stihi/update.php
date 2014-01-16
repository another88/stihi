<?php
/* @var $this StihiController */
/* @var $model Stihi */

$this->breadcrumbs=array(
	'Stihis'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Stihi', 'url'=>array('index')),
	array('label'=>'Create Stihi', 'url'=>array('create')),
	array('label'=>'View Stihi', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Stihi', 'url'=>array('admin')),
);
?>

<h1>Update Stihi <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'poet'=>$poet)); ?>