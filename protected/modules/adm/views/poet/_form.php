<?php
/* @var $this PoetController */
/* @var $model Poet */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'poet-form',
	'enableAjaxValidation'=>false,
    'htmlOptions' => array(
        'enctype' => 'multipart/form-data',
    ))); ?>
<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'start_date'); ?>
		<?php echo $form->textField($model,'start_date'); ?>
		<?php echo $form->error($model,'start_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'end_date'); ?>
		<?php echo $form->textField($model,'end_date'); ?>
		<?php echo $form->error($model,'end_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'short_text'); ?>
		<?php
        $this->widget('ImperaviRedactorWidget', array(
            // you can either use it for model attribute
            'model' => $model,
            'attribute' => 'short_text',
            // some options, see http://imperavi.com/redactor/docs/
            'options' => array(
                'lang' => 'ru',
            ),
        ));
        ?>
		<?php echo $form->error($model,'short_text'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'text'); ?>
		<?php
        $this->widget('ImperaviRedactorWidget', array(
            // you can either use it for model attribute
            'model' => $model,
            'attribute' => 'text',
            // some options, see http://imperavi.com/redactor/docs/
            'options' => array(
                'lang' => 'ru',
            ),
        ));
        ?>
		<?php echo $form->error($model,'text'); ?>
	</div>
    <div class="row">  
        <?php  
        $avaSmallUrl = $model->photoImgBehavior->getFileUrl('ava_small');  
        if($avaSmallUrl){  
            echo CHtml::image($avaSmallUrl);  
        }  
        ?>  
      
        <?php echo $form->labelEx($model,'photo'); ?>  
        <?php echo $form->fileField($model,'photo');; ?>  
        <?php echo $form->error($model,'photo'); ?>  
    </div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->