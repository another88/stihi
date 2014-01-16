<?php
/* @var $this StihiController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Stihis',
);

$this->menu=array(
	array('label'=>'Create Stihi', 'url'=>array('create')),
	array('label'=>'Manage Stihi', 'url'=>array('admin')),
);
?>

<h1>Stihis</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
