<?php
/* @var $this AlbumsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Albums',
);

$this->menu=array(
	array('label'=>'Create Albums', 'url'=>array('create')),
	array('label'=>'Manage Albums', 'url'=>array('admin')),
);
?>

<h1>Albums</h1>



<?php foreach ($dataProvider as $data) {
	echo $data->id."<br />";   
	echo $data->nombre."<br />";
	echo "<img src=" .$data->url. "/>";  
	
	
}?>
            

