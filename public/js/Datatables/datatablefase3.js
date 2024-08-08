$(document).ready(function () {

    var table = $('#asociaciones').DataTable({
       "ajax": {
          "url": 'fase3-data/datatable'
       },
       "order": [[0, 'desc']],
       "columns": [
          {
             "data": "id",
             "render": function (data, type, row) {
                return `<span class="fs-4 fw-bold">${row.id}</span>`;
             },
             "createdCell": function (td, cellData, rowData, row, col) {
                $(td).addClass('text-start');
             }
          },
          {
             "data": "fechaAccion",
             "createdCell": function (td, cellData, rowData, row, col) {
                $(td).addClass('text-start');
             }
          },
          {
             "data": "noidentificacion",
             "createdCell": function (td, cellData, rowData, row, col) {
                $(td).addClass('text-start');
             }
          },
          {
             "data": "nombre",
             "render": function (data, type, row) {
                nombre = row.nombre;
                apellidos = row.apellidos.toUpperCase();
                return `<span class="">${nombre} ${apellidos}</span>`;
             },
             "createdCell": function (td, cellData, rowData, row, col) {
                $(td).addClass('text-start');
             }
          },
          {
             "data": "ciudad",
             "render": function (data, type, row) {
                 ciudad = row.ciudad;
                return `<span class="">${ciudad}</span>`;
             },
             "createdCell": function (td, cellData, rowData, row, col) {
                $(td).addClass('text-start');
             }
          },
          {
             "data": "agenciaasociacion",
             "render": function (data, type, row) {
                 agenciaasociacion = row.agenciaasociacion;
                 fase3 = row.fase3;

                 if(fase3 == '1'){
                     return  `<div class="btn btn-primary shadow" style="padding: 0.4rem 1.4rem; border-radius: 10%;font-weight: 600;font-size: 14px;"><label style="margin-bottom: 0px;">FINALIZADO</div>`
                 }

             },
             "createdCell": function (td, cellData, rowData, row, col) {
                $(td).addClass('text-start');
             }
          },
          {
             "data": null,
             "render": function (data, type, row) {
                var id = row.id;
                const buttonDetalle = `
                <button onClick="openModal(${row.id})">
                   <span class="box">
                      -Detalles-
                   </span>
                </button>
                `;
                return buttonDetalle;
             },
             "createdCell": function (td, cellData, rowData, row, col) {
                $(td).addClass('text-start');
             }

          }
       ],
       "columnDefs": [
          {
             "targets": [1, 2, 3, 4],
             "orderable": false
          }
       ],
       "language": {
          "decimal": "",
          "emptyTable": "No hay información",
          "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
          "infoEmpty": "Mostrando 0 to 0 of 0 Registros",
          "infoFiltered": "(Filtrado de _MAX_ total Registros)",
          "infoPostFix": "",
          "thousands": ",",
          "lengthMenu": "Mostrar _MENU_ Registros",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "zeroRecords": "Sin resultados encontrados",
       },
       "initComplete": function(settings, json) {
             var buttonsHtml = '<div class="custom-buttons">' +
                 '<button id="btnT" class="custom-btn" title="ACTUALIZAR INFORMACIÓN"><i class="fa-solid fa-rotate-right"></i></button>' +
                 //   '<button id="btnFA" class="custom-btn" title="FALTA POR APROBAR">FA</button>' +
                 '</div>';
             $(buttonsHtml).prependTo('.dataTables_filter');
             $('#btnT').on('click', function() {
                 table.ajax.reload(null, false);

             });
         },
         responsive: "true",
         dom: 'Bfrtilp',
         buttons:[
             {
                 extend:    'excelHtml5',
                 text:      '<i class="fas fa-file-excel"></i> ',
                 titleAttr: 'Exportar a Excel',
                 className: 'btn btn-success btn-lg'
             },
             {
                 extend:    'print',
                 text:      '<i class="fa fa-print"></i> ',
                 titleAttr: 'Imprimir',
                 className: 'btn btn-info btn-lg'
             }
         ]
    });

 });

//  function openModal(paramIdRow) {
//      const rowId = paramIdRow;

//      $.ajax({
//         url: `fase1/info-${rowId}`,
//         method: 'GET',
//      }).done(function (data) {


//         if (data) {
//              $("#id").val(data.id)
//              $("#escribe").html(data.ciudad)

//              var options = '<option value="' + data.ciudad + '" selected >' + data.ciudad + '</option>';
//              $("#fecha").html(data.fechaAccion)
//              $("#numeroAutorizacion").html('No. '+data.id)
//              if(data.tipoavirtual == 'asociacion')
//              {
//                  $("#asociacion").prop('checked', true);
//              }else if(data.tipoavirtual == 'actualizacion'){
//                  $("#actualizacion").prop('checked', true);
//              }
//              $("#siono").html(data.tipoavirtual)

//              $("#ciudad").prepend(options);
//              $("#nombre").val(data.nombre)
//              $("#apellidos").val(data.apellidos.toUpperCase())
//              $("#nombrehead").html(data.nombre + ' ' + data.apellidos + '.')
//              if(data.genero == 'M')
//              {
//                  $("#hombre").prop('checked', true);
//              }else{
//                  $("#mujer").prop('checked', true);
//              }
//              if(data.tidentificacion == 'C.C')
//              {
//                  $("#CC").prop('checked', true);
//              }else if(data.tidentificacion == 'C.E'){
//                  $("#CE").prop('checked', true);
//              }else{
//                  $("#TI").prop('checked', true);
//              }
//              $("#noidentificacion").val(data.noidentificacion)



//              var optionlnacimiento = '<option value="' + data.lnacimiento + '" selected >' + data.lnacimiento + '</option>';
//              $("#lnacimiento").prepend(optionlnacimiento);


//              var optionlexpedicion = '<option value="' + data.lexpedicion + '" selected >' + data.lexpedicion + '</option>';
//              $("#lexpedicion").prepend(optionlexpedicion);


//              var fechanacimiento = data.fnacimiento;
//              var partes = fechanacimiento.split('/');
//              var mes = partes[0];
//              var dia = partes[1];
//              var año = partes[2];
//              $('#dia').prepend('<option value="' + dia + '" selected >' + dia + '</option>');
//              $('#mes').prepend('<option value="' + mes + '" selected >' + mes + '</option>');
//              $('#anio').prepend('<option value="' + año + '" selected >' + año + '</option>');


//              var fechaexpedicion = data.fechaexpedicion;
//              var partes2 = fechaexpedicion.split('/');
//              var mes2 = partes2[0];
//              var dia2 = partes2[1];
//              var año2 = partes2[2];
//              $('#diadiaexpedicion').prepend('<option value="' + dia2 + '" selected >' + dia2 + '</option>');
//              $('#mesdiaexpedicion').prepend('<option value="' + mes2 + '" selected >' + mes2 + '</option>');
//              $('#anioexpedicion').prepend('<option value="' + año2 + '" selected >' + año2 + '</option>');



//              $("#dresidencia").val(data.dresidencia)

//              var optionciudadresidencia = '<option value="' + data.ciudadresidencia + '" selected >' + data.ciudadresidencia + '</option>';
//              $("#ciudadresidencia").prepend(optionciudadresidencia);


//              $("#empresatrabaja").val(data.empresatrabaja)
//              $("#dtrabajo").val(data.dtrabajo)
//              $("#cargo").val(data.cargo)
//              $("#tiempocargo").val(data.tiempocargo)
//              $("#dcorrespondencia").val(data.dcorrespondencia)

//              var optioncorrespondencia = '<option value="' + data.ciudcorrespondencia + '" selected >' + data.ciudcorrespondencia + '</option>';
//              $("#ciudcorrespondencia").prepend(optioncorrespondencia);

//              var optionciudadempresa = '<option value="' + data.ciudadempresa + '" selected >' + data.ciudadempresa + '</option>';
//              $("#ciudadempresa").prepend(optionciudadempresa);


//              var celular1 = data.celular1;
//              var separar = celular1.split(' ');
//              //quiero tomar el codigo sin el +
//              var codigoPais1fijo = separar[0];
//              var restoNumero1  = separar[1];


//              $("#celular1").val(restoNumero1)
//              $("#code1").val(codigoPais1fijo);




//              var celular2 = data.celular2;
//              var separar2 = celular2.split(' ');
//              var codigoPais2fijo = separar2[0];
//              var restoNumero2  = separar2[1];

//              $("#celular2").val(restoNumero2)
//              $("#code2").val(codigoPais2fijo);



//              var whatsapp1 = data.whatsapp1;
//              var separar3 = whatsapp1.split(' ');
//              var codigoPaisW1fijo = separar3[0];
//              var restoNumeroW1  = separar3[1];

//              $("#whatsapp1").val(restoNumeroW1)
//              $("#code1whatsapp").val(codigoPaisW1fijo);



//              var whatsapp2 = data.whatsapp2;
//              var separar4 = whatsapp2.split(' ');
//              var codigoPaisW2fijo = separar4[0];
//              var restoNumeroW2  = separar4[1];

//              console.log(codigoPaisW2fijo + ' -- '+restoNumeroW2);

//              $("#whatsapp2").val(restoNumeroW2)
//              $("#code2whatsapp").val(codigoPaisW2fijo);

//              $("#correo").val(data.correo)


//              if(data.autoriza == 'SI')
//              {
//                  $("#si-autoriza").prop('checked', true);
//              }else{
//                  $("#no-autoriza").prop('checked', true);
//              }

//              var optionagenciaasociacion = '<option value="' + data.agenciaasociacion + '" selected>' + data.agenciaasociacion + '</option>';
//              if(data.agenciaasociacion == null){

//              }else{
//                  $("#agencia").prepend(optionagenciaasociacion);
//              }

//              $("#exampleModal").modal('show');

//         } else {
//            console.error('La respuesta de AJAX no contiene datos válidos.');
//         }
//      }).fail(function (jqXHR, textStatus, errorThrown) {
//         console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
//      });
//   }


//  function hideModal() {
//     $("#exampleModal").modal('hide');
//  }

 function csesion() {
    var respuesta = confirm("¿Estas seguro que deseas cerrar sesión?")
    return respuesta
 }


  function hideModalfirma() {
     $("#mediumModal").modal('hide');
  }


  function showSelectBox() {
     var radioButtons = document.getElementsByName('options');
     var selectBoxOption1 = document.getElementById('select-box-option1');
     var selectBoxOption2 = document.getElementById('select-box-option2');




     // Oculta ambos select boxes por defecto
     selectBoxOption1.style.display = 'none';
     selectBoxOption2.style.display = 'none';



     // Recorre los radio buttons para ver cuál está seleccionado
     for (var i = 0; i < radioButtons.length; i++) {
         if (radioButtons[i].checked) {
             // Muestra el select box correspondiente según la opción seleccionada
             if (radioButtons[i].value === 'option1') {
                 selectBoxOption1.style.display = 'block';
             } else if (radioButtons[i].value === 'option2') {
                 selectBoxOption2.style.display = 'block';
             }
         }
     }
  }
