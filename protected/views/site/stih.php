<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Poet';
$this->breadcrumbs=array(
    $model->poet->name=>array(
        "site/poet/id/{$model->poet->id}"
    ),
    $model->name,
);
?>
<div id="poet_profile">
    <div class="ramka">
        <?php
        $avaSmallUrl = $model->poet->photoImgBehavior->getFileUrl('ava_small');
        if($avaSmallUrl){
            echo CHtml::image($avaSmallUrl);
        }
        ?>
    </div>
    <div id="list">
        <div class="top">
           <?php $this->widget('zii.widgets.CBreadcrumbs', array(
                'links'=>$this->breadcrumbs,
            ));
           ?>
            <div class="bottom">
                <div class="content">
                    <?php echo $model->text; ?>
                </div>
            </div>
        </div>
    </div>
</div>