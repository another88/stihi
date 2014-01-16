<?php
/* @var $this StihiController */
/* @var $model Stihi */
/* @var $form CActiveForm */
?>

<div class="form">
<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'stihi-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	<div class="row">
		<?php echo $form->labelEx($model,'poet_id'); ?>
		<?php echo $form->dropDownList($model,'poet_id',$poet); ?>
		<?php echo $form->error($model,'poet_id'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
    <div class="row">
        <?php echo $form->labelEx($model,'tags'); ?>
        <?php echo $form->listBox($model,'tags',Tags::getTagsList(),array('multiple'=>'multiple','class'=>'select_box','options'=>StihTags::getSavedTags($model->id))) ?>
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'date'); ?>
		<?php echo $form->textField($model,'date'); ?>
		<?php echo $form->error($model,'date'); ?>
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

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

 <script>
    $(function() {
        $( "#Stihi_date" ).datepicker({dateFormat:'yy-mm-dd'});
    });
</script>