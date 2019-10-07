<?php  

class Login{
	public function validar($documento, $password){

			session_start();

			include("conexion.php");

			$sql = "SELECT * FROM usuarios WHERE documento = '$documento'";

			if(!$result = $db ->query($sql)){
				die ('Ya existe un registro con ese documento [' .$db->error .']');
			}

			while ($row = $result -> fetch_assoc()) {

				$ddocumento = stripslashes($row["documento"]);
				$ppassword = stripslashes($row["password"]);
				$nnombres = stripslashes($row["nombres"]);
				$aapellidos = stripslashes($row["apellidos"]);
				$rrol = stripcslashes($row["rol"]);

				$_SESSION["nombres"] = $nnombres;
				$_SESSION["apellidos"] = $aapellidos;
 			}

		if (password_verify($password, $ppassword) && $documento == $ddocumento && $rrol == "USUARIO") {

			$_SESSION["documento"] = $ddocumento;
			$_SESSION["usuario"] = "USUARIO";
			header("Location: ../views/home_user");

		}else if(password_verify($password, $ppassword) && $documento == $ddocumento && $rrol == "ADMINISTRADOR"){

			$_SESSION["documento"] = $ddocumento;
			$_SESSION["admin"] = "ADMINISTRADOR";
			header("Location: ../views/home");
		}else{

			include("../views/alerts/alerta_d_login.html");
		}
	}
}

	$nuevo = new Login();
	$nuevo -> validar($_POST["documento"], $_POST["password"]);

?>