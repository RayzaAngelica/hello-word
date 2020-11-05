<?php 
	global $wpdb;

	$tabla = "{$wpdb->prefix}encuestas";
	$tabla2 = "{$wpdb->prefix}encuestas_detalle";

	if (isset($_POST['btnguardar'])) {

		$nombre=$_POST['txtnombre'];
		$query = "SELECT EncuestaId FROM $tabla ORDER BY EncuestaId DESC limit 1";
		$resultado = $wpdb->get_results($query,ARRAY_A);
		$proximoId=$resultado[0]['EncuestaId'] +1;

		$ShortCode = "[ENC_". $proximoId ."]";
		$datos =[
			'EncuestaId' => null,
			'Nombre' => $nombre,
			'ShortCode' => $shortcode
		];
		$wpdb->insert($tabla,$datos);
	}

	$query = "SELECT * FROM {$wpdb->prefix}encuestas";

	$lista_encuestas = $wpdb -> get_results($query,ARRAY_A);

	if(empty($lista_encuestas)){
		$lista_encuestas=array();
	}
?>

<div class="wrap">
	<?php
		echo "<h1 class='wp-heading-inline'>".get_admin_page_title() . "</h1>";
	?>
	<a id="btnnuevo" class="page-title-action">AÑADIR NUEVA </a>
	<br>	<br>	<br>
	<table class="wp-list-table widefat fixed striped pages">
		<thead>
			<th>Nombre de la encuesta</th>
			<th>ShortCode</th>
			<th>Acciones</th>
		</thead>
		<tbody id="the-list">
			<?php 
				foreach ($lista_encuestas as $key => $value) {
					$nombre=$value['Nombre'];
					$shortcode=$value['ShortCode'];
					echo "
						<tr>
							<td>$nombre</td>
							<td>$shortcode</td>
							<td>
							<a class='page-title-action'>Ver estadisticas</a>
							<a class='page-title-action'>Borrar</a>
							</td>
						</tr>
					";
				}
			?>
		</tbody>
	</table>
</div>

<!-- Modal -->
<div  class="modal fade" id="modalnuevo" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Nueva encuesta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      	<form method="post">
      		<div class="modal-body">
        
      			<div class="form-group">
      				<label for="txtnombre" class="col-sm-4 col-form-label"> Nombre de la encuesta</label>
      				<div class?"col-sm-8">
      					<input type="text" id="txtnombre" name="txtnombre" style="width:100%">
      				</div>

      			</div>

      			<h4>Preguntas</h4>
      			<br>
      			<table id="camposdinamicos">
      				<tr>
      					<td>
      						<label for="txtnombre" class="col-form-label" style="margin-right:5px"> Pregunta </label>
      					</td>
      					<td>
      						<input type="text" name="name[]" id="name" class="form-control name_list">
      					</td>
      					<td>
      						<select name="type[]" id="type" class="form-control type_list" style="margin-left:5px">
      							<option value ="1" select>SI - NO</option>
      							<option value="2">Rango 0 - 5</option>
      						</select>

      					</td>
      					<td>
      						<button name="add" id="add" class="btn btn-success" style="margin-left:5px">Agregar mas</button>
      					</td>

      				</tr>

      			</table>




      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        		<button type="button" class="btn btn-primary" name="btnguardar" id="btnguardar">Guardar</button>
      		</div>
      	</form>

    </div>
  </div>
</div>