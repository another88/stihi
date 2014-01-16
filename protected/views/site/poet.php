<?php
/* @var $this SiteController */
/* @var $model ContactForm */
/* @var $form CActiveForm */

$this->pageTitle=Yii::app()->name . ' - Poet';
$this->breadcrumbs=array(
	'Poet',
);
?>
<div id="poet_profile">
    <div class="ramka">
            <?php  
                $avaSmallUrl = $poet->photoImgBehavior->getFileUrl('ava_small');
                if($avaSmallUrl){  
                    echo CHtml::image($avaSmallUrl);  
                }  
            ?> 
    </div>
    <div id="list">
        <div class="top">
            <div class="bottom">
                <div class="content">
                    <ul>
                    <?php foreach ($model as $stih): ?>
                        <li>
                            <a href="/site/stih/id/<?php echo $stih->id; ?>">
                                <?php echo $stih->name; ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>