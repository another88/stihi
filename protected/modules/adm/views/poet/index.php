<?php
/* @var $this PoetController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Poets',
);

$this->menu=array(
	array('label'=>'Create Poet', 'url'=>array('create')),
	array('label'=>'Manage Poet', 'url'=>array('admin')),
);
?>

<h1>Poets</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
