<?php
/* @var $this PoetController */
/* @var $data Poet */
?>

<div class="view">
    <?php  
        $avaSmallUrl = $data->photoImgBehavior->getFileUrl('ava_small');  
        if($avaSmallUrl){  
            echo CHtml::image($avaSmallUrl);  
        }  
    ?>  
	<br />
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode("Просмотреть"), array('view', 'id'=>$data->id)); ?>
	<br />
    <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode("Обновить"), array('update', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('views')); ?>:</b>
	<?php echo CHtml::encode($data->views); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('start_date')); ?>:</b>
	<?php echo CHtml::encode($data->start_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('end_date')); ?>:</b>
	<?php echo CHtml::encode($data->end_date); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('short_text')); ?>:</b>
	<?php echo CHtml::encode($data->short_text); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('text')); ?>:</b>
	<?php echo CHtml::encode($data->text); ?>
	<br />
	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('time')); ?>:</b>
	<?php echo CHtml::encode($data->time); ?>
	<br />

	*/ ?>

</div>