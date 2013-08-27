<?php
/* @var $this FotosController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fotoses',
);

$this->menu=array(
	array('label'=>'Create Fotos', 'url'=>array('create')),
	array('label'=>'Manage Fotos', 'url'=>array('admin')),
);
?>

<h1>Fotoses</h1>

<?php foreach ($dataProvider as $data) {
	echo $data->id."<br />";   
	echo $data->nombre."<br />";
	echo "<img src=" .$data->url. "/>";  
	
	
}?>