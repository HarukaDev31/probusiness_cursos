$(document).ready(function () {
  const iSetinitialCountry = "pe";
  $("#txt-celular").intlTelInput({
    initialCountry: iSetinitialCountry,
    separateDialCode: true,
    //onlyCountries: ["pe", "mx", "ar", "ec", "ve", "cl", "br", "bo", "co", "py", "py", "uy", "pa", "sv", "hn", "ni", "cr", "cu", "pr", "gt"],
  });


  $("#form-registro").on('submit',function(e){
    e.preventDefault();

    $('.help-block').empty();
    $('.form-group').removeClass('has-error');

    if ($('#email').val().length === 0) {
        $('#email').focus();
        $('#email').closest('.form-group').find('.help-block').html('Ingresar email');
        $('#email').closest('.form-group').removeClass('text-success').addClass('text-danger');
    } else {
      $('#btn-crear_cuenta').prop('disabled', true);
      $('#btn-crear_cuenta').html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Creando');

      $.ajax({
        url: base_url + 'Curso/crearUsuario',
        type: "POST",
        dataType: "JSON",
        data: $('#form-registro').serialize(),
      })
      .done(function(response) {
        $('#btn-enviar_pedido').prop('disabled', false);
        $('#btn-enviar_pedido').html('Crear cuenta');
        
        $(".kr-popin-button").click();

        let config = {
          "merchant": {
            "header": {
              "image": {
                "type": "logo",
                "visibility": true,
                "src": "../assets/img/probusiness_isotipo.jpeg"
              }
            }
          }
        };
        
        KR.setFormConfig(config);
      });
    }
  });

  $(document).on('change', '#cbo-departamento', function () {
    var id = $(this).val(), sTextoDepartamento = $("#cbo-departamento option:selected").text(), response = '';
    $('#cbo-provincia').html('<option value="0" selected="selected">- Cargando -</option>');
    if (id > 0) {
      $.post(base_url + 'Curso/searchForIdProvincia', { ID_Departamento: id }, function (response) {
        //console.log(response);
        if(response.status=='success'){
          $('#cbo-provincia').html('<option value="0" selected="selected">- Seleccionar -</option>');
          response = response.result;
          for (var i = 0; i < response.length; i++){
            $('#cbo-provincia').append('<option value="' + response[i].ID_Provincia + '">' + response[i].No_Provincia + '</option>');
          }
        } else {
          $('#cbo-provincia').html('<option value="0" selected="selected">- Sin provincia -</option>');

          alert(response.message);
        }
      }, 'JSON');
    }
  });

  //Direccion modal usuario primera vez
  $(document).on('change', '#cbo-provincia', function () {
    var id = $(this).val(), response = '';
    $('#cbo-distrito').html('<option value="0" selected="selected">- Cargando -</option>');
    if (id > 0) {
      $.post(base_url + 'Curso/searchForIdDistrito', { ID_Provincia: id }, function (response) {
        //console.log(response);
        if(response.status=='success'){
          $('#cbo-distrito').html('<option value="0" selected="selected">- Seleccionar -</option>');
          response = response.result;
          for (var i = 0; i < response.length; i++){
            $('#cbo-distrito').append('<option value="' + response[i].ID_Distrito + '">' + response[i].No_Distrito + '</option>');
          }
        } else {
          $('#cbo-distrito').html('<option value="0" selected="selected">- Sin distrito -</option>');

          alert(response.message);
        }
      }, 'JSON');
    }
  });
});