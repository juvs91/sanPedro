<?php
/* @var $this MateriasController */
/* @var $model Materias */

$this->breadcrumbs=array(
	'Materiases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Materias', 'url'=>array('index')),
	array('label'=>'Manage Materias', 'url'=>array('admin')),
);
?>

<h1>Create Materias</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>