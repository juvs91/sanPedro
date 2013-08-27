<?php
/* @var $this MateriasController */
/* @var $model Materias */

$this->breadcrumbs=array(
	'Materiases'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Materias', 'url'=>array('index')),
	array('label'=>'Create Materias', 'url'=>array('create')),
	array('label'=>'View Materias', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Materias', 'url'=>array('admin')),
);
?>

<h1>Update Materias <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>