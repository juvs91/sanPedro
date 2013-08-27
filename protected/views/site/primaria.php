<?php
$this->pageTitle=Yii::app()->name . ' - primaria';
$this->breadcrumbs=array(
	'primaria',
);
?>

<h1>primaria</h1>

<?php
foreach($materias as $materia){
	echo $materia->nombre;
	echo "<br />";
}
?>