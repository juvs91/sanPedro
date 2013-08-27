<?php
/* @var $this ProfesoresController */
/* @var $model Profesores */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'profesores-form',
	'enableAjaxValidation'=>false,    
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
	
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	

	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'apellido'); ?>
		<?php echo $form->textField($model,'apellido',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'apellido'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'seguro'); ?>
		<?php echo $form->textField($model,'seguro',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'seguro'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'roles'); ?>
		<?php echo $form->dropDownList($model,'idRole',CHtml::listData( $roles, 'id' , 'nombre')); ?>
	    <?php echo $form->error($model,'roles'); ?>
	</div>

	<div class="row">
			<?php echo $form->labelEx($model,'image'); ?>
			<?php echo CHtml::activeFileField($model,'image'); ?>
			<?php echo $form->error($model,'image'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->