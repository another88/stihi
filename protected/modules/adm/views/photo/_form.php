<?php
/* @var $this PhotoController */
/* @var $model Photo */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'photo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pid'); ?>
		<?php echo $form->textField($model,'pid'); ?>
		<?php echo $form->error($model,'pid'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url_full'); ?>
		<?php echo $form->textField($model,'url_full',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url_full'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url_min'); ?>
		<?php echo $form->textField($model,'url_min',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'url_min'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'main'); ?>
		<?php echo $form->textField($model,'main'); ?>
		<?php echo $form->error($model,'main'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->