<?php
/* @var $this MateriasController */
/* @var $model Materias */

$this->breadcrumbs=array(
	'Materiases'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Materias', 'url'=>array('index')),
	array('label'=>'Create Materias', 'url'=>array('create')),
	array('label'=>'Update Materias', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Materias', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Materias', 'url'=>array('admin')),
);
?>

<h1>View Materias #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'idGrado',
	),
)); ?>
