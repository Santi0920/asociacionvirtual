<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Asociación Virtual</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        * {
            font-family: "Poppins", sans-serif;
        }
    </style>
    <script src="ResourcesAll/Sweetalert/sweetalert2.js"></script>
    <link rel="stylesheet" href="ResourcesAll/Sweetalert/sweetalert2.css">
    <link rel="shortcut icon" href="img/logoo.png" type="image/png">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .form-group {
            margin-bottom: 15px;
        }

        .input-group-abreviatura input {
            display: inline-block;
            width: 18%;
            margin-right: 2%;
        }

        .input-group-abreviatura input:last-child {
            margin-right: 0;
        }

        .signature-box {
            border: 1px solid #ccc;
            border-radius: 5px;
            height: 250px;
            margin-top: 10px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
        }

        .header {
            background-color: #343a40;
            color: white;
            padding: 5px;
            text-align: center;
            font-weight: bold;
        }

        .box {
            border: 1px solid #ccc;
            padding: 10px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>
    <div class="container border border-dark shadow-lg mt-3 mb-3 rounded">
        <form action="{{route('registrarfase3', $id)}}" method="POST" class="needs-validation" novalidate>
            @csrf
            <a href="fase1" style="color: inherit;"><svg class="mt-3" xmlns="http://www.w3.org/2000/svg" class="d-flex justify-content-start" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left">
                    <path d="m12 19-7-7 7-7" />
                    <path d="M19 12H5" />
                </svg></a>
            <div class="row m-0 p-3 pb-0 align-items-center">
                <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                    <img width="100%" height="200" src="https://www.coopserp.com/permiso/img/logoCoopserp.svg" alt="Logo Coopserp">
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-9 text-danger d-flex justify-content-end">
                    <div class="row">
                        <div class="col text-center p-3">
                            <h1 class="h1 fw-bold m-0">F3</h1>
                        </div>
                        <div class="col text-center p-3">
                            <h1 class="h1 fw-bold m-0">No {{$id}}</h1><br>
                        </div>
                        <div class="row">
                            <div class="col-12 col-lg-12 text-center ">
                                <h3 class="fw-semibold"><span>Fecha: </span><span class="text-dark" id="currentDateTime"></span></h3>
                            </div>
                            <script>
                                function mostrarHoraActual() {
                                    var now = new Date();
                                    var formattedDate = obtenerFechaFormateada(now);
                                    document.getElementById('currentDateTime').textContent = formattedDate;
                                }

                                function obtenerFechaFormateada(date) {
                                    var options = {
                                        year: 'numeric',
                                        month: 'long',
                                        day: 'numeric',
                                        hour: 'numeric',
                                        minute: 'numeric',
                                        second: 'numeric',
                                        hour12: true,
                                        timeZone: 'America/Bogota'
                                    };

                                    // Obtener el formato de fecha
                                    var formattedDate = new Intl.DateTimeFormat('es-ES', options).format(date);

                                    return formattedDate;
                                }

                                // Mostrar la hora actualizada cada segundo
                                setInterval(mostrarHoraActual, 1000);
                            </script>

                        </div>
                    </div>
                </div>
            </div>

            <h2 class="text-center m-3 fw-bold">INFORMACIÓN PERSONAL</h2>
            <div class="border p-2">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="cuenta_bancaria">Cuenta Bancaria</label>
                        <select id="cuenta_bancaria" class="form-control border border-dark" name="cuenta_bancaria" required>
                            <option value="" selected>Seleccionar una opción</option>
                            <option value="Ahorro">Ahorro</option>
                            <option value="Corriente">Corriente</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, seleccione una cuenta bancaria.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="num_cuenta">No. de cuenta</label>
                        <input type="text" class="form-control border border-dark" id="num_cuenta" placeholder="No. de cuenta" name="num_cuenta" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese el número de cuenta.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="entidad">Entidad</label>
                        <input type="text" class="form-control border border-dark" id="entidad_cuenta" name="entidad_cuenta" placeholder="Entidad" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese la entidad.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="ciudad_bancaria">Ciudad</label>
                        <input type="text" class="form-control border border-dark" id="ciudad_bancaria" name="ciudad_bancaria" placeholder="Ciudad" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese la ciudad.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="operaciones_extranjera">¿Realiza operaciones en moneda Extranjera?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="operaciones_extranjera_si" name="operaciones_extranjera" value="Si" required>
                                <label class="form-check-label" for="operaciones_extranjera_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="operaciones_extranjera_no" name="operaciones_extranjera" value="No" required>
                                <label class="form-check-label" for="operaciones_extranjera_no">No</label>
                            </div>
                            <div class="invalid-feedback">
                                Por favor, seleccione una opción.
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="cuenta_extranjera">¿Posee cuenta en Moneda Extranjera?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="cuenta_extranjera_si" name="cuenta_extranjera" value="Si" required>
                                <label class="form-check-label" for="cuenta_extranjera_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="cuenta_extranjera_no" name="cuenta_extranjera" value="No" required>
                                <label class="form-check-label" for="cuenta_extranjera_no">No</label>
                            </div>
                            <div class="invalid-feedback">
                                Por favor, seleccione una opción.
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="entidad">Entidad</label>
                        <input type="text" class="form-control border border-dark" id="entidad" name="entidad_moneda" placeholder="Entidad" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese la entidad.
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="moneda">Moneda</label>
                        <input type="text" class="form-control border border-dark" id="moneda" name="moneda" placeholder="Moneda" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese la moneda.
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="pais_ciudad">País-Ciudad</label>
                        <input type="text" class="form-control border border-dark" id="pais_ciudad" name="pais_ciudad" placeholder="País-Ciudad" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese el país y ciudad.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="decisiones_politica">¿Las decisiones a su cargo influyen en la política o impactan en la sociedad?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="decisiones_politica_si" name="decisiones_politica" value="Si" required>
                                <label class="form-check-label" for="decisiones_politica_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="decisiones_politica_no" name="decisiones_politica" value="No" required>
                                <label class="form-check-label" for="decisiones_politica_no">No</label>
                            </div>
                            <div class="invalid-feedback">
                                Por favor, seleccione una opción.
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="administra_recursos">¿Administra o dispone de recursos públicos?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="administra_recursos_si" name="administra_recursos" value="Si" required>
                                <label class="form-check-label" for="administra_recursos_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="administra_recursos_no" name="administra_recursos" value="No" required>
                                <label class="form-check-label" for="administra_recursos_no">No</label>
                            </div>
                            <div class="invalid-feedback">
                                Por favor, seleccione una opción.
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="persona_expuesta">¿Es una persona políticamente expuesta (PEP)?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="persona_expuesta_si" name="persona_expuesta" value="Si" required>
                                <label class="form-check-label" for="persona_expuesta_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="persona_expuesta_no" name="persona_expuesta" value="No" required>
                                <label class="form-check-label" for="persona_expuesta_no">No</label>
                            </div>
                            <div class="invalid-feedback">
                                Por favor, seleccione una opción.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="especificacion_personal">Si alguna de las preguntas es afirmativa, especifique</label>
                        <input type="text" class="form-control border border-dark" id="especificacion_personal" name="especificacion_personal">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="jubilado">Jubilado</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="jubilado" name="pension" value="Jubilado">
                                <label class="form-check-label" for="jubilado">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-1">
                        <label for="pensionado">Pensionado</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="pensionado" name="pension" value="Pensionado">
                                <label class="form-check-label" for="pensionado">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3 ms-4">
                        <label for="pension_sustitucion">Pensión Por Sustitución</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="pension_sustitucion" name="pension" value="Pension por Sustitucion">
                                <label class="form-check-label" for="pension_sustitucion">Sí</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="pension_de">De</label>
                        <input type="text" class="form-control border border-dark" id="pension_de" name="pension_de" placeholder="De">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="resolucion">Resolución No.</label>
                        <input type="text" class="form-control border border-dark" id="resolucion" name="resolucion" placeholder="Resolución No.">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="fecha_pension">Fecha</label>
                        <input type="date" class="form-control border border-dark" id="fecha_pension" name="fecha_pension">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="entidad_pension">Entidad que cancela su pensión</label>
                        <input type="text" class="form-control border border-dark" id="entidad_pension" name="entidad_pension" placeholder="Entidad que cancela su pensión">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="valor_pension">Valor Pensión</label>
                        <input type="text" class="form-control border border-dark" id="valor_pension" name="valor_pension" placeholder="Valor Pensión">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="nivel_educativo">Nivel Educativo</label>
                        <select id="nivel_educativo" class="form-control border border-dark" name="nivel_educativo" required>
                            <option value="" selected>Seleccionar una opción</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Secundaria">Secundaria</option>
                            <option value="Tecnico">Técnico</option>
                            <option value="Universitario">Universitario</option>
                            <option value="Posgrado">Posgrado</option>
                            <option value="Programa Especial">Programa Especial</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, seleccione un nivel educativo.
                        </div>
                    </div>
                    <div class="form-group col-md-7">
                        <label for="profesion">Profesión (Título Obtenido)</label>
                        <input type="text" class="form-control border border-dark" id="profesion" name="profesion" placeholder="Profesión" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese la profesión.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="estado_civil">Estado Civil</label>
                        <select id="estado_civil" class="form-control border border-dark" name="estado_civil" required>
                            <option value="" selected>Seleccionar una opción</option>
                            <option value="Soltero(a)">Soltero(a)</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Unión Libre">Unión Libre</option>
                            <option value="Divorciado(a)">Divorciado(a)</option>
                            <option value="Viudo(a)">Viudo(a)</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, seleccione el estado civil.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="num_hijos">Número de Hijos</label>
                        <input type="number" class="form-control border border-dark" id="num_hijos" name="num_hijos" placeholder="Número de Hijos">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="num_personas_acargo">Número de Personas a Cargo</label>
                        <input type="number" class="form-control border border-dark" id="num_personas_acargo" name="num_personas_acargo" placeholder="Número de Personas a Cargo">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="vivienda_propia">Tiene Vivienda Propia?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="vivienda_propia_si" name="vivienda_propia" value="Si" required>
                                <label class="form-check-label" for="vivienda_propia_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="vivienda_propia_no" name="vivienda_propia" value="No" required>
                                <label class="form-check-label" for="vivienda_propia_no">No</label>
                            </div>
                            <div class="invalid-feedback">
                                Por favor, seleccione una opción.
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="ciudad_vivienda">Ciudad</label>
                        <input type="text" class="form-control border border-dark" id="ciudad_vivienda" name="ciudad_vivienda" placeholder="Ciudad" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese la ciudad.
                        </div>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="vehiculo">Posee Vehículo</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="vehiculo_si" name="vehiculo" value="si" required>
                                <label class="form-check-label" for="vehiculo_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="vehiculo_no" name="vehiculo" value="no" required>
                                <label class="form-check-label" for="vehiculo_no">No</label>
                            </div>
                            <div class="invalid-feedback">
                                Por favor, seleccione una opción.
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="placa_vehiculo">Placa</label>
                        <input type="text" class="form-control border border-dark" id="placa_vehiculo" name="placa_vehiculo" placeholder="Placa" required>
                        <div class="invalid-feedback">
                            Por favor, ingrese la placa.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="deporte">Deporte que Práctica</label>
                        <input type="text" class="form-control border border-dark" id="deporte" name="deporte" placeholder="Deporte que Práctica">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="hobby">Hobby</label>
                        <input type="text" class="form-control border border-dark" id="hobby" name="hobby" placeholder="Hobby">
                    </div>
                </div>
            </div>

            <h2 class="text-center m-3 fw-bold">INFORMACIÓN DEL CÓNYUGE</h2>
            <div class="border p-2">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="nombre_conyuge">Nombre del Cónyuge o Compañero(a)</label>
                        <input type="text" class="form-control border border-dark" id="nombre_conyuge" name="nombre_conyuge" placeholder="Nombre del Cónyuge o Compañero" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el nombre del cónyuge o compañero(a).
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="tipo_documento">Tipo de documento</label>
                        <select id="tipo_documento" class="form-control border border-dark" name="tipo_documento_conyuge" required>
                            <option value="" selected>Seleccionar una opción</option>
                            <option value="Nuip">Nuip</option>
                            <option value="CC">C.C</option>
                            <option value="TI">T.I</option>
                            <option value="CE">C.E</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, selecciona el tipo de documento.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="num_documento">No</label>
                        <input type="number" class="form-control border border-dark" id="num_documento" name="num_documento_conyuge" placeholder="No" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el número de documento.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="fecha_nacimiento_conyuge">Fecha de Nacimiento</label>
                        <input type="date" class="form-control border border-dark" id="fecha_nacimiento_conyuge" name="fecha_nacimiento_conyuge" placeholder="Fecha de Nacimiento" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa la fecha de nacimiento.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="lugar_nacimiento_conyuge">Lugar de Nacimiento</label>
                        <input type="text" class="form-control border border-dark" id="lugar_nacimiento_conyuge" name="lugar_nacimiento_conyuge" placeholder="Lugar de Nacimiento" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el lugar de nacimiento.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="empresa_labora">Empresa donde labora</label>
                        <input type="text" class="form-control border border-dark" id="empresa_labora" name="empresa_labora_conyuge" placeholder="Empresa donde labora" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa la empresa donde labora.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="ocupacion_conyuge">Ocupación</label>
                        <input type="text" class="form-control border border-dark" id="ocupacion_conyuge" name="ocupacion_conyuge" placeholder="Ocupación" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa la ocupación.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="direccion_oficina">Dirección de Oficina</label>
                        <input type="text" class="form-control border border-dark" id="direccion_oficina" name="direccion_oficina_conyuge" placeholder="Dirección de Oficina" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa la dirección de la oficina.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ciudad_oficina">Ciudad</label>
                        <input type="text" class="form-control border border-dark" id="ciudad_oficina" name="ciudad_oficina_conyuge" placeholder="Ciudad" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa la ciudad de la oficina.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefono_oficina">Teléfono</label>
                        <input type="text" class="form-control border border-dark" id="telefono_oficina" name="telefono_oficina_conyuge" placeholder="Teléfono" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el teléfono de la oficina.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="decisiones_politica_conyuge">¿Las decisiones a su cargo influyen en la política o impactan en la sociedad?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="decisiones_politica_conyuge_si" name="decisiones_politica_conyuge" value="si" required>
                                <label class="form-check-label" for="decisiones_politica_conyuge_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="decisiones_politica_conyuge_no" name="decisiones_politica_conyuge" value="no" required>
                                <label class="form-check-label" for="decisiones_politica_conyuge_no">No</label>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Por favor, selecciona una opción.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="administra_recursos_conyuge">¿Administra o dispone de recursos públicos?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="administra_recursos_conyuge_si" name="administra_recursos_conyuge" value="si" required>
                                <label class="form-check-label" for="administra_recursos_conyuge_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="administra_recursos_conyuge_no" name="administra_recursos_conyuge" value="no" required>
                                <label class="form-check-label" for="administra_recursos_conyuge_no">No</label>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Por favor, selecciona una opción.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="persona_expuesta_conyuge">¿Es una persona políticamente expuesta (PEP)?</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="persona_expuesta_conyuge_si" name="persona_expuesta_conyuge" value="si" required>
                                <label class="form-check-label" for="persona_expuesta_conyuge_si">Sí</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input border border-dark" type="radio" id="persona_expuesta_conyuge_no" name="persona_expuesta_conyuge" value="no" required>
                                <label class="form-check-label" for="persona_expuesta_conyuge_no">No</label>
                            </div>
                        </div>
                        <div class="invalid-feedback">
                            Por favor, selecciona una opción.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="especificacion_conyuge">Si alguna de las preguntas es afirmativa, especifique</label>
                        <input type="text" class="form-control border border-dark" id="especificacion_conyuge" name="especificacion_conyuge">
                        <div class="invalid-feedback">
                            Por favor, especifica tu respuesta.
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="pt-4 pb-4 fs-4 fw-bold">SI USTED PERTENECE A LA POLICIA NACIONAL O MINISTERIO DE DEFENSA, POR FAVOR DILIGENCIAR LOS SIGUIENTES CAMPOS SEGÚN CORRESPONDA:</h3>

            <h2 class="text-center mb-3 fw-bold">POLICÍA NACIONAL (PONAL)</h2>
            <div class="border p-2" id="ponal-container">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="grado">Grado</label>
                        <select id="grado" class="form-control border border-dark" name="grado" required>
                            <option value="" selected>Seleccionar una opción</option>
                            <option value="oficial">Oficial</option>
                            <option value="nivel_ejecutivo">Nivel Ejecutivo</option>
                            <option value="suboficial">Suboficial</option>
                            <option value="agente">Agente</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, selecciona el grado.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="patrullero">Patrullero</label>
                        <input type="text" class="form-control border border-dark" id="patrullero" name="patrullero" placeholder="Patrullero" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el nombre del patrullero.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="codigo_token">Código Token apo. soc.</label>
                        <input type="text" class="form-control border border-dark" id="codigo_token" name="codigo_token" placeholder="Código Token" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el código token.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="abreviatura_ponal">Abreviatura</label>
                        <div class="input-group input-group-abreviatura">
                            <input type="text" class="form-control border border-dark" maxlength="1" name="abreviatura_ponal" required>
                            <input type="text" class="form-control border border-dark" maxlength="1" name="abreviatura_ponal" required>
                            <input type="text" class="form-control border border-dark" maxlength="1" name="abreviatura_ponal" required>
                            <input type="text" class="form-control border border-dark" maxlength="1" name="abreviatura_ponal" required>
                            <input type="text" class="form-control border border-dark" maxlength="1" name="abreviatura_ponal" required>
                        </div>
                        <div class="invalid-feedback">
                            Por favor, ingresa la abreviatura completa.
                        </div>
                    </div>
                    <div class="form-group col-md4">
                        <label for="departamento">Departamento</label>
                        <input type="text" class="form-control border border-dark" id="departamento" name="departamento" placeholder="Departamento" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el departamento.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="area_metropolitana">Area Metropolitana</label>
                        <input type="text" class="form-control border border-dark" id="area_metropolitana" name="area_metropolitana" placeholder="Area Metropolitana" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el área metropolitana.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="asignacion_basica_mensual_ponal">Asignación Básica Mensual $</label>
                    <input type="text" class="form-control border border-dark" id="asignacion_basica_mensual_ponal" name="asignacion_basica_mensual" placeholder="Asignación Básica Mensual" required>
                    <div class="invalid-feedback">
                        Por favor, ingresa la asignación básica mensual.
                    </div>
                </div>
            </div>

            <h2 class="text-center m-3 fw-bold">MINISTERIO DE DEFENSA</h2>
            <div class="border p-2" id="defensa-container">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="fuerza">Fuerza a la que pertenece</label>
                        <select id="fuerza" class="form-control border border-dark" name="fuerza" required>
                            <option value="" selected>Seleccionar una opción</option>
                            <option value="ministerio_defensa">Ministerio de Defensa</option>
                            <option value="comando_general">Comando General</option>
                            <option value="ejercito_nacional">Ejército Nacional</option>
                            <option value="armada_nacional">Armada Nacional</option>
                            <option value="fuerza_aerea">Fuerza Aérea</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, selecciona la fuerza a la que pertenece.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="grado_defensa">Grado</label>
                        <select id="grado_defensa" class="form-control border border-dark" name="grado_defensa" required>
                            <option value="" selected>Seleccionar una opción</option>
                            <option value="oficial">Oficial</option>
                            <option value="suboficial">Suboficial</option>
                            <option value="infante">Infante</option>
                            <option value="soldado">Soldado</option>
                            <option value="administrativo">Administrativo y/o Personal Civil</option>
                            <option value="otro">Otro</option>
                        </select>
                        <div class="invalid-feedback">
                            Por favor, selecciona el grado.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="cual">Cual</label>
                        <input type="text" class="form-control border border-dark" id="cual" name="cual" placeholder="Cual" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa la especificación.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="abreviatura_ponal">Abreviatura</label>
                        <div class="input-group input-group-abreviatura">
                            <input type="text" class="form-control border border-dark" maxlength="1" name="abreviatura_ponal_1" required>
                            <input type="text" class="form-control border border-dark" maxlength="1" name="abreviatura_ponal_2" required>
                            <input type="text" class="form-control border border-dark" maxlength="1" name="abreviatura_ponal_3" required>
                            <input type="text" class="form-control border border-dark" maxlength="1" name="abreviatura_ponal_4" required>
                            <input type="text" class="form-control border border-dark" maxlength="1" name="abreviatura_ponal_5" required>
                        </div>
                        <div class="invalid-feedback">
                            Por favor, ingresa la abreviatura completa.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="unidad">Unidad a la que pertenece</label>
                        <input type="text" class="form-control border border-dark" id="unidad" name="unidad" placeholder="Unidad" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa la unidad a la que pertenece.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="ciudad">Ciudad</label>
                        <input type="text" class="form-control border border-dark" id="ciudad" name="ciudad" placeholder="Ciudad" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa la ciudad.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="asignacion_basica_mensual_defensa">Asignación Básica Mensual $</label>
                        <input type="text" class="form-control border border-dark" id="asignacion_basica_mensual_defensa" name="asignacion_basica_mensual" placeholder="Asignación Básica Mensual" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa la asignación básica mensual.
                        </div>
                    </div>
                </div>
            </div>

            <h2 class="text-center m-3 fw-bold">REFERENCIAS</h2>
            <h3 class="mt-4 fw-bold">Familiares</h3>
            <div class="border p-2">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="primer_apellido">Primer Apellido</label>
                        <input type="text" class="form-control border border-dark" id="primer_apellido" name="primer_apellido_fam1" placeholder="Primer Apellido" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el primer apellido.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="segundo_apellido">Segundo Apellido</label>
                        <input type="text" class="form-control border border-dark" id="segundo_apellido" name="segundo_apellido_fam1" placeholder="Segundo Apellido" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el segundo apellido.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="primer_nombre">Primer Nombre</label>
                        <input type="text" class="form-control border border-dark" id="primer_nombre" name="primer_nombre_fam1" placeholder="Primer Nombre" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el primer nombre.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="segundo_nombre">Segundo Nombre</label>
                        <input type="text" class="form-control border border-dark" id="segundo_nombre" name="segundo_nombre_fam1" placeholder="Segundo Nombre" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el segundo nombre.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="parentesco">Parentesco</label>
                        <input type="text" class="form-control border border-dark" id="parentesco" name="parentesco_fam1" placeholder="Parentesco" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el parentesco.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="direccion_ciudad">Dirección de Residencia y Ciudad</label>
                        <input type="text" class="form-control border border-dark" id="direccion_ciudad" name="direccion_ciudad_fam1" placeholder="Dirección de Residencia y Ciudad" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa la dirección de residencia y ciudad.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="telefono_oficina">Teléfono de Oficina</label>
                        <input type="text" class="form-control border border-dark" id="telefono_oficina" name="telefono_oficina_fam1" placeholder="Teléfono de Oficina" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el teléfono de oficina.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefono_residencia">Teléfono de Residencia</label>
                        <input type="text" class="form-control border border-dark" id="telefono_residencia" name="telefono_residencia_fam1" placeholder="Teléfono de Residencia" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el teléfono de residencia.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control border border-dark" id="celular" name="celular_fam1" placeholder="Celular" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el número de celular.
                        </div>
                    </div>
                </div>
            </div>
            <div class="border p-2">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="primer_apellido_2">Primer Apellido</label>
                        <input type="text" class="form-control border border-dark" id="primer_apellido_2" name="primer_apellido_fam2" placeholder="Primer Apellido" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el primer apellido.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="segundo_apellido_2">Segundo Apellido</label>
                        <input type="text" class="form-control border border-dark" id="segundo_apellido_2" name="segundo_apellido_fam2" placeholder="Segundo Apellido" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el segundo apellido.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="primer_nombre_2">Primer Nombre</label>
                        <input type="text" class="form-control border border-dark" id="primer_nombre_2" name="primer_nombre_fam2" placeholder="Primer Nombre" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el primer nombre.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="segundo_nombre_2">Segundo Nombre</label>
                        <input type="text" class="form-control border border-dark" id="segundo_nombre_2" name="segundo_nombre_fam2" placeholder="Segundo Nombre" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el segundo nombre.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="parentesco_2">Parentesco</label>
                        <input type="text" class="form-control border border-dark" id="parentesco_2" name="parentesco_fam2" placeholder="Parentesco" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el parentesco.
                        </div>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="direccion_ciudad_2">Dirección de Residencia y Ciudad</label>
                        <input type="text" class="form-control border border-dark" id="direccion_ciudad_2" name="direccion_ciudad_fam2" placeholder="Dirección de Residencia y Ciudad" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa la dirección de residencia y ciudad.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="telefono_oficina_2">Teléfono de Oficina</label>
                        <input type="text" class="form-control border border-dark" id="telefono_oficina_2" name="telefono_oficina_fam2" placeholder="Teléfono de Oficina" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el teléfono de oficina.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefono_residencia_2">Teléfono de Residencia</label>
                        <input type="text" class="form-control border border-dark" id="telefono_residencia_2" name="telefono_residencia_fam2" placeholder="Teléfono de Residencia" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el teléfono de residencia.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="celular_2">Celular</label>
                        <input type="text" class="form-control border border-dark" id="celular_2" name="celular_fam2" placeholder="Celular" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el número de celular.
                        </div>
                    </div>
                </div>
            </div>

            <h3 class="mt-4 fw-bold">Personal</h3>
            <div class="border p-2">
                <div class="form-row">
                    <div class="form-group col-md-3">
                        <label for="primer_apellido">Primer Apellido</label>
                        <input type="text" class="form-control border border-dark" id="primer_apellido" name="primer_apellido_personal" placeholder="Primer Apellido" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el primer apellido.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="segundo_apellido">Segundo Apellido</label>
                        <input type="text" class="form-control border border-dark" id="segundo_apellido" name="segundo_apellido_personal" placeholder="Segundo Apellido" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el segundo apellido.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="primer_nombre">Primer Nombre</label>
                        <input type="text" class="form-control border border-dark" id="primer_nombre" name="primer_nombre_personal" placeholder="Primer Nombre" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el primer nombre.
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="segundo_nombre">Segundo Nombre</label>
                        <input type="text" class="form-control border border-dark" id="segundo_nombre" name="segundo_nombre_personal" placeholder="Segundo Nombre" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el segundo nombre.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="direccion_ciudad">Dirección de Residencia y Ciudad</label>
                        <input type="text" class="form-control border border-dark" id="direccion_ciudad" name="direccion_ciudad_personal" placeholder="Dirección de Residencia y Ciudad" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa la dirección de residencia y ciudad.
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="telefono_oficina">Teléfono de Oficina</label>
                        <input type="text" class="form-control border border-dark" id="telefono_oficina" name="telefono_oficina_personal" placeholder="Teléfono de Oficina" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el teléfono de oficina.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="telefono_residencia">Teléfono de Residencia</label>
                        <input type="text" class="form-control border border-dark" id="telefono_residencia" name="telefono_residencia_personal" placeholder="Teléfono de Residencia" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el teléfono de residencia.
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="celular">Celular</label>
                        <input type="text" class="form-control border border-dark" id="celular" name="celular_personal" placeholder="Celular" required>
                        <div class="invalid-feedback">
                            Por favor, ingresa el número de celular.
                        </div>
                    </div>
                </div>
            </div>


            <h2 class="text-center m-4 fw-bold">DECLARACIONES VÁLIDAS ÚNICAMENTE PARA ASOCIADOS</h2>
            <div class="border p-2">
                <div class="form-row p-2">
                    <p>
                        1. Una vez aceptada mi asosiación, la Entidad a la que pertenezco queda
                        facultada para que efectúe el <strong>descuento del 5% de mi asignación básica mensual</strong>,
                        cantidad que entrego en calidad de aportes sociales periódicos a la Cooperativa
                        de Servidores Públicos & Jubilados de COOPSERP COLOMBIA Cuando se presente. Así
                        mismo queda autorizada para descontar las cuotas correspondientes a los préstamos
                        o servicios que en un futuro realice, acorde con las disposiciones legales y estautarias.
                    </p>
                    <p>
                        2. TRASLADOS: En el evento de ser trasladado de seccional, dependencia o haya empezado a
                        disfrutar de mi pensión de jubilación, informaré inmediatamente con el fin de dar continuidad
                        a las deducciones que deban realizarse. Si así no lo hiciere, COOPSERP COLOMBIA queda facultada
                        para exigir las obligaciones en su totalidad porla vía judicial.
                    </p>
                    <p>
                        3. DOMICILIO: Informaré oportunamente el cambio de domicilio, apartado o número telefónico.
                    </p>
                    <p>
                        4. REVINCULACIÓN: Podré Vincularme nuevamente como asociado según lo establecido en los Estatutos
                        que rigen la Entidad. (Art. 13) Para todos los efectos legales declaro bajo gravedad de juramento
                        que toda la información suministrada en esta Solicitud es totalmente cierta y puede ser verificada
                        en cualquier momento.
                    </p>
                </div>

                <h4 class="text-center mt-3 mb-3 fw-bold fs-2">AUTORIZACIÓN PARA EL TRATAMIENTO DE DATOS PERSONALES</h4>
                <p>
                    Al diligenciar este formato autorizo en forma expresa, inequívoca y permanente a COOPSERP COLOMBIA,
                    o a quienes representen sus derechos u ostente en el futuro la calidad de acreedor, cesionario, o
                    cualquier calidad frente a mi o frente a la persona que represento, coma titulares de la información y
                    en virtud del diligenciamiento del presente formato, para que realicen los tratamientos que se indican
                    a continuación, por considerarse necesarios e inherentes para el cumplimiento de la ley:
                </p>
                <p>
                    1. Soliciten, almacenen, consulten, compartan, informen, reporten, rectifiquen, procesen, modifiquen,
                    actualicen, aclaren, retiren o divulguen, ante operadores de informaci6n y riesgo, o ante cualquier
                    otra entidad que maneje o administre bases de datos en Colombia y en el exterior, todo lo referente a
                    mi información financiera, comercial y crediticia (presente, pasada y futura), incluyendo mis datos
                    biométricos y aquella relacionada con los derechos y obligaciones originados en virtud de cualquier
                    contrato celebrado u operación que haya llegado o llegare a celebraro realizar con COOPSERP. COLOMBIA
                </p>
                <p>
                    2. Accedan, recolecten, procesen, actualicen, conserven, compartan y destruyan mi información y
                    documentación, incluso aun cuando no se haya perfeccionado una relación contractual o después de finalizada
                    la misma.
                </p>
                <p>
                    3. Suministre, consulte, verifiquen y comparta la información financiera, comercial, crediticia mía y
                    actualice mi información o la de mi representado, de acuerdo con el análisis realizado.
                </p>
                <p>
                    4. Consulten, soliciten o verifiquen la información sabre mis activos, bienes o derechos en entidades
                    públicas o privadas, o que conozcan personas naturales o jurídicas, o que se encuentren en buscadores
                    públicos, redes sociales o publicaciones físicas o electrónicas, bien fuere en Colombia o en el exterior.
                </p>
                <p>
                    5. Consulten, soliciten o verifiquen mí información de ubicación o contacto en entidades públicas o privadas.
                </p>
                <p>
                    6. Me contacten via telefónica, mensajería instantánea directamente o a través de sus proveedores, me envíen
                    mensajes por cualquier medio, así coma correos electrónicos y redes sociales.
                </p>
                <p>
                    7. Compartan mi información o la de mi representada con proveedores o aliados.
                </p>
                <p>
                    8. Consulten, soliciten o verifiquen mi información de ubicación o contacto o la de mi representada en entidades públicas o privadas.
                </p>
                <p class="mt-5">
                    El tratamiento se podrá realizar para cumplir las finalidades señaladas en cada oportunidad de recolección de datos incluyendo, pero sin
                    limitarse a las siguientes:
                </p>
                <p>
                    1. Conocer mi comportamiento financiero, comercial y crediticio, y el cumplimiento de mis obligaciones legales.
                </p>
                <p>
                    2. Realicen todas las gestiones necesarias tendientes a confirmar y actualizar mi información.
                </p>
                <p>
                    3. Validar y verificar mi identidad para el ofrecimiento y administración de productos y servicios.
                </p>
                <p>
                    4. Establecer, mantener, terminar una relaci6n contractual y actualizar mi información.
                </p>
                <p>
                    5. Ofrecer y prestar sus productos o servicios a través de cualquier media o canal para mi beneficio.
                </p>
                <p>
                    6. Realizar una adecuada presentación y administración de los productos y servicios financieros, incluyendo la gestión de cobranza.
                </p>
                <p>
                    7. Suministrar información comercial, legal, de productos de seguridad, de servicio o de cualquier otro índole.
                </p>
                <p>
                    8. Efectuar las gestiones pertinentes para llevar a cabo el proceso de asociación, colocación de créditos y auxilios de la cooperativa
                    respecto de cualquiera de los productos o servicios que pueda adquirir o proveer en relación con esta.
                </p>
                <p>
                    9. Recolectar, almacenar y consultar datos biométricos coma la captura de imagen fija o en movimiento, huellas digitales, fotografias,
                    iris, reconocimiento de voz, facial o de palma de manos, entre otros.
                </p>
                <p>
                    10. Realizar invitaciones a eventos, mejorar y ofrecer nuevos productos y servicios.
                </p>
                <p>
                    11. Gestionar tramites de solicitudes, quejas, reclamos, sugerencias, y comentarios y la realización de analisis de riesgos, estudio
                    de perfil del asociado y de mercadeo, encuestas de satisfacción de los productos y servicios ofrecidos por COOPSERP COLOMBIA o empresas
                    vinculadas a la cooperativa a través de convenios y aliados comerciales.
                </p>
                <p>
                    12. Suministrar información de contacto al área comercial o quien haga sus veces o a terceros con los que COOPSERPCOLOMBIAposea un
                    vinculo comercial para desarrollar actividades de marketing e inteligencia de mercados.
                </p>
                <p>
                    13. Realizar todas las gestiones necesarias tendientes a confirmar y actualizar la información del asociado.
                </p>
                <p>
                    14. Recibir información por parte de COOPSERP COLOMBIA respecto a campanas comerciales actuales y futuras, promoción de productos
                    y servicios tanto propios coma de terceros, y demás comunicaciones necesarias para mantener comunicado y enterado informado al
                    asociado mediante: llamada telefónica, mensaje de texto, correo electrónico, o mensajería instantánea, Recibir mensajes relacionados
                    con la gestión de cobro y recuperación de cartera, ya sea directamente por COOPSERP COLOMBIA o mediante un tercero contratado para
                    tal función.
                </p>
                <p>
                    15. Verificar antecedentes comerciales, reputacionales y eventuales riesgo asociados al lavado de activos y financiaci6n del terrorismo.
                </p>
                <p>
                    16. Crear la base de datos para fines descritos en la autorización para el tratamiento de datos personales y aviso de privacidad.
                </p>
                <p class="mt-5">
                    COOPSERP COLOMBIA es responsable del tratamiento de datos personales, y cualquier titular de información puede consultar nuestra política
                    de Tratamiento Proteccióin de Datos Personales en la pagina web www.coopserp.com para conocer en detalle el tratamiento de la información
                    recogida, asi coma los procedimientos de consulta y reclamación que le permitirán hacer efectivos sus derechos, todo conforme a las normas
                    vigentes en Colombia
                </p>

                <h4 class="text-center mt-4 mb-3 fw-bold fs-2">DECLARACIÓN DE ORIGEN DE FONDOS</h4>
                <p>
                    El abajo firmante, obrando en nombre propio, de manera voluntaria y dando certeza de que aquí todo lo consignado es cierto, realizó la
                    siguiente declaración de fuente de fondos con el proposito de que se pueda dar cumplimiento a lo senalado al respecto en la Circular
                    Externa No. 004 del 27 de enero de 2017, expedida por la Superintendencia de Economia Solidaria y demás normas concordantes con la prevención
                    y el control de lavado de activos y financiación del terrorismo.
                </p>
                <p class="mt-4 mb-4">
                    Declaro expresamente lo siguiente
                </p>
                <p>
                    1. Tanto mi actividad, profesión u oficio es licita y la ejerzo dentro del marco legal y los recursos que poseo no provienen de actividades ilicitas
                    de las contempladas en el Código Penal Colombiano
                </p>
                <p>
                    2. La información que he suministrado en este documento es veraz y me comprometo
                </p>
                <p>
                    3. Los recursos que se deriven del desarrollo de la asociación no se destinaran a la financiación del terrorismo, grupos terroristas o actividades
                    terroristas
                </p>
                <p>
                    4. Los recursos que poseo provienen de las siguientes fuentes (detalle ocupación, oficio, actividad o negocio):
                </p>
            </div>
            <p class="text-center mt-5">
                <em>
                    Estimado asociado, al diligenciar este formulario usted autoriza de forma expresa e inequívoca a COOPSERP COLOMBIA a almacenar y hacer tratamiento
                    de sus datos biométricos con fines de identificación personal y para validación de identidad. El tratamiento se realizará de acuerdo con la política
                    de tratamiento de Datos Personales de COOPSERP COLOMBIA.
                </em>
            </p>

            <h2 class="text-center m-4 fw-bold">REGISTRO DE FIRMA Y HUELLA DACTILARES</h2>
            <div class="container border p-5 mx-auto mb-2 mt-2">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <div class="card-header text-center">
                                1
                            </div>
                            <div class="border p-5 mx-auto mb-2 mt-2 border border-dark" style="width: 150px; height: 150px;"></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="der1">DER</label>
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="radio" class="" id="check1" name="check">
                                            <label for="d1">D1</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check2" name="check">
                                            <label for="d2">D2</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check3" name="check">
                                            <label for="d3">D3</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check4" name="check">
                                            <label for="d4">D4</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check5" name="check">
                                            <label for="d5">D5</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="izq1">IZQ</label>
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="radio" class="" id="check6" name="check">
                                            <label for="d1">D1</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check7" name="check">
                                            <label for="d2">D2</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check8" name="check">
                                            <label for="d3">D3</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check9" name="check">
                                            <label for="d4">D4</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check10" name="check">
                                            <label for="d5">D5</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <div class="card-header text-center">
                                2
                            </div>
                            <div class="border p-5 mx-auto mb-2 mt-2 border border-dark" style="width: 150px; height: 150px;"></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="der1">DER</label>
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check1">
                                            <label for="d1">D1</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check1">
                                            <label for="d2">D2</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check1">
                                            <label for="d3">D3</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check1">
                                            <label for="d4">D4</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check1">
                                            <label for="d5">D5</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="izq1">IZQ</label>
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check1">
                                            <label for="d1">D1</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check1">
                                            <label for="d2">D2</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check1">
                                            <label for="d3">D3</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check1">
                                            <label for="d4">D4</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check1">
                                            <label for="d5">D5</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <div class="card">
                            <div class="card-header text-center">
                                3
                            </div>
                            <div class="border p-5 mx-auto mb-2 mt-2 border border-dark" style="width: 150px; height: 150px;"></div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="der1">DER</label>
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check2">
                                            <label for="d1">D1</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check2">
                                            <label for="d2">D2</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check2">
                                            <label for="d3">D3</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check2">
                                            <label for="d4">D4</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check2">
                                            <label for="d5">D5</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="izq1">IZQ</label>
                                    <div class="row">
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check2">
                                            <label for="d1">D1</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check2">
                                            <label for="d2">D2</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check2">
                                            <label for="d3">D3</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check2">
                                            <label for="d4">D4</label>
                                        </div>
                                        <div class="col-2">
                                            <input type="radio" class="" id="check" name="check2">
                                            <label for="d5">D5</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-4 border p-5 mx-auto mb-2 mt-2">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-check">
                            <input type="radio" class="form-check-input border border-dark" name="firma" required>
                            <label class="form-check-label" for="noIdentifiable">Huella No Identificable</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" class="form-check-input border border-dark" name="firma" required>
                            <label class="form-check-label" for="noSign">Manifiesta no saber Firmar</label>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <label for="signature" class="d-block">Firma</label>
                        <div id="signature" class="signature-box border border-dark"></div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <div class="header fs-4">PARA USO EXCLUSIVO DE COOPSERP COLOMBIA</div>
                <div class="box">
                    <div class="form-group row">
                        <label for="ciudadFecha" class="col-sm-2 col-form-label">Ciudad y Fecha:</label>
                        <div class="col-sm-10">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" class="form-control border border-dark" id="ciudadFecha" placeholder="Ciudad y Fecha:" required>
                                    <div class="invalid-feedback">
                                        Por favor, ingrese la ciudad y fecha.
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control border border-dark" placeholder="DÍA" required>
                                    <div class="invalid-feedback">
                                        Por favor, ingrese el día.
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control border border-dark" placeholder="MES" required>
                                    <div class="invalid-feedback">
                                        Por favor, ingrese el mes.
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control border border-dark" placeholder="AÑO" required>
                                    <div class="invalid-feedback">
                                        Por favor, ingrese el año.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="funcionario" class="col-sm-5 col-form-label">Funcionario que recibe:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control border border-dark" id="funcionario" placeholder="Funcionario que recibe:" required>
                            <div class="invalid-feedback">
                                Por favor, ingrese el nombre del funcionario.
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="codificacion" class="col-sm-2 col-form-label">Codificación:</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control border border-dark" id="codificacion" placeholder="Codificación" required>
                            <div class="invalid-feedback">
                                Por favor, ingrese la codificación.
                            </div>
                        </div>
                    </div>
                    <div class="box">
                        <label for="selloAgencia">Espacio designado para el sello de Agencia:</label>
                        <div id="selloAgencia" class="border border-dark" style="height: 100px;"></div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn text-light  mb-2 w-50 fw-bold fs-5" style="background-color: #6f42c1">Enviar</button>
                    </div>
                </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Validación personalizada de Bootstrap
            (() => {
                'use strict'

                // Obtener todos los formularios a los que queremos aplicar estilos de validación de Bootstrap
                const forms = document.querySelectorAll('.needs-validation')

                // Recorrerlos y prevenir el envío
                Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
            })();

            // Habilitar/deshabilitar inputs de Ponal y Defensa
            const ponalInputs = document.querySelectorAll('#ponal-container input, #ponal-container select');
            const defensaInputs = document.querySelectorAll('#defensa-container input, #defensa-container select');

            function disableInputs(inputs, state) {
                inputs.forEach(input => {
                    input.disabled = state;
                });
            }

            function allInputsEmpty(inputs) {
                return Array.from(inputs).every(input => input.value === "");
            }

            function toggleInputs(event) {
                if (event.target.closest('#ponal-container')) {
                    disableInputs(defensaInputs, true);
                    if (allInputsEmpty(ponalInputs)) {
                        disableInputs(defensaInputs, false);
                    }
                } else if (event.target.closest('#defensa-container')) {
                    disableInputs(ponalInputs, true);
                    if (allInputsEmpty(defensaInputs)) {
                        disableInputs(ponalInputs, false);
                    }
                }
            }

            ponalInputs.forEach(input => {
                input.addEventListener('input', toggleInputs);
            });

            defensaInputs.forEach(input => {
                input.addEventListener('input', toggleInputs);
            });

            // Habilitar/deshabilitar inputs de cuenta extranjera
            const cuentaExtranjeraSi = document.getElementById('cuenta_extranjera_si');
            const cuentaExtranjeraNo = document.getElementById('cuenta_extranjera_no');
            const cuentaExtranjeraInputs = document.querySelectorAll('#entidad, #moneda, #pais_ciudad');

            function toggleCuentaExtranjeraInputs(disabled) {
                cuentaExtranjeraInputs.forEach(input => {
                    input.disabled = disabled;
                });
            }

            cuentaExtranjeraSi.addEventListener('change', function() {
                toggleCuentaExtranjeraInputs(false);
            });

            cuentaExtranjeraNo.addEventListener('change', function() {
                toggleCuentaExtranjeraInputs(true);
            });

            if (cuentaExtranjeraNo.checked) {
                toggleCuentaExtranjeraInputs(true);
            }

            // Habilitar/deshabilitar input de ciudad basado en vivienda propia
            const viviendaPropiaSi = document.getElementById('vivienda_propia_si');
            const viviendaPropiaNo = document.getElementById('vivienda_propia_no');
            const ciudadVivienda = document.getElementById('ciudad_vivienda');

            function toggleCiudadViviendaInput(disabled) {
                ciudadVivienda.disabled = disabled;
            }

            viviendaPropiaSi.addEventListener('change', function() {
                toggleCiudadViviendaInput(false);
            });

            viviendaPropiaNo.addEventListener('change', function() {
                toggleCiudadViviendaInput(true);
            });

            if (viviendaPropiaNo.checked) {
                toggleCiudadViviendaInput(true);
            }

            // Habilitar/deshabilitar input de placa basado en posesión de vehículo
            const vehiculoSi = document.getElementById('vehiculo_si');
            const vehiculoNo = document.getElementById('vehiculo_no');
            const placaVehiculo = document.getElementById('placa_vehiculo');

            function togglePlacaVehiculoInput(disabled) {
                placaVehiculo.disabled = disabled;
            }

            vehiculoSi.addEventListener('change', function() {
                togglePlacaVehiculoInput(false);
            });

            vehiculoNo.addEventListener('change', function() {
                togglePlacaVehiculoInput(true);
            });

            if (vehiculoNo.checked) {
                togglePlacaVehiculoInput(true);
            }
        });
    </script>

</body>

</html>
