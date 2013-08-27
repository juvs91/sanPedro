<h1>instalaciones</h1>

<?php 
	if ($fotos!=null) {
		 foreach ($fotos as $foto) {
			 echo $foto->nombre;
			 echo $foto->url;
			 echo $foto->idAlbum0->nombre;
		}
	}else {
		echo "no hay fotos";
	}
 ?>
