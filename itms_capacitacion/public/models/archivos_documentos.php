	<div class="row">
		<div class="col-sm-12 encabezado3">
			Documentos existentes
		</div>
	</div>
	<br>
	<div class="row" style="font-size: 18px">
		<div class="col-sm-4 t_centro negrilla">
			<label>Nombre</label>
		</div>
		<div class="col-sm-4 t_centro negrilla">
			<label>Tamaño</label>
		</div>
		<div class="col-sm-4 t_centro negrilla">
			<label>Descargar</label>
		</div>
	</div>
<?php  

	$conexion = new PDO ("mysql:host=localhost; dbname=itms_capacitacion", "root", "");

	$conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$conexion -> exec("SET CHARACTER SET utf8");

	$directorio = "../../temporal/documentos/";
	$por_pagina = "3";
	$pagina_inicial = 1;
	$raiz = "itms_capacitacion/";

		if(isset($_GET["pagina"])){

			if ($_GET["pagina"] == "1") {
				
			}else{

				$pagina_inicial = $_GET["pagina"];
			}
		}else{

			$pagina_inicial = "1";
		}

	$inicio_registro = ($pagina_inicial - 1) * $por_pagina;

	/*Saber cuantos registros trae la consulta*/
	$sql = "SELECT * FROM documento";


	$resultado = $conexion -> prepare($sql);

	$resultado -> execute(array());

	$num_registros = $resultado -> rowCount();

	$total_paginas = ceil($num_registros/$por_pagina);

	$resultado -> closeCursor();

	/*Mostrar los registros segun limite asignado*/
	$sql2 = "SELECT * FROM documento LIMIT $inicio_registro, $por_pagina";

	$resultado2 = $conexion -> prepare($sql2);

	$resultado2 -> execute(array());
	while ($registro2 = $resultado2 -> fetch(PDO::FETCH_ASSOC)) {
		$nnombre = stripcslashes($registro2["nombre_documento"]);
		$rruta = stripcslashes($registro2["ruta"]);
		$iid = stripcslashes($registro2["id_documento"]);
		$ttamaño = stripcslashes($registro2["tamaño"]);

	echo "<form method='POST' enctype='multipart/form-data'>";
	echo "<div class='row espacio'>";

	echo"<div class='col-sm-4 t_centro'>";
		echo "<a href=\"".$directorio .$rruta."\" target='blanck' class='a_cursos' title='Abrir Archivo'>".$nnombre."<br></a>";
	echo "</div>";

	echo "<div class='col-sm-4 t_centro'>";
		echo "$ttamaño kilobytes";
	echo "</div>";

	echo "<div class='col-sm-4 t_centro'>";
		echo "<a href='../../temporal/documentos/$rruta' class='btn btn-sm btn-outline-info' onclick='return descargar()' title='Descargar Archivo' download='$nnombre'><i class='fas fa-download'></i></a>";
	echo "</div>";
	echo "</div>";
	echo "</form>";
	}	

?>
<br>
<!-- paginacion -->		
<div class="row centro">
	<div class="col-sm-4 t_centro links2">
		<?php  
			echo "Total de archivos: $num_registros";
		?>
	</div>
	<div class="col-sm-4 t_centro">
	<?php  

		$pagina_actual = isset($_GET['pagina']) ? $_GET['pagina'] : '1';
	
		echo "<div class='row centro'>";
			echo "<ul class='pagination pag'>";
	
			if ($pagina_actual != 1) {
	
				echo "<li><a class='btn btn-sm page-link flecha' href='archivos_documento?pagina=".($pagina_actual-1)."'>";
					echo "<i class='fas fa-chevron-left'></i></i>";
				echo "</a>";
			}else{
				echo "<li><a class='btn btn-sm page-link b_disabled' disabled>";
					echo "<i class='fas fa-chevron-left'></i></i>";
				echo "</a>";
			}
			
			echo "<li class='page-item'>";
				
			for ($i=1; $i <= $total_paginas; $i++) { 
				if($pagina_actual == $i){
					echo "<li><a class='btn btn-sm page-link pagina active' href='archivos_documentos?pagina=".$i."'>".$i."</a>";
				}else{
					echo "<li><a class='btn btn-sm page-link pagina' href='archivos_documento?pagina=".$i."'>".$i."</a>";
				}
			}

			if ($pagina_actual != $total_paginas) {
				echo "<li><a class='btn btn-sm page-link flecha' href='archivos_documento?pagina=".($pagina_actual+1)." '>";
					echo "<i class='fas fa-chevron-right'></i></i>";
				echo "</a>";
			}else{
				echo "<li><a class='btn btn-sm page-link b_disabled' disabled>";
					echo "<i class='fas fa-chevron-right'></i>";
				echo "</a>";
			}
			echo "</ul>";
			echo "</div>";
	?>
	</div>
	<div class="col-sm-4 t_centro links2">
		<a href="../views/home" class="links">Volver</a>
	</div>
</div>
</div>
<br>
<br>
<script type="text/javascript">
	function descargar() {

		var respuesta = confirm("Se descargara el archivo seleccionado.");
		
		if (respuesta == true) {
			return true;
		}else{
			return false;
		}
	}
</script>
