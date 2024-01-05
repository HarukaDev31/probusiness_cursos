<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="Geancarlos collazos, escala tu startup y automatiza tú negocio">
		<meta name="generator" content="">
		
		<link rel="shortcut icon" href="<?php echo base_url("assets/images/favicon/favicon.ico?ver=5.0"); ?>">
		<link rel="apple-touch-icon-precomposed" sizes="192x192" href="<?php echo base_url("assets/images/favicon/android-chrome-512x512.png?ver=5.0"); ?>">
		<link rel="apple-touch-icon-precomposed" sizes="192x192" href="<?php echo base_url("assets/images/favicon/android-chrome-192x192.png?ver=5.0"); ?>">
		<link rel="apple-touch-icon-precomposed" sizes="32x32" href="<?php echo base_url("assets/images/favicon/favicon-32x32.png?ver=5.0"); ?>">
		<link rel="apple-touch-icon-precomposed" sizes="16x16" href="<?php echo base_url("assets/images/favicon/favicon-16x16.png?ver=5.0"); ?>">
		<link rel="apple-touch-icon-precomposed" sizes="16x16" href="<?php echo base_url("assets/images/favicon/apple-touch-icon.png?ver=5.0"); ?>">
		<link rel="shortcut icon" href="<?php echo base_url("assets/images/favicon/favicon.png?ver=5.0.0"); ?>" type="image/png">
	  	<link rel="icon" href="<?php echo base_url("assets/images/favicon/favicon.png?ver=5.0.0"); ?>" type="image/png">
		
		<title>ProBusiness | Curso de Importación</title>

		<!-- Google Font: Source Sans Pro -->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

		<!--select2-->
		<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

		<link rel="stylesheet" href="<?php echo base_url("assets/css/style_curso_registro.css?ver=6.0.0"); ?>">

		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.13/css/intlTelInput.css">

		<meta name="theme-color" content="#FF6700">
		<meta name="msapplication-navbutton-color" content="#FF6700"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="msapplication-navbutton-color" content="#FF6700" />
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
		
		<style>
			.kr-embedded .kr-payment-button {
				color: #ffffff !important;
				background-color: #00A09D !important;
			}

			.kr-embedded .kr-payment-button:hover {
				color: #ffffff !important;
				background-color: #3DD2CE !important;
			}

			.kr-popin-modal-header-background-image{
				background-color: white !important;
			}

			.kr-popin-modal-header {
				border: 0 !important;
			}
			
			.kr-popin-open {
				background-color: white !important;
  				visibility: visible;
			}
		</style>

		<!-- Javascript library. Should be loaded in head section -->
		<!--En la etiqueta kr-post-url-success Colocar el archivo de redireccion o URL (RECORDAR)-->
		<script 
		src="<?php echo $client->getClientEndpoint();?>/static/js/krypton-client/V4.0/stable/kr-payment-form.min.js"
		kr-public-key="<?php echo $client->getPublicKey();?>"
		kr-post-url-success="<?php echo base_url() . 'Curso/respuestaIzipay'; ?>">
		</script>

		<!-- theme and plugins. should be loaded after the javascript library -->
		<!-- not mandatory but helps to have a nice payment form out of the box -->
		<link rel="stylesheet" href="<?php echo $client->getClientEndpoint();?>/static/js/krypton-client/V4.0/ext/classic-reset.css">
		<script src="<?php echo $client->getClientEndpoint();?>/static/js/krypton-client/V4.0/ext/classic.js"></script>
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
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
									<label class="fw-bold mb-2" for="floatEmail">Email</label>
									<div class="form-group">
										<input type="email" inputmode="email" class="form-control" id="email" name="email" placeholder="name@example.com">
										<span class="help-block text-danger" id="error"></span>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
                  					<input type="hidden" value="51" id="codigo_pais" name="codigo_pais" class="form-control">
									<label for="celular" class="fw-bold mb-2">Celular</label>
									<input type="text" inputmode="tel" class="form-control input-number w-100" id="celular" name="celular" placeholder="">
								</div>

								<div class="col-12 col-sm-6 col-md-6 col-lg-6 mb-3">
									<label for="dni" class="fw-bold mb-2">DNI / RUC / OTROS</label>
									<input type="text" class="form-control input-number_letter" id="dni" name="dni" placeholder="">
								</div>
							</div>

							<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
								<label for="name" class="fw-bold mb-2">Nombres y Apellidos</label>
								<input type="text" class="form-control" id="name" name="name" placeholder="">
							</div>

							<div class="row">
								<div class="col-12 col-sm-4 col-md-4 col-lg-4 mb-3">
									<label for="edad" class="fw-bold mb-2">Edad</label>
									<input type="text" inputmode="numeric" class="form-control input-number" id="edad" name="edad" placeholder="">
								</div>
							
								<div class="col-12 col-sm-8 col-md-8 col-lg-8 mb-3">
									<label for="radioSexo" class="fw-bold mb-2">Sexo</label>
									<div class="form-group">
										<div class="form-check form-check-inline">
											<input style="cursor: pointer" class="form-check-input" type="radio" name="radioSexo" id="radioSexoH" value="1">
											<label style="cursor: pointer" class="form-check-label" for="radioSexoH">Hombre</label>
										</div>
										<div class="form-check form-check-inline">
											<input style="cursor: pointer" class="form-check-input" type="radio" name="radioSexo" id="radioSexoM" value="2">
											<label style="cursor: pointer" class="form-check-label" for="radioSexoM">Mujer</label>
										</div>
										<div class="form-check form-check-inline">
											<input style="cursor: pointer" class="form-check-input" type="radio" name="radioSexo" id="radioSexoO" value="3">
											<label style="cursor: pointer" class="form-check-label" for="radioSexoO">Otros</label>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-4">
									<label class="fw-bold mb-2">Pais <span class="label-advertencia text-danger"> *</span></label>
									<div class="form-group">
										<select name="cbo-pais" id="cbo-pais" class="form-select">
											<option value="0" selected="selected">- Seleccionar -</option>
											<?php foreach ($arrPais['result'] as $row) { ?>
												<option value="<?php echo $row->ID_Pais; ?>"><?php echo $row->No_Pais; ?></option>
											<?php } ?>
										</select>
									</div>
									<span class="help-block text-danger" id="error"></span>
								</div>
							</div>

							<div class="row div-ubigeo_peru">
								<div class="col-12 col-sm-4 col-md-6 col-lg-4 mb-4">
									<label class="fw-bold mb-2">Departamento <span class="label-advertencia text-danger"> *</span></label>
									<div class="form-group">
										<select name="cbo-departamento" id="cbo-departamento" class="form-select">
											<option value="0" selected="selected">- Seleccionar -</option>
										</select>
									</div>
									<span class="help-block text-danger" id="error"></span>
								</div>

								<div class="col-12 col-sm-4 col-md-6 col-lg-4 mb-4">
									<label class="fw-bold mb-2">Provincia <span class="label-advertencia text-danger"> *</span></label>
									<div class="form-group">
										<select name="cbo-provincia" id="cbo-provincia" class="form-select">
										<option value="0" selected="selected">- Seleccionar -</option>
										</select>
									</div>
									<span class="help-block text-danger" id="error"></span>
								</div>

								<div class="col-12 col-sm-4 col-md-6 col-lg-4 mb-4">
									<label class="fw-bold mb-2">Distrito <span class="label-advertencia text-danger"> *</span></label>
									<div class="form-group">
										<select name="cbo-distrito" id="cbo-distrito" class="form-select">
											<option value="0" selected="selected">- Seleccionar -</option>
										</select>
									</div>
									<span class="help-block text-danger" id="error"></span>
								</div>
							</div>

							<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-3">
                        		<button type="submit" id="btn-crear_cuenta" class="btn btn-success btn-lg btn-verificar w-100">Crear cuenta</button>
							</div>
							
							<div class="row mb-0" style="height: 0px !important;">
								<div class="col-12 col-sm-12 col-md-12 col-lg-12 mb-0" style="visibility: hidden;">
									<!-- payment form -->
									<div class="kr-embedded" kr-popin kr-form-token="<?php echo $formToken;?>">
										<!-- custom hidden field -->
										<input type="hidden" id="id_pedido_curso" name="acme-id" value=""/>
										<input type="hidden" id="hidden_email" name="acme-email" value=""/>
										<input type="hidden" id="hidden_password" name="acme-password" value=""/>
										<input type="hidden" id="hidden_name" name="acme-name" value=""/>

										<!-- payment form fields -->
										<div class="kr-pan"></div>
										<div class="kr-expiry"></div>
										<div class="kr-security-code"></div>

										<!-- payment form submit button -->
										<button class="kr-payment-button"></button>

										<!-- error zone -->
										<div class="kr-form-error"></div>
									</div>
								</div>
							</div>
                		<?php echo form_close(); ?>
					</div>
				</div>
			</div>
		</main>

		<div class="container py-3 pb-3">
			<footer class="pt-4 my-md-5 pt-md-5 pb-5 border-top">
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

    <script src="<?php echo base_url("assets/js/inicio_curso_registro.js?ver=83.0.3"); ?>"></script>
  </body>
</html>
