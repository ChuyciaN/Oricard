<?php
	//Creamos la base de la imagen donde colocaremos luego las otras dos
	$baseimagen = ImageCreateTrueColor(300,210);
	//Le damos un color a la base, en este caso se utiliza el negro
	$black = ImageColorAllocate($baseimagen, 0, 0, 0);
	//Cargamos la primera imagen(cabecera)
	$logo = ImageCreateFromPng("plantillas/typecard/Normal_Monster.jpg");
	//Unimos la primera imagen con la imagen base
	imagecopymerge($baseimagen, $logo, 0, 0, 0, 0, 300, 89, 100);
	//Cargamos la segunda imagen(cuerpo)
	$ts_viewer = ImageCreateFromPng("plantillas/typecard/Normal_Effect.jpg");
	//Juntamos la segunda imagen con la imagen base
	imagecopymerge($baseimagen, $ts_viewer, 0, 90, 0, 0, 468, 120, 100);
	//Mostramos la imagen en el navegador
	header("Content-Type: image/png");
	ImagePng($baseimagen);
	//Limpiamos la memoria utilizada con las imagenes
	ImageDestroy($logo);
	ImageDestroy($ts_viewer);
	ImageDestroy($baseimagen);
?>