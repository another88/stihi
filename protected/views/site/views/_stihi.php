<div class="stihi_item">


    <?php echo CHtml::link($data->poet->name,array('/site/poet/','id'=>$data->id)); ?> -
    <?php echo CHtml::link($data->name,array('/site/stih/','id'=>$data->id)); ?>
</div>