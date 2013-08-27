<?php
/* @var $this AlumnosController */
/* @var $model Alumnos */

$this->breadcrumbs=array(
	'Alumnoses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Alumnos', 'url'=>array('index')),
	array('label'=>'Manage Alumnos', 'url'=>array('admin')),
);
?>

<h1>Create Alumnos</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>