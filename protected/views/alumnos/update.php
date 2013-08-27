<?php
/* @var $this AlumnosController */
/* @var $model Alumnos */

$this->breadcrumbs=array(
	'Alumnoses'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Alumnos', 'url'=>array('index')),
	array('label'=>'Create Alumnos', 'url'=>array('create')),
	array('label'=>'View Alumnos', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Alumnos', 'url'=>array('admin')),
);
?>

<h1>Update Alumnos <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>