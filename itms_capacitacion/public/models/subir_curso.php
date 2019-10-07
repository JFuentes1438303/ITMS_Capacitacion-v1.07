<?php  
	
	class Archivo{
		public function subir($nombre){

			session_start();
			
			$documento = $_SESSION['documento'];
			$ruta = "../../temporal/";
			$nombre_archivo = $_POST['nombre'];
			$nombre_archivo = strtoupper($nombre_archivo);
			$tipo_archivo = $_FILES['archivo']['type'];
			$tamaño_archivo = $_FILES['archivo']['size'];
			opendir($ruta);

			$destino = $ruta.$documento.$_FILES['archivo']['name'];

			$ruta_archivo = $_FILES['archivo']['name'];

			$ruta = copy($_FILES['archivo']['tmp_name'],$destino);

			$conexion = new PDO ("mysql:host=localhost; dbname=itms_capacitacion", "root", "");
			$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$conexion -> exec("SET CHARACTER SET utf8");

			$sql = "SELECT * FROM archivos WHERE documento = '$documento'";

			$resultado = $conexion -> prepare($sql);

			$resultado -> execute(array());

			$num_registros = $resultado -> rowCount();

			$resultado -> closeCursor();

			$sql2 = "SELECT * FROM archivos WHERE documento = '$documento'";

			$resultado2 = $conexion -> prepare($sql2);
			
			$rruta = array();

			$resultado2 -> execute(array());
			
			while ($row = $resultado2 -> fetch(PDO::FETCH_ASSOC)) {

				$ddocumento = stripcslashes($row["documento"]);
				$rruta[] = stripcslashes($row["ruta"]);
				$ttamaño = stripcslashes($row["tamaño"]);

			}

			/*Evaluar el array $rruta si encuentra archivos repetidos*/
			if (in_array($destino, $rruta)) {

				include("../views/alerts/alerta_d_archivo.html");
			}else{

				$sql2 = "INSERT INTO archivos (nombre_archivo, ruta, tipo, tamaño, documento) VALUES ('$nombre_archivo','$destino', '$tipo_archivo', '$tamaño_archivo', '$documento')";

				if(!$result2 = $conexion ->query($sql2)){
					die ('Error al insertar los datos [' .$conexion->error .']');
				}

				header("Location: ../views/mis_cursos.php");
				// include("../views/alerts/alerta_s_archivo.html");
			}
		}
	}

	$nuevo = new Archivo();
	$nuevo -> subir($_POST['nombre']);
?>

