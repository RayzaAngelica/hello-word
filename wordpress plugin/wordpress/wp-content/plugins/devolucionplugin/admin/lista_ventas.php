<?php 
	global $wpdb;
	$query = "SELECT * FROM {$wpdb->prefix}ventas";

	$lista_ventas = $wpdb -> get_results($query,ARRAY_A);

	if(empty($lista_ventas)){
		$lista_ventas=array();
	}
?>

<div class="wrap">
	<?php
		echo "<h1 class='wp-heading-inline'>".get_admin_page_title() . "</h1>";
	?>
	<a id="btnnuevo" class="page-title-action">CREAR VENTA </a>
	<br>	<br>	<br>
	<table class="wp-list-table widefat fixed striped pages">
		<thead>
			<th>Nombre Cliente</th>
      <th>Producto Id</th>
      <th>Total</th>
			<th>Acciones</th>
		</thead>
		<tbody id="the-list">
			<?php 
				foreach ($lista_ventas as $key => $value) {
					$nombre=$value['NombreCliente'];
					$productoId=$value['ProductoId'];
          $total=$value['Total'];
					echo "
						<tr>
							<td>$nombre</td>
							<td>$productoId</td>
              <td>$total</td>
							<td>
							
							<a class='page-title-action'>DEVOLUCION</a>
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
      						<label for="txtnombre" class="col-form-label" style="margin-left:5px"> Pregunta</label>
      					</td>
      					<td>
      						<input type="text" name="name[]" id="name" class="form-control name_list">
      					</td>
      					<td>
      						<button name="add" id="add" class="btn btn-success" style="margin-left:5px">Agregar mas</button>
      					</td>

      				</tr>

      			</table>




      		</div>
      		<div class="modal-footer">
        		<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        		<button type="button" class="btn btn-primary">Guardar</button>
      		</div>
      	</form>

    </div>
  </div>
</div>