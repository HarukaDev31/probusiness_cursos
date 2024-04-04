<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Geancarlos collazos, escala tu startup y automatiza tú negocio">
		<meta name="generator" content="">
		
		<link rel="shortcut icon" href="<?php echo base_url("assets/images/favicon.ico?ver=5.0"); ?>">
		<link rel="apple-touch-icon-precomposed" sizes="192x192" href="<?php echo base_url("assets/images/android-chrome-512x512.png?ver=5.0"); ?>">
		<link rel="apple-touch-icon-precomposed" sizes="192x192" href="<?php echo base_url("assets/images/android-chrome-192x192.png?ver=5.0"); ?>">
		<link rel="apple-touch-icon-precomposed" sizes="32x32" href="<?php echo base_url("assets/images/favicon-32x32.png?ver=5.0"); ?>">
		<link rel="apple-touch-icon-precomposed" sizes="16x16" href="<?php echo base_url("assets/images/favicon-16x16.png?ver=5.0"); ?>">
		<link rel="apple-touch-icon-precomposed" sizes="16x16" href="<?php echo base_url("assets/images/apple-touch-icon.png?ver=5.0"); ?>">
		<link rel="shortcut icon" href="<?php echo base_url("assets/images/favicon.png?ver=5.0.0"); ?>" type="image/png">
	  	<link rel="icon" href="<?php echo base_url("assets/images/favicon.png?ver=5.0.0"); ?>" type="image/png">
		
		<title>ProBusiness | Curso de Importación</title>

		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

		<!--select2-->
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

		<link rel="stylesheet" href="<?php echo base_url("assets/css/style_curso_registro.css?ver=6.0.0"); ?>">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

		<meta name="theme-color" content="#FF6700">
		<meta name="msapplication-navbutton-color" content="#FF6700"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="msapplication-navbutton-color" content="#FF6700" />
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		
  	</head>
	<body class="bg-light">
		<main>
			<div class="container mt-5">
				<div class="row justify-content-center">
					<div class="col-md-6 home-div-card">
						<?php
						$attributes = array('id' => 'form-registro');
						echo form_open('', $attributes);
						?>
							<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4 text-center">
								<h4 class="modal-title fw-bold" id="">Regístrate</h4>
							</div>
							
							<div class="row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-7 mb-3">
									<label class="fw-bold mb-2" for="floatEmail">Email</label>
									<div class="form-group">
										<input type="email" inputmode="email" class="form-control" id="email" name="email" placeholder="">
										<span class="help-block text-danger" id="error"></span>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-5 mb-3">
                  					<input type="hidden" value="51" id="codigo_pais" name="codigo_pais" class="form-control">
									<label for="celular" class="fw-bold mb-2">Celular</label>
									<div class="form-group">
										<input type="text" inputmode="tel" class="form-control input-number w-100" id="celular" name="celular" placeholder="" style="width: 100%;">
										<span class="help-block text-danger" id="error"></span>
									</div>
								</div>

								<div class="col-12 col-sm-4 col-md-6 col-lg-6 mb-4">
									<label class="fw-bold mb-2">T. Doc. Ident.</label>
									<div class="form-group">
										<select name="cbo-tipo_documento_identidad" id="cbo-tipo_documento_identidad" class="form-select form-select-md mb-3" aria-label=".form-select-lg example">
											<option value="0" disabled selected="selected"  style="color: #f2f2f2 !important">- Seleccionar -</option>
											<option value="2" data-nu_cantidad_caracteres="8">DNI</option>
											<option value="4" data-nu_cantidad_caracteres="11">RUC</option>
											<option value="5" data-nu_cantidad_caracteres="12">PASAPORTE</option>
											<option value="1" data-nu_cantidad_caracteres="15">OTROS</option>
											<option value="3" data-nu_cantidad_caracteres="12">CARNET EXTRANJERIA</option>
											<option value="6" data-nu_cantidad_caracteres="15">CEDULA DIPLO. IDENTI</option>
										</select>
										<span class="help-block text-danger" id="error"></span>
									</div>
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
									<label for="dni" class="fw-bold mb-2">Nro. Doc. Ident.</label>
									<div class="form-group">
										<input type="text" class="form-control input-number_letter" id="dni" name="dni" placeholder="">
										<span class="help-block text-danger" id="error"></span>
									</div>
								</div>
							</div>

							<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
								<label for="name" class="fw-bold mb-2">Nombres y Apellidos</label>
								<div class="form-group">
									<input type="text" class="form-control" id="name" name="name" placeholder="">
									<span class="help-block text-danger" id="error"></span>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-sm-5 col-md-5 col-lg-5 mb-3">
									<label for="edad" class="fw-bold mb-2">F. Nacimiento</label>
									<div class="input-group date" id="datepicker">
									<input type="text" class="form-control" id="date" name="date" style="border-top: 0;border-left: 0;border-right: 0;" value="<?php echo dateNow('month_date_report_crud'); ?>" placeholder="Fecha de Viaje" />
									<span class="input-group-append"></span>
									</div>
									<span class="help-block text-danger" id="error"></span>
								</div>

								<div class="col-3 col-sm-4 col-md-4 col-lg-4 mb-3 d-none">
									<label for="edad" class="fw-bold mb-2">Edad</label>
									<div class="form-group">
										<input type="text" inputmode="numeric" class="form-control input-number" id="edad" name="edad" placeholder="">
										<span class="help-block text-danger" id="error"></span>
									</div>
								</div>
							
								<div class="col-12 col-sm-7 col-md-7 col-lg-7 mb-3">
									<label for="radioSexo" class="fw-bold mb-2">Sexo</label>
									<div class="form-group">
										<div>
											<div class="form-check form-check-inline me-1 me-sm-3">
												<input style="cursor: pointer" class="form-check-input" type="radio" name="radioSexo" id="radioSexoH" value="1">
												<label style="cursor: pointer" class="form-check-label" for="radioSexoH">Hombre</label>
											</div>
											<div class="form-check form-check-inline me-1 me-sm-3">
												<input style="cursor: pointer" class="form-check-input" type="radio" name="radioSexo" id="radioSexoM" value="2">
												<label style="cursor: pointer" class="form-check-label" for="radioSexoM">Mujer</label>
											</div>
											<div class="form-check form-check-inline me-1 me-sm-3">
												<input style="cursor: pointer" class="form-check-input" type="radio" name="radioSexo" id="radioSexoO" value="3">
												<label style="cursor: pointer" class="form-check-label" for="radioSexoO">Otros</label>
											</div>
										</div>
										<span class="help-block text-danger" id="error"></span>
									</div>
								</div>
								
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
									<label for="radioSexo" class="fw-bold mb-2">¿Como te enteraste de nosotros?</label>
									<div class="form-group">
										<div>
											<div class="form-check form-check-inline me-1 me-sm-3">
												<input style="cursor: pointer" class="form-check-input" type="radio" name="radioRedSocial" id="radioRedSocial1" value="1">
												<label style="cursor: pointer" class="form-check-label" for="radioRedSocial1">Tiktok</label>
											</div><br>
											<div class="form-check form-check-inline me-1 me-sm-3">
												<input style="cursor: pointer" class="form-check-input" type="radio" name="radioRedSocial" id="radioRedSocial2" value="2">
												<label style="cursor: pointer" class="form-check-label" for="radioRedSocial2">Facebook</label>
											</div><br>
											<div class="form-check form-check-inline me-1 me-sm-3">
												<input style="cursor: pointer" class="form-check-input" type="radio" name="radioRedSocial" id="radioRedSocial3" value="3">
												<label style="cursor: pointer" class="form-check-label" for="radioRedSocial3">Instagram</label>
											</div><br>
											<div class="form-check form-check-inline me-1 me-sm-3">
												<input style="cursor: pointer" class="form-check-input" type="radio" name="radioRedSocial" id="radioRedSocial4" value="4">
												<label style="cursor: pointer" class="form-check-label" for="radioRedSocial4">Youtube</label>
											</div><br>
											<div class="form-check form-check-inline me-1 me-sm-3">
												<input style="cursor: pointer" class="form-check-input" type="radio" name="radioRedSocial" id="radioRedSocial5" value="5">
												<label style="cursor: pointer" class="form-check-label" for="radioRedSocial5">Familiares/Amigos</label>
											</div><br>
											<div class="form-check form-check-inline me-1 me-sm-3">
												<input style="cursor: pointer" class="form-check-input" type="radio" name="radioRedSocial" id="radioRedSocial6" value="6">
												<label style="cursor: pointer" class="form-check-label" for="radioRedSocial6">LinkedIn</label>
											</div><br>
											<div class="form-check form-check-inline me-1 me-sm-3">
												<input style="cursor: pointer" class="form-check-input" type="radio" name="radioRedSocial" id="radioRedSocial7" value="7">
												<label style="cursor: pointer" class="form-check-label" for="radioRedSocial7">Google</label>
											</div><br>
											<div class="form-check form-check-inline me-1 me-sm-3">
												<input style="cursor: pointer" class="form-check-input" type="radio" name="radioRedSocial" id="radioRedSocial8" value="8">
												<label style="cursor: pointer" class="form-check-label" for="radioRedSocial8">Otros</label>
											</div>
										</div>
										<span class="help-block text-danger" id="error"></span>
									</div>
								</div>
								
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3" id="div-otros_red_social">
									<label for="name" class="fw-bold mb-2">Otros</label>
									<div class="form-group">
										<input type="text" class="form-control" id="otros_red_social" name="otros_red_social" placeholder="">
										<span class="help-block text-danger" id="error"></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4">
									<label class="fw-bold mb-2">Pais</label>
									<div class="form-group">
										<select name="cbo-pais" id="cbo-pais" class="form-select" style="width: 100%;">
											<option value="0" selected="selected">- Seleccionar -</option>
											<?php foreach ($arrPais['result'] as $row) { ?>
												<option value="<?php echo $row->ID_Pais; ?>"><?php echo $row->No_Pais; ?></option>
											<?php } ?>
										</select>
										<span class="help-block text-danger" id="error"></span>
									</div>
								</div>
							</div>

							<div class="row div-ubigeo_peru">
								<div class="col-12 col-sm-4 col-md-6 col-lg-4 mb-4">
									<label class="fw-bold mb-2">Departamento</label>
									<div class="form-group">
										<select name="cbo-departamento" id="cbo-departamento" class="form-select" style="width: 100%;">
											<option value="0" selected="selected">- Seleccionar -</option>
										</select>
										<span class="help-block text-danger" id="error"></span>
									</div>
								</div>

								<div class="col-12 col-sm-4 col-md-6 col-lg-4 mb-4">
									<label class="fw-bold mb-2">Provincia</label>
									<div class="form-group">
										<select name="cbo-provincia" id="cbo-provincia" class="form-select"  style="width: 100%;">
											<option value="0" selected="selected">- Seleccionar -</option>
										</select>
									</div>
									<span class="help-block text-danger" id="error"></span>
								</div>

								<div class="col-12 col-sm-4 col-md-6 col-lg-4 mb-4">
									<label class="fw-bold mb-2">Distrito</label>
									<div class="form-group">
										<select name="cbo-distrito" id="cbo-distrito" class="form-select"  style="width: 100%;">
											<option value="0" selected="selected">- Seleccionar -</option>
										</select>
										<span class="help-block text-danger" id="error"></span>
									</div>
								</div>
							</div>

							<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                        		<button type="submit" id="btn-crear_cuenta" class="btn btn-success btn-lg btn-verificar w-100">Crear cuenta</button>
							</div>
                		<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</main>

		<div class="container py-3 pb-0">
			<footer class="pt-4 my-md-5 pt-md-5 pb-0 border-top">
				<div class="row">
					<div class="col-12 col-md">
						<img class="mb-2" src="<?php echo base_url("assets/images/logo_probusiness.png?ver=5.0.0"); ?>" alt="" height="60">
						<small class="d-block mb-3 text-body-secondary">© 2017 – <?php echo date('Y'); ?></small>
					</div>
					<div class="col-6 col-md">
						<h5 class="fw-bold mb-4">Empresa</h5>
						<ul class="list-unstyled text-small">
						<li class="mb-3"><a class="link-secondary text-decoration-none" href="#">Nosotros</a></li>
						<li class="mb-3"><a class="link-secondary text-decoration-none" href="#">Política de Privacidad</a></li>
						<li class="mb-3"><a class="link-secondary text-decoration-none" href=""terminos">Términos y condiciones</a></li>
						</ul>
					</div>
					<div class="col-6 col-md">
						<h5 class="fw-bold mb-4">Redes Sociales</h5>
						<ul class="list-unstyled text-small">
						<li class="mb-3"><a class="link-secondary text-decoration-none" href="https://www.tiktok.com/@pro_business_impo" alt="ProBusiness" title="ProBusiness" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-tiktok"></i> Tiktok</a></li>
						<li class="mb-3"><a class="link-secondary text-decoration-none" href="https://www.instagram.com/probusinesspe/" alt="ProBusiness" title="ProBusiness" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-instagram"></i> Instagram</a></li>
						<li class="mb-3"><a class="link-secondary text-decoration-none" href="https://www.facebook.com/Probusinesspe" alt="ProBusiness" title="ProBusiness" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-facebook"></i> Facebook</a></li>
						<li class="mb-3"><a class="link-secondary text-decoration-none" href="https://www.youtube.com/@MiguelVillegasImportaciones" alt="ProBusiness" title="ProBusiness" target="_blank" rel="noopener noreferrer"><i class="fa-brands fa-youtube"></i> Youtube</a></li>
						</ul>
					</div>
					<div class="col-12 col-md">
						<h5 class="fw-bold mb-4">Contacto</h5>
						<ul class="list-unstyled text-small">
						<li class="mb-3"><a class="link-secondary text-decoration-none" href="tel:+51932531441" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-phone"></i> (+51) 932 531 441</a></li>
						<li class="mb-3"><a class="link-secondary text-decoration-none" href="mailto:info@probusiness.pe" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-envelope"></i> info@probusiness.pe</a></li>
						<li class="mb-3"><a class="link-secondary text-decoration-none" href="https://maps.app.goo.gl/mVnw7c1xdwsSciSx5" target="_blank" rel="noopener noreferrer"><i class="fa-solid fa-map-pin"></i> Alberto Barton 527 - La Victoria - Perú</a></li>
						</ul>
					</div>
				</div>
			</footer>
		</div>
		
		<div class="modal" id="modal-message" tabindex="-1">
			<div class="modal-dialog">
				<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title fw-bold" id="modal-title"></h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-success w-100" data-bs-dismiss="modal">Aceptar</button>
				</div>
				</div>
			</div>
		</div>
	</body>

	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b7119ee4cd.js" crossorigin="anonymous"></script>

    <script type="text/javascript">var base_url = '<?php echo base_url(); ?>';</script>

    <!--interno-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/js/intlTelInput-jquery.min.js"></script>

	<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
	
    <script src="<?php echo base_url("assets/js/inicio_curso_registro.js?ver=88.0.3"); ?>"></script>
  </body>
</html>
