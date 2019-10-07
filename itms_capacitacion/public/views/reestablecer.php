<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="../../vendor/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/estilos.css">
	<link rel="shortcut icon" href="../../files/img/ITMS2.ico">
	<title>Reestablecer contraseña</title>
</head>

<body id="fondo">
	
	<div class="container div2 color2">
		<div class="row b_bottom">
			<div class="col-sm-3 color1">
				<img src="../../files/img/Logo ITMS.png" class="logo2">
			</div>
			<div class="col-sm-9 encabezado2">
				Reestablecer contraseña
			</div>
		</div>

		<form action="../models/reestablecer.php" method="POST" name="form4">
			<div id="alerta"></div>
			<div class="row espacio">
				<div class="col-sm-3 t_centro">
					<label for="doc" class="col-form-label">	
						Documento
					</label>            
				</div>
				<div class="col-sm-8">
					<input type="text" class="form-control inputs" id="doc" placeholder="Ingrese el numero de documento del registro.." name="documento" autocomplete="off"> 
				</div>
			</div>

			<div class="row espacio">
				<div class="col-sm-3 t_centro">
					<label for="nombre" class="col-form-label">
						Nombres
					</label>
				</div>
				<div class="col-sm-8">
					<input type="text" class="form-control inputs" id="nombre" placeholder="Ingrese los nombres del registro..." name="nombres" autocomplete="off">
				</div>
			</div>

			<div class="row espacio">
				<div class="col-sm-3 t_centro">
					<label for="email" class="col-form-label">
						Correo electrónico
					</label>
				</div>
				<div class="col-sm-8">
					<input type="text" class="form-control inputs" id="email" placeholder="Ingrese el correo electrónico del registro..." name="correo" autocomplete="off">
				</div>
        	</div>

        	<div class="row espacio">
				<div class="col-sm-3 t_centro">
					<label for="npass" class="col-form-label">
						Nueva contraseña
					</label>
				</div>
				<div class="col-sm-8">
					<input type="password" class="form-control inputs" id="npass" placeholder="Ingrese nueva contraseña" name="n_password" autocomplete="off">
				</div>
			</div>

        	<div class="row espacio">
          		<div class="col-sm-3 t_centro">
            		<label for="cpass" class="col-form-label">
						Confirmar contraseña
					</label>
          		</div>
          		<div class="col-sm-8">
        			<input type="password" class="form-control inputs" id="cpass" placeholder="Ingrese nueva contraseña" name="c_password" autocomplete="off">
          		</div>
        	</div>
        	<div class="row espacio centro">
          		<button type="button" onclick="validar();" class="btn btn-sm btn-outline-dark">
          				Reestablecer
          			</button>
        	</div>

        	<div class="row espacio centro">
          		<a href="../../index.php" class="links">
          			Volver
          		</a>
        	</div>
        <br>
		</form>
	</div>

	<script type="text/javascript" src="../../vendor/js/validar4.js"></script>	

</body>
</html>