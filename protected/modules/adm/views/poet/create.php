<?php
/* @var $this PoetController */
/* @var $model Poet */

$this->breadcrumbs=array(
	'Poets'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Poet', 'url'=>array('index')),
	array('label'=>'Manage Poet', 'url'=>array('admin')),
);
?>

<h1>Create Poet</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>

 <script>
    $(function() {
    $( "#Poet_start_date" ).datepicker({dateFormat:'yy-mm-dd'});
    $( "#Poet_end_date" ).datepicker({dateFormat:'yy-mm-dd'});
    });
</script>