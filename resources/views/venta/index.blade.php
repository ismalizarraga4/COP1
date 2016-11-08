@extends('layouts.principal')

@section('content')			
			<div class="mod_ctl bs-example-modal-lg">
				<div class="modal-header">
					<h4 class="modal-title" id="">Registro Venta</h4>
				</div>
				<input type="hidden" name="_token" value= "{{csrf_token()}}" id="token">
				<div class="modal-body">
					<div class="venta_content">
						<div class="mos_ctl">
							<span class="ctl_venta">Cliente</span><input id="npt_vent" type="text" class="form-control npt_vent" autocomplete="off"><input type="checkbox" id="idctl_ag" value="" style="display:none;"><span id="vtn_rfc"></span>
							<div id="par_clientes">
								<ul id="list_ctl">
									
								</ul>
								
							</div>
							
						</div>
						<hr class="sepa_venta">
						<div class="mos_ctl">
							<span class="ctl_venta">Articulo</span><input id="npta_vent" type="text" class="form-control npt_vent" autocomplete="off"><input type="checkbox" id="idart_ag" value="" style="display:none;"><button id="agrega_producto" type="button" class="btn" ><span class="glyphicon glyphicon-plus"></span></button>
							<div id="par_articulos">
								<ul id="list_art">
									
								</ul>
								
							</div>
							
						</div>
						<hr class="sep_venta">
						<div class="form_ventas">
							<table class="table table-hover thead2"> 
								<thead> 
									<tr> 
										<!-- <th>#</th>  -->
										<th width="39%">Descri&oacute;n Articulo</th> 
										<th width="15%">Modelo</th> 
										<th width="10%">Cantidad</th> 
										<th width="15%">Precio</th> 
										<th width="15%">Importe</th>
										<th width="5%"></th>
									</tr> 
								</thead> 
							</table>
							<table id="lista_ventas" class="table table-hover"> 
								<thead id="obj_venta"> 
									
								</thead> 
							</table>
						</div>
						<hr class="sep_venta">
						<div class="total_venta">
							<p>
								<span class="titxt_total">Enganche: </span> <span id="enganche_venta" class="cont_total"></span>
							</p>
							<p>
								<span class="titxt_total">Bonificacion Enganche: </span> <span id="bonificacion_venta" class="cont_total"></span>
							</p>
							<p>
								<span class="titxt_total">Total: </span> <span id="total_venta" class="cont_total"></span>
							</p>
						</div>
						<div class="opc_abono">
							<div class="thead"><p class="txt_am">ABONOS MENSUALES</p></div>
							<form action="" autocomplete="off">
								<table class="table table-hover">
									<tbody> 
										<tr id="tipoabono1">
											<td id="titulot" width="15%">3 ABONOS DE: </td>
											<td id="abonomt" width="15%"></td>
											<td id="totalpt" width="30%"></td>
											<td id="ahorromt" width="30%"></td>
											<td id="selecmt" width="9%"><input type="radio" name="tabono" data-abono=""></td>
										</tr> 
										<tr id="tipoabono2">
											<td id="titulos" width="15%">6 ABONOS DE: </td>
											<td id="abonoms" width="15%"></td>
											<td id="totalps" width="30%"></td>
											<td id="ahorroms" width="30%"></td>
											<td id="selecms" width="9%"><input type="radio" name="tabono" data-abono=""></td>
										</tr> 
										<tr id="tipoabono3">
											<td id="titulon" width="15%">9 ABONOS DE: </td>
											<td id="abonomn" width="15%"></td>
											<td id="totalpn" width="30%"></td>
											<td id="ahorromn" width="30%"></td>
											<td id="selecmn" width="9%"><input type="radio" name="tabono" data-abono=""></td>
										</tr>
										<tr id="tipoabono4">
											<td id="titulod" width="15%">12 ABONOS DE: </td>
											<td id="abonomd" width="15%"></td>
											<td id="totalpd" width="30%"></td>
											<td id="ahorromd" width="30%"></td>
											<td id="selecmd" width="9%"><input type="radio" name="tabono" data-abono=""></td>
										</tr>    
									</tbody>
								</table>
							</form>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					
					<button id="cancela_venta" type="button" class="btn btn-danger" data-dismiss="modal">Cancelar <span class="glyphicon glyphicon-remove"></span></button>
					<button id="sig_venta" type="button" class="btn btn-success">Siguiente <span class="glyphicon glyphicon-chevron-right"></span></button>
					<button id="guarda_venta" type="button" class="btn btn-success">Guardar <span class="glyphicon glyphicon-floppy-disk"></span></button>	
				</div>
			</div>
@stop