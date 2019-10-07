<?php  

	class Contraseña{
		public function reestablecer($documento, $nombres, $correo, $n_password, $c_password){

			include("conexion.php");
      $ddocumento = null;
			$sql = "SELECT * FROM usuarios WHERE documento = '$documento'";

			if(!$result = $db ->query($sql)){
                die ('Hay un error en la consulta [' .$db->error .']');
          	}

			while ($row = $result -> fetch_assoc()) {

				$ddocumento = stripcslashes($row["documento"]);
    		$nnombres = stripcslashes($row["nombres"]);
    		$ccorreo = stripcslashes($row["correo"]);
    		$ppassword = stripcslashes($row["password"]);
    	}

    	if ($documento == $ddocumento && $nombres == $nnombres && $correo == $ccorreo && $n_password == $c_password) {
    		
    		$sql2 = "UPDATE usuarios SET password = '$n_password' WHERE documento = '$documento'";

    		if(!$result2 = $db ->query($sql2)){
        	die ('Hay un error en la consulta [' .$db->error .']');
      	}

        include("../views/alerts/alerta_s_reestablecer.html");

    	}else{

    		include("../views/alerts/alerta_d_reestablecer.html");
    	}
		}
	}

	$nuevo = new Contraseña();
	$nuevo -> reestablecer($_POST["documento"], $_POST["nombres"], $_POST["correo"], $_POST["n_password"], $_POST["c_password"]);

?>