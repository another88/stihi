<?php
/* @var $this PoetController */
/* @var $model Poet */

$this->breadcrumbs=array(
	'Poets'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Poet', 'url'=>array('index')),
	array('label'=>'Create Poet', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#poet-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Poets</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView', array(
	'id'=>'poet-grid',
        'type'=>'striped bordered condensed',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
        'template'=>"{items}",
	'columns'=>array(
		'id',
		'name',
		'views',
		'start_date',
		'end_date',
		'short_text',
		/*
		'text',
		'time',
		*/
        array(
            'class'=>'bootstrap.widgets.TbButtonColumn',
            'htmlOptions'=>array('style'=>'width: 50px'),
        ),
	),
)); ?>
