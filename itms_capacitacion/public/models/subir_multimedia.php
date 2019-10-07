<?php  

	class Multimedia{
		public function subir_multimedia($nombre){

			session_start();

			$ruta = "../../temporal/multimedia/";
			$nombre_multimedia = $_POST["nombre"];
			$nombre_multimedia = strtoupper($nombre_multimedia);
			$tamaño_multimedia = $_FILES["archivo_multimedia"]["size"];

			opendir($ruta);

			$destino = $ruta.$_FILES["archivo_multimedia"]["name"];

			$ruta_archivo = $_FILES["archivo_multimedia"]["name"];

			$ruta = copy($_FILES["archivo_multimedia"]["tmp_name"],$destino);

			$conexion = new PDO ("mysql:host=localhost; dbname=itms_capacitacion", "root", "");
			$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conexion -> exec("SET CHARACTER SET utf8");

			$sql = "SELECT * FROM multimedia";

			$resultado = $conexion -> prepare($sql);

			$resultado -> execute(array());

			$num_registros = $resultado -> rowCount();

			$resultado -> closeCursor();

			$sql2 = "SELECT * FROM multimedia";

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

				$sql2 = "INSERT INTO multimedia (nombre_multimedia, ruta, tamaño) VALUES ('$nombre_multimedia', '$destino', '$tamaño_multimedia')";

				if(!$result2 = $conexion ->query($sql2)){
					die ('Error al insertar los datos [' .$conexion->error .']');
				}

				// include("../views/alerts/alerta_s_archivo.html");
				header("Location: ../views/archivos_multimedia");
			}
		}
	}

	$nuevo = new Multimedia();
	$nuevo -> subir_multimedia($_POST["nombre"]);
?>