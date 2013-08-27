<?php
/* @var $this AlbumsController */
/* @var $model Albums */
/* @var $form CActiveForm */
?>
                     
<p>
	<?php echo Yii::app()->basePath; ?>
</p>         
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'albums-form',
	'enableAjaxValidation'=>false,        
    'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

	<p>tiene que ser un nombre diferentes a los seleccionados para otros albums ya existentes</p>
	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
	 	<?php echo $form->labelEx($model,'image'); ?>
		<?php echo CHtml::activeFileField($model,'image'); ?>
		<?php echo $form->error($model,'image'); ?>	
   	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->