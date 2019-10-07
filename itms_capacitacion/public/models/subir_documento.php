<?php  

	class Documento{
		public function subir_documento($nombre){

			session_start();

			$ruta = "../../temporal/documentos/";
			$nombre_documento = $_POST["nombre"];
			$nombre_documento = strtoupper($nombre_documento);
			$tamaño_documento = $_FILES["archivo_doc"]["size"];

			opendir($ruta);

			$destino = $ruta.$_FILES["archivo_doc"]["name"];

			$ruta_archivo = $_FILES["archivo_doc"]["name"];

			$ruta = copy($_FILES["archivo_doc"]["tmp_name"],$destino);

			$conexion = new PDO ("mysql:host=localhost; dbname=itms_capacitacion", "root", "");
			$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conexion -> exec("SET CHARACTER SET utf8");

			$sql = "SELECT * FROM documento";

			$resultado = $conexion -> prepare($sql);

			$resultado -> execute(array());

			$num_registros = $resultado -> rowCount();

			$resultado -> closeCursor();

			$sql2 = "SELECT * FROM documento";

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

				$sql2 = "INSERT INTO documento (nombre_documento, ruta, tamaño) VALUES ('$nombre_documento', '$destino', '$tamaño_documento')";

				if(!$result2 = $conexion ->query($sql2)){
					die ('Error al insertar los datos [' .$conexion->error .']');
				}

				// include("../views/alerts/alerta_s_archivo.html");
				header("Location: ../views/archivos_documento");
			}
		}
	}

	$nuevo = new Documento();
	$nuevo -> subir_documento($_POST["nombre"]);
?>