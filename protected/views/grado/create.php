<?php
/* @var $this GradoController */
/* @var $model Grado */

$this->breadcrumbs=array(
	'Grados'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Grado', 'url'=>array('index')),
	array('label'=>'Manage Grado', 'url'=>array('admin')),
);
?>

<h1>Create Grado</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>