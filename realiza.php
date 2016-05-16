<html>
<?php
    $id_Type= $_POST['cardtype'];
    $id_Attribute= $_POST['attribute'];
    $id_Level = $_POST['level'];
    $id_ATK = $_POST['atk'];
    $id_DEF = $_POST['def'];
    $id_Der = $_POST['Der'];
    $id_Izq = $_POST['Izq'];
    $id_name = $_FILES['imagen']['name'];
    $id_imgtype = $_FILES['imagen']['type'];
    
    
    
    
   /////////////////////////////////////////////////
   if ($_FILES["imagen"]["error"] > 0){
	//echo "ha ocurrido un error";
} else {
	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb


	//ahora vamos a verificar si el tipo de archivo es un tipo de imagen permitido.
	//y que el tamano del archivo no exceda los 100kb
	$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
	$limite_kb = 20000000;

	if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite_kb * 1024){
		//esta es la ruta donde copiaremos la imagen
		//recuerden que deben crear un directorio con este mismo nombre
		//en el mismo lugar donde se encuentra el archivo subir.php
		$ruta = "imagenes/" . $_FILES['imagen']['name'];
		//comprovamos si este archivo existe para no volverlo a copiar.
		//pero si quieren pueden obviar esto si no es necesario.
		//o pueden darle otro nombre para que no sobreescriba el actual.
		
			//aqui movemos el archivo desde la ruta temporal a nuestra ruta
			//usamos la variable $resultado para almacenar el resultado del proceso de mover el archivo
			//almacenara true o false
			$resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);
			if ($resultado){
				//echo "el archivo ha sido movido exitosamente";
			} else {
				//echo "ocurrio un error al mover el archivo.";
			}
		
	} else {
		//echo "archivo no permitido, es tipo de archivo prohibido o excede el tamano de $limite_kb Kilobytes<br>";
	}
}

/////////////////////////////////////////////////
    
    
    
    
    
    
    
    //cambiar tamaño de imagen
	
	if ($_FILES['imagen']['name']){
		
				$fichero = "imagenes/".$id_name;
			list($ancho1, $alto1) = getimagesize($fichero);
		 
				// Cargar
			$nw_tam = imagecreatetruecolor(382, 406);
			//$original = imagecreatefrompng($fichero);
		 
			if ($id_imgtype == 'image/jpeg'){
				$original = imagecreatefromjpeg($fichero);
				
			} else {
				if ($id_imgtype == 'image/png'){
					$original = imagecreatefrompng($fichero);
					
				} else {
					if ($id_imgtype == 'image/gif'){
						$original = imagecreatefromgif($fichero);
					}
					
				}
				
			}
		
		 
			// Cambiar el tamaño
			imagecopyresized($nw_tam, $original, 0, 0, 0, 0, 382, 406, $ancho1, $alto1);
			// Imprimir
			imagepng($nw_tam, "img/salida3.png"  );
			//echo '<img src="img/salida3.png"><br>';
		
	}
    


//////////////////
// Creamos las dos imágenes a utilizar 
$imagen1 = imagecreatefromjpeg("plantillas/typecard/".$id_Type.".jpg"); //la plantilla que sera el fondo
$imagen2 = imagecreatefrompng("img/salida3.png"); //la imagen del mono redimensionada

// Copiamos una de las imágenes sobre la otra 
imagecopy($imagen1,$imagen2,10,10,0,0,382,406);

    if(($id_Type == "Spell" ) ||($id_Type == "Trap")){
    $imagen3 = imagecreatefrompng("plantillas/attributes/".$id_Type."1.png"); //imagen del atributo
    imagecopy($imagen1,$imagen3,179,482,0,0,40,40);
    
    }
    else{
    $imagen3 = imagecreatefrompng("plantillas/attributes/".$id_Attribute.".png"); //imagen del atributo
    imagecopy($imagen1,$imagen3,330,445,0,0,40,40);
    
    }
    
    
    if($id_Type == "Xyz"){
        $imagen4 = imagecreatefrompng("plantillas/rank/Rank25.png"); //imagen del rango
       // imagecopy($imagen1,$imagen4,20,445,0,0,40,40);
          $mm = 20;
        for ($i = 1; $i <= $id_Level; $i++){
           imagecopy($imagen1,$imagen4,$mm,450,0,0,25,25);
            $mm = $mm + 25;
        }
        
    } else {
        $imagen4 = imagecreatefrompng("plantillas/level/Starball25.png"); //imagen de los niveles
           $mm = 300;
        for ($i = 1; $i <= $id_Level; $i++){
            imagecopy($imagen1,$imagen4,$mm,450,0,0,25,25);
            $mm = $mm - 25;
        }
        
    }



// Damos salida a la imagen final 
imagepng($imagen1,"img/ejemplo.png" ); 

// Destruimos ambas imágenes 
imagedestroy($imagen2); 
imagedestroy($imagen1); 
imagedestroy($imagen3);
imagedestroy($imagen4);
//echo '<img src="img/ejemplo.png"><br>';





///
////// poner texto en la imagen /// listo el texto

$img2 = imagecreatefrompng("img/ejemplo.png"); 
$rojo = imagecolorallocate($img2, 0xFF, 0x00, 0x00);
$negro = imagecolorallocate($img2, 0x00, 0x00, 0x00);
$azul = imagecolorallocate($img2, 0x00, 0x00, 0xFF);
// Hacer el fondo rojo
//imagefilledrectangle($img2, 0, 0, 299, 99, $rojo);

// Ruta a nuestro archivo de fuente ttf
$letraScale = 'fonts/Bboron.ttf';
$letraATK = 'fonts/arial-black.ttf';

// Dibuja el texto 'PHP Manual' usando un tamaño de fuente de 13
if(($id_Type == "Spell" ) ||($id_Type == "Trap")){
    
    imagefttext($img2, 30, 0, 45, 535, $negro, $archivo_fuente, "");
} else {
    if(($id_Type == "Pendulum_Normal" ) ||($id_Type == "Pendulum_Effect")){
        imagefttext($img2, 30, 0, 65, 535, $negro, $letraATK, $id_ATK);
        imagefttext($img2, 30, 0, 210, 535, $negro, $letraATK, $id_DEF);
        imagefttext($img2, 25, 0, 25, 545, $azul, $letraScale, $id_Der);
        imagefttext($img2, 25, 0, 345, 545, $rojo, $letraScale, $id_Izq);
        
    } else {
        imagefttext($img2, 30, 0, 45, 535, $negro, $letraATK, $id_ATK);
        imagefttext($img2, 30, 0, 230, 535, $negro, $letraATK, $id_DEF);
        
    }
    
}

// Imprimir la imagen al navegador
$time = time();
//echo date("d-m-Y-H:i:s", $time).'<br>';

imagepng($img2, "img/Yu-Gi-Ho.png");
imagedestroy($img2);

$time = time();
//echo date("d-m-Y (H:i:s)", $time).'<br>';


//// termina texto en imagen



?>


</html>