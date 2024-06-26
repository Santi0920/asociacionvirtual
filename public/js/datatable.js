$(document).ready(function () {

   var table = $('#asociaciones').DataTable({
      "ajax": {
         "url": 'fase1/datatable'
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
      }
   });
});

function openModal(paramIdRow) {
    const rowId = paramIdRow;

    $.ajax({
       url: `fase1/info-${rowId}`,
       method: 'GET',
    }).done(function (data) {


       if (data) {
            var options = '<option value="' + data.ciudad + '" selected disabled>' + data.ciudad + '</option>';
            $("#fecha").html(data.fechaAccion)
            $("#numeroAutorizacion").html('No. '+data.id)
            if(data.vinculado == 'SI')
            {
                $("#si").prop('checked', true);
            }else{
                $("#no").prop('checked', true);
            }

            $("#ciudad").prepend(options);
            $("#nombre").val(data.nombre)
            $("#apellidos").val(data.apellidos.toUpperCase())
            $("#nombrehead").html(data.nombre + ' ' + data.apellidos)
            if(data.genero == 'M')
            {
                $("#hombre").prop('checked', true);
            }else{
                $("#mujer").prop('checked', true);
            }
            if(data.tidentificacion == 'C.C')
            {
                $("#CC").prop('checked', true);
            }else if(data.tidentificacion == 'C.E'){
                $("#CE").prop('checked', true);
            }else{
                $("#TI").prop('checked', true);
            }
            $("#noidentificacion").val(data.noidentificacion)



            var optionlnacimiento = '<option value="' + data.lnacimiento + '" selected disabled>' + data.lnacimiento + '</option>';
            $("#lnacimiento").prepend(optionlnacimiento);


            var optionlexpedicion = '<option value="' + data.lexpedicion + '" selected disabled>' + data.lexpedicion + '</option>';
            $("#lexpedicion").prepend(optionlexpedicion);


            var fechanacimiento = data.fnacimiento;
            var partes = fechanacimiento.split('/');
            var mes = partes[0];
            var dia = partes[1];
            var año = partes[2];
            $('#dia').prepend('<option value="' + dia + '" selected disabled>' + dia + '</option>');
            $('#mes').prepend('<option value="' + mes + '" selected disabled>' + mes + '</option>');
            $('#anio').prepend('<option value="' + año + '" selected disabled>' + año + '</option>');


            var fechaexpedicion = data.fechaexpedicion;
            var partes2 = fechaexpedicion.split('/');
            var mes2 = partes2[0];
            var dia2 = partes2[1];
            var año2 = partes2[2];
            $('#diadiaexpedicion').prepend('<option value="' + dia2 + '" selected disabled>' + dia2 + '</option>');
            $('#mesdiaexpedicion').prepend('<option value="' + mes2 + '" selected disabled>' + mes2 + '</option>');
            $('#anioexpedicion').prepend('<option value="' + año2 + '" selected disabled>' + año2 + '</option>');



            $("#dresidencia").val(data.dresidencia)

            var optionciudadresidencia = '<option value="' + data.ciudadresidencia + '" selected disabled>' + data.ciudadresidencia + '</option>';
            $("#ciudadresidencia").prepend(optionciudadresidencia);


            $("#empresatrabaja").val(data.empresatrabaja)
            $("#dtrabajo").val(data.dtrabajo)
            $("#cargo").val(data.cargo)
            $("#tiempocargo").val(data.tiempocargo)
            $("#dcorrespondencia").val(data.dcorrespondencia)

            var optioncorrespondencia = '<option value="' + data.ciudcorrespondencia + '" selected disabled>' + data.ciudcorrespondencia + '</option>';
            $("#ciudcorrespondencia").prepend(optioncorrespondencia);

            var optionciudadempresa = '<option value="' + data.ciudadempresa + '" selected disabled>' + data.ciudadempresa + '</option>';
            $("#ciudadempresa").prepend(optionciudadempresa);


            var celular1 = data.celular1;
            var codigoPais1 = celular1.substring(1);
            var restoNumero1 = celular1.substring(4);
            var parterestonumero = codigoPais1.split(' ');
            var codigoPais1fijo = parterestonumero[0];

            $("#celular1").val(restoNumero1)
            $("#code1").val(codigoPais1fijo);



            var celular2 = data.celular2;
            var codigoPais2 = celular2.substring(1);
            var restoNumero2 = celular2.substring(4);
            var parterestonumero2 = codigoPais2.split(' ');
            var codigoPais2fijo = parterestonumero2[0];

            $("#celular2").val(restoNumero2)
            $("#code2").val(codigoPais2fijo);


            var whatsapp1 = data.whatsapp1;
            var codigoPaisW1 = whatsapp1.substring(1);
            var restoNumeroW1 = whatsapp1.substring(4);
            var parterestonumeroW1 = codigoPaisW1.split(' ');
            var codigoPaisW1fijo = parterestonumeroW1[0];
            $("#whatsapp1").val(restoNumeroW1)
            $("#code1whatsapp").val(codigoPaisW1fijo);


            var whatsapp2 = data.whatsapp2;
            var codigoPaisW2 = whatsapp2.substring(1, 3);
            var restoNumeroW2 = whatsapp2.substring(4);
            var parterestonumeroW2 = codigoPaisW2.split(' ');
            var codigoPaisW2fijo = parterestonumeroW2[0];
            $("#whatsapp2").val(restoNumeroW2)
            $("#code2whatsapp").val(codigoPaisW2fijo);

            $("#correo").val(data.correo)


            if(data.autoriza == 'SI')
            {
                $("#si-autoriza").prop('checked', true);
            }else{
                $("#no-autoriza").prop('checked', true);
            }

            $("#exampleModal").modal('show');

       } else {
          console.error('La respuesta de AJAX no contiene datos válidos.');
       }
    }).fail(function (jqXHR, textStatus, errorThrown) {
       console.error('Error en la solicitud AJAX:', textStatus, errorThrown);
    });
 }


function hideModal() {
   $("#exampleModal").modal('hide');
}

function csesion() {
   var respuesta = confirm("¿Estas seguro que deseas cerrar sesión?")
   return respuesta
}
