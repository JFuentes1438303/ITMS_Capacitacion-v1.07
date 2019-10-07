<?php  

	class Video{
		public function subir_video($nombre){

			session_start();

			$ruta = "../../temporal/videos/";
			$nombre_video = $_POST["nombre"];
			$nombre_video = strtoupper($nombre_video);
			$tamaño_video = $_FILES["archivo_video"]["size"];

			opendir($ruta);

			$destino = $ruta.$_FILES["archivo_video"]["name"];

			$ruta_archivo = $_FILES["archivo_video"]["name"];

			$ruta = copy($_FILES["archivo_video"]["tmp_name"],$destino);

			$conexion = new PDO ("mysql:host=localhost; dbname=itms_capacitacion", "root", "");
			$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conexion -> exec("SET CHARACTER SET utf8");

			$sql = "SELECT * FROM video";

			$resultado = $conexion -> prepare($sql);

			$resultado -> execute(array());

			$num_registros = $resultado -> rowCount();

			$resultado -> closeCursor();

			$sql2 = "SELECT * FROM video";

			$resultado2 = $conexion -> prepare($sql2);
			
			$rruta = array();

			$resultado2 -> execute(array());
			
			while ($row = $resultado2 -> fetch(PDO::FETCH_ASSOC)) {

				$rruta[] = stripcslashes($row["ruta"]);
				$ttamaño = stripcslashes($row["tamaño"]);

			}

			if (in_array($destino, $rruta)) {

				include("../views/alerts/alerta_d_archivo.html");
			}else{

				$sql2 = "INSERT INTO video (nombre_video, ruta, tamaño) VALUES ('$nombre_video', '$destino', '$tamaño_video')";

				if(!$result2 = $conexion ->query($sql2)){
					die ('Error al insertar los datos [' .$conexion->error .']');
				}

				// include("../views/alerts/alerta_s_archivo.html");
				header("Location: ../views/archivos_video");
			}
		}
	}

	$nuevo = new Video();
	$nuevo -> subir_video($_POST["nombre"]);
?>