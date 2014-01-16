<?php
/* @var $this StihiController */
/* @var $model Stihi */

$this->breadcrumbs=array(
	'Stihis'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Stihi', 'url'=>array('index')),
	array('label'=>'Manage Stihi', 'url'=>array('admin')),
);
?>

<h1>Create Stihi</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'poet'=>$poet)); ?>