<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">

	<title>Facturacion</title>
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-12 mt-5">
				<h1 class="tex-center">Facturación</h1>
				<hr style="background-color: black; color: black; height: 1px">
			</div>
		</div>
		<div class="row">
			<div class="col-md-12 mt-2">
				<!-- INSERTAMOS MODAL-->

				<!-- Boton principal para añadir -->
				<button type="button" class="btn btn-outline-primary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">
					Añadir Facturas
				</button>

				<!-- Vista de Registro -->
				<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Registro</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form action="" method="post" id="form">

									<form action="" method="post" id="form">
										<div class="form-group">
											<label for="">Folio</label>
											<input type="text" id="folio" class="form-control">
										</div>
										<div class="form-group">
											<label for="">Empresa</label>
											<input type="text" id="empresa" class="form-control">
										</div>
										<div class="form-group">
											<label for="">Correo</label>
											<input type="correo" id="correo" class="form-control">
										</div>
									</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
								<button type="button" class="btn btn-primary" id="add">Añadir</button>
							</div>
						</div>
					</div>
				</div>
				<!-- registro de edición -->
				<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel">Editar Factura</h5>
								<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
							</div>
							<div class="modal-body">
								<form action="" method="post" id="edit_form">
									<input type = "hidden" id="edit_modal_id" value="">
									<form action="" method="post" id="form">
										<div class="form-group">
											<label for="">Folio</label>
											<input type="text" id="edit_folio" class="form-control">
										</div>
										<div class="form-group">
											<label for="">Empresa</label>
											<input type="text" id="edit_empresa" class="form-control">
										</div>
										<div class="form-group">
											<label for="">Correo</label>
											<input type="correo" id="edit_correo" class="form-control">
										</div>
									</form>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
								<button type="button" class="btn btn-primary" id="update">Actualizar</button>
							</div>
						</div>
					</div>
				</div>


			</div>
		</div>
		<!--Tabla para mostrar los datos-->
		<div class="row">
			<div class="col-md-12 mt-3"></div>
			<table class="table">
				<thead>
					<tr>
						<th>Id</th>
						<th>Folio</th>
						<th>Empresa</th>
						<th>Correo</th>
						<th>Accion</th>
					</tr>
				</thead>
				<tbody id="tbody">

				</tbody>
			</table>
		</div>
	</div>
	<!--Termina Modal-->

	<!-- Optional JavaScript; choose one of the two! -->

	<!-- Option 1: Bootstrap Bundle with Popper -->
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script> <!--Biblioteca para notificaciones-->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> <!--Ayuda a notificar de manera al usuario lanzando mensajes agradables-->
	<!-- Option 2: Separate Popper and Bootstrap JS -->
	<!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
	<!--Funcion de Jquery que realizara el añadido-->
	<script>
		$(document).on("click", "#add", function(e) {
			e.preventDefault();
			
			var folio = $("#folio").val();
			var empresa = $("#empresa").val();
			var correo = $("#correo").val();

			if(folio == "" || empresa=="" || correo==""){
				alert("No ha llenado todos los datos")
			}else{
			//Tomas los datos y en ajax usasa para poder insertarlos en metodo POST
			$.ajax({
				url: "<?php echo base_url(); ?>insert",
				type: "post",
				dataType: "json",
				data: {
					folio: folio,
					empresa: empresa,
					correo: correo
				},
				success: function(data) { //si la condicion se cumple tomas del controlador lo que se  imprima e imprimes si
					fetch(); //vuelve a cargar el fetch
					//usar toastar para dejar bonito la representación de success los datos
					if (data.responce == "success") {
						toastr["success"](data.message)
						toastr.options = {
							"closeButton": true,
							"debug": false,
							"newestOnTop": false,
							"progressBar": true,
							"positionClass": "toast-top-right",
							"preventDuplicates": false,
							"onclick": null,
							"showDuration": "300",
							"hideDuration": "1000",
							"timeOut": "5000",
							"extendedTimeOut": "1000",
							"showEasing": "swing",
							"hideEasing": "linear",
							"showMethod": "fadeIn",
							"hideMethod": "fadeOut"
						}

						$('#exampleModal').modal('hide'); //ocultar el modal despues del registro
						
					} else {
						toastr["error"](data.message)
						toastr.options = {
							"closeButton": true,
							"debug": false,
							"newestOnTop": false,
							"progressBar": true,
							"positionClass": "toast-top-right",
							"preventDuplicates": false,
							"onclick": null,
							"showDuration": "300",
							"hideDuration": "1000",
							"timeOut": "5000",
							"extendedTimeOut": "1000",
							"showEasing": "swing",
							"hideEasing": "linear",
							"showMethod": "fadeIn",
							"hideMethod": "fadeOut"
						}

					}
					//toast bar para mostrar de forma bonita el success

				}
			});
		}

			$("#form")[0].reset(); //ocultas el modalboddy actualizando
		});

		function fetch() { //consulta y mostrará los datos
			$.ajax({
				url: "<?php echo base_url(); ?>fetch",
				type: "post",
				dataType: "json",
				success: function(data) {
					var i = 1;
					var tbody = "";
					for (var key in data) {
						tbody += "<tr>";
						tbody += "<td>" + i++ + "</td>";
						tbody += "<td>" + data[key]['folio'] + "</td>";
						tbody += "<td>" + data[key]['empresa'] + "</td>";
						tbody += "<td>" + data[key]['correo'] + "</td>";
						tbody += `<td>
									<a href="#" id="del" class"btn btn-sm btn-outline-danger" value="${data[key]['id']}"><i 
									class="fas fa-trash-alt"></i></a>
									<a href="#" id="edit" class"btn btn-sm btn-outline-info" value="${data[key]['id']}"><i
									class="fas fa-edit"></i></a>
								</td>`;
						tbody += "/<tr>";
					}
					//se cargaron arriba las clases de font awesome para mostrar los iconos de delete y edit
					$("#tbody").html(tbody);
				}
			});
		}
		fetch();

		$(document).on("click", "#del", function(e) {
			e.preventDefault();
			var del_id = $(this).attr("value");

			if (del_id == "") {
				alert("Delete id required");
			} else {
				//usamos el sweet alert para marcar con estil el borrar
				const swalWithBootstrapButtons = Swal.mixin({
					customClass: {
						confirmButton: 'btn btn-success',
						cancelButton: 'btn btn-danger mr-2'
					},
					buttonsStyling: false
				})

				swalWithBootstrapButtons.fire({
					title: '¿Deseas borrarlo?',
					text: "Una vez borrado no se podrá recuperar",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Borrar',
					cancelButtonText: 'Cancelar',
					reverseButtons: true
				}).then((result) => {
					if (result.isConfirmed) {

						$.ajax({
							url: "<?php echo base_url(); ?>delete",
							type: "post",
							dataType: "json",
							data: {
								del_id: del_id
							},
							success: function(data) {
								fetch();
								if (data.responce == "success") {
									swalWithBootstrapButtons.fire(
										'Borrado!',
										'Tu factura ha sido borrada.',
										'success'
									)
								}
							}
						});
					} else if (
						/* Read more about handling dismissals below */
						result.dismiss === Swal.DismissReason.cancel
					) {
						swalWithBootstrapButtons.fire(
							'Cancelado',
							'No se borro ninguna factura',
							'error'
						)
					}
				})


			}

		});


		$(document).on("click", "#edit", function(e) {
			e.preventDefault();

			var edit_id = $(this).attr("value");

			if (edit_id == "") {
				alert("Edit id required");
			} else {
				$.ajax({
					url: "<?php echo base_url(); ?>edit",
					type: "post",
					dataType: "json",
					data: {
						edit_id: edit_id
					},
					success: function(data) {
                    if (data.response == 'success') { //muestra me duen la vista de modal para editar
                        $('#editModal').modal('show');
                        $("#edit_modal_id").val(data.post.id);
                        $("#edit_folio").val(data.post.folio);
                        $("#edit_empresa").val(data.post.empresa);
						$("#edit_correo").val(data.post.correo);
                    } else {
							toastr["error"](data.message)

							toastr.options = {
							"closeButton": true,
							"debug": false,
							"newestOnTop": false,
							"progressBar": true,
							"positionClass": "toast-top-right",
							"preventDuplicates": false,
							"onclick": null,
							"showDuration": "300",
							"hideDuration": "1000",
							"timeOut": "5000",
							"extendedTimeOut": "1000",
							"showEasing": "swing",
							"hideEasing": "linear",
							"showMethod": "fadeIn",
							"hideMethod": "fadeOut"
							}

						}
					}
				});
			}


		});

		// click actualizar lo datos

		$(document).on("click", "#update", function(e){
			e.preventDefault();

			var edit_id = $("#edit_modal_id").val();
			var edit_folio = $("#edit_folio").val();
			var edit_empresa = $("#edit_empresa").val();
			var edit_correo = $("#edit_correo").val();

			if(edit_id == "" || edit_folio == "" || edit_empresa == "" || edit_correo == ""){
				alert(" all both field is required");
			}else{
				
					$.ajax({
					url: "<?php echo base_url(); ?>update",
					type: "post",
					dataType: "json",
					data: {
						edit_id: edit_id,
						edit_folio: edit_folio,
						edit_empresa: edit_empresa,
						edit_correo: edit_correo
					},
						success: function(data){
						fetch();
							if(data.responce == "success"){ //si es succes
								$('#editModal').modal('hide');
								toastr["success"](data.message)
							
								toastr.options = {
								"closeButton": true,
								"debug": false,
								"newestOnTop": false,
								"progressBar": true,
								"positionClass": "toast-top-right",
								"preventDuplicates": false,
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
								}
								
							}else{
								toastr["error"](data.message)
							
								toastr.options = {
								"closeButton": true,
								"debug": false,
								"newestOnTop": false,
								"progressBar": true,
								"positionClass": "toast-top-right",
								"preventDuplicates": false,
								"onclick": null,
								"showDuration": "300",
								"hideDuration": "1000",
								"timeOut": "5000",
								"extendedTimeOut": "1000",
								"showEasing": "swing",
								"hideEasing": "linear",
								"showMethod": "fadeIn",
								"hideMethod": "fadeOut"
								}
							}
						}
				});
			}
		});

	</script>
</body>

</html>