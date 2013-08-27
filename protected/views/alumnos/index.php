<?php
/* @var $this AlumnosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Alumnoses',
);

$this->menu=array(
	array('label'=>'Create Alumnos', 'url'=>array('create')),
	array('label'=>'Manage Alumnos', 'url'=>array('admin')),
);
?>

<h1>Alumnoses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
