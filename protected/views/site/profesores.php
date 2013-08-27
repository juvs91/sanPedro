<?php
if ($profesores != null) {
   foreach ($profesores as $profesor) {
   	echo $profesor->nombre;
	echo $profesor->apellido;
	echo $profesor->titulo;
	echo $profesor->url;
   }
}
?>