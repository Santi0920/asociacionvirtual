@include('layouts/head')

<body class="">
    @if (session('correcto'))
        <div>
            <script>
                Swal.fire({
                    html: `
                        <img width="100%" height="200" src="https://www.coopserp.com/permiso/img/logoCoopserp.svg" alt="Logo Coopserp">
                        <h3 class="text-center fw-bold mb-3 text-dark">!ASOCIACION VIRTUAL EXITOSA!</h3>
                        <div>{!! session('correcto') !!}</div>
                    `,
                    confirmButtonColor: '#646464'
                });
            </script>
        </div>
    @endif

    @if (session('incorrecto'))
        <div>
            <script>
                Swal.fire({
                    html: `
                        <img width="100%" height="200" src="https://www.coopserp.com/permiso/img/logoCoopserp.svg" alt="Logo Coopserp">
                        <h3 class="text-center fw-bold mb-3 text-dark">¡IDENTIFICAMOS QUE USTED NO ES ASOCIADO!</h3>
                        <div>{!! session('incorrecto') !!}</div>
                    `,
                    confirmButtonColor: '#646464'
                });
            </script>
        </div>
    @endif

    <div class="container my-5">
        <!-- <div class="row justify-content-center align-items-center vh-100 m-0"> -->
        <div class="row justify-content-center">
            <div class="col-12 p-3 shadow-lg rounded-3">
                <!-- Formulario -->
                <form action="{{ route('fase1') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <!-- Logo Coopserp/Titulo/Formato/Consecutivo -->
                    <div class="row m-0 p-3 pb-0 justify-content-center align-items-center">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                            <img width="100%" height="200"
                                src="https://www.coopserp.com/permiso/img/logoCoopserp.svg"
                                alt="https://www.coopserp.com/permiso/img/logoCoopserp.svg">
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 text-center">
                            <h1 class="h2 fw-bold m-0">VINCULACIÓN VIRTUAL COMO ASOCIADO ó ACTUALIZACIÓN DE DATOS<i
                                    class="fa-solid fa-caret-down"></i></h1>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-4 text-danger">
                            <div class="row">
                                <div class="col-6 text-center p-3">
                                    <h1 class="h1 fw-bold m-0">F1</h1>
                                </div>
                                <div class="col-6 text-center p-3">
                                    <h1 class="h1 fw-bold m-0">No...</h1>
                                </div>
                            </div>
                            <div class="row text-center">
                                <h3 class="fw-semibold"><span>Fecha: </span><span class="text-dark"
                                        id="currentDateTime"></span></h3>
                                <h3 class="fw-semibold fs-4"><span>Lugar desde donde nos escribe:</span></h3>
                                <div class="d-flex align-items-center">
                                    <span class="me-2 fs-2 text-dark">1.</span>
                                    <div class="select-container">

                                        <select id="ciudad" name="ciudad"
                                            class="form-field form-control border border-dark text-center fw-bold fs-5 blink"
                                            required>
                                            <option value="" selected disabled>Seleccionar Municipio</option>
                                            @foreach ($municipios as $municipio)
                                                <option
                                                    value="{{ $municipio->municipio . '-' . $municipio->departamento }}">
                                                    {{ $municipio->municipio . '-' . $municipio->departamento }}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-chevron-down">
                                                <path d="m6 9 6 6 6-6" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="invalid-feedback">
                                    Seleccionar una agencia.
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Texto de Ley 1581 -->
                    <div class="row m-0 p-3">
                        <div class="col-12 d-flex flex-column mt-3 text-sm-center text-md-start">
                            <hr class="border border-secondary opacity-75 d-block d-md-none">
                            <p class="fw-semibold">
                                Ley 1581 de 2012 Protección de Datos Personales
                            </p>
                            <hr class="border border-secondary border-2 opacity-75 d-block d-md-none">
                            <p class="fw-semibold">
                                Reconoce y protege el derecho que tienen todas las personas a conocer, actualizar y
                                rectificar las
                                informaciones que se hayan recogido sobre ellas en bases de datos o
                                archivos que sean susceptibles de tratamiento por entidades de naturaleza pública o
                                privada
                            </p>
                        </div>
                    </div>

                    <div class="row m-0 p-3">
                        <!-- ========== Lado Derecho ========== -->
                        <div class="col-12 col-md-12 col-lg-6">

                            <!-- tipo de asociacion : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-auto">
                                    <label class="col-form-label"><span class="fw-bold tamanio d-none d-sm-none d-md-none d-lg-inline">2. </span>Seleccione una opción :</label>
                                </div>
                                <div class="m-0 col-auto form-check">
                                    <input type="radio" class="btn-check form-field" name="tipoavirtual" id="asociacion" autocomplete="off" value="asociacion" required>
                                    <label class="btn btn-outline-primary" for="asociacion">Asociación</label>

                                    <input type="radio" class="btn-check form-field" name="tipoavirtual" id="actualizacion" autocomplete="off" value="actualizacion" required>
                                    <label class="btn btn-outline-primary" for="actualizacion">Actualización de datos</label>
                                    <div class="invalid-feedback">
                                        Seleccionar una opción.
                                    </div>
                                </div>
                            </div>

                            <!-- Nombre : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="nombre" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">4. </span>
                                        Nombre(s) :</label>
                                </div>
                                <div class="m-0 col">
                                    <input type="text" id="nombre"
                                        class="form-field form-control  border border-dark" placeholder="Nombre"
                                        name="nombre" required>
                                </div>
                            </div>
                            <!-- Lugar de Nacimiento : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="nacimiento" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">6.
                                        </span>Lugar de Nacimiento :</label>
                                </div>
                                <div class="m-0 col">
                                    <div class="select-container">
                                        <select class="form-field form-control border border-dark" id=""
                                            name="lnacimiento" required>
                                            <option value="" selected disabled>Seleccionar Opción</option>
                                            @foreach ($municipios as $municipio)
                                                <option
                                                    value="{{ $municipio->municipio . '-' . $municipio->departamento }}">
                                                    {{ $municipio->municipio . '-' . $municipio->departamento }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="select-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-chevron-down">
                                                <path d="m6 9 6 6 6-6" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tipo de Identificacion? : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-auto">
                                    <label for="" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">8.
                                        </span>Tipo de Identificación? :</label>
                                </div>
                                <div class="m-0 col-auto form-check text-center">
                                    <input type="radio" class="form-field btn-check" name="tidentificacion"
                                        id="CC" autocomplete="off" value="C.C" required>
                                    <label class="btn btn-outline-secondary" for="CC">C.C</label>

                                    <input type="radio" class="form-field btn-check" name="tidentificacion"
                                        id="CE" autocomplete="off" value="C.E" required>
                                    <label class="btn btn-outline-secondary" for="CE">C.E</label>

                                    <input type="radio" class="form-field btn-check" name="tidentificacion"
                                        id="TI" autocomplete="off" value="T.I" required>
                                    <label class="btn btn-outline-secondary" for="TI">T.I</label>
                                    <div class="invalid-feedback">
                                        Seleccionar una opción.
                                    </div>
                                </div>
                            </div>
                            <!-- Lugar de expedición : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="expedicion" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">10.
                                        </span>Lugar de expedición :</label>
                                </div>
                                <div class="m-0 col">
                                    <div class="select-container">
                                        <select class="form-field form-control border border-dark" id=""
                                            name="lexpedicion" required>
                                            <option value="" selected disabled>Seleccionar Opción</option>
                                            @foreach ($municipios as $municipio)
                                                <option
                                                    value="{{ $municipio->municipio . '-' . $municipio->departamento }}">
                                                    {{ $municipio->municipio . '-' . $municipio->departamento }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="select-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-chevron-down">
                                                <path d="m6 9 6 6 6-6" />
                                            </svg>
                                        </div>
                                        <div class="invalid-feedback">
                                            Seleccionar una opción.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Direccion de residencia : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="nombre" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">12. </span>
                                        Dirección de residencia:</label>
                                </div>
                                <div class="m-0 col">
                                    <input type="text" id="residencia"
                                        class="form-field form-control  border border-dark"
                                        placeholder="Dirección residencia" name="dresidencia" required>
                                </div>
                            </div>

                        </div>
                        <!-- ========== Lado Derecho ========== -->
                        <div class=" col-12 col-md-12 col-lg-6">
                            <!-- Genero : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-auto">
                                    <label for="" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">3.
                                        </span>Genero :</label>
                                </div>
                                <div class="m-0 col-auto form-check">
                                    <input type="radio" class="form-field btn-check" name="genero" id="hombre"
                                        autocomplete="off" value="M" required>
                                    <label class="btn btn-outline-primary" for="hombre">M</label>

                                    <input type="radio" class="form-field btn-check" name="genero" id="mujer"
                                        autocomplete="off" value="F" required>
                                    <label class="btn btn-outline-primary" for="mujer">F</label>
                                    <div class="invalid-feedback">
                                        Seleccionar una opción.
                                    </div>
                                </div>
                            </div>
                            <!-- Apellidos : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="apellidos" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">5.
                                        </span>Apellidos :</label>
                                </div>
                                <div class="m-0 col">
                                    <input type="text" id="apellidos"
                                        class="form-field form-control border border-dark" placeholder="APELLIDOS"
                                        name="apellidos" style="text-transform: uppercase;" required>
                                </div>
                            </div>
                            <!-- Fecha de nacimiento : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="fecha_nacimiento" class="col-form-label">
                                        <span class="fw-bold tamanio d-none d-sm-none d-md-none d-lg-inline">7.
                                        </span>Fecha de nacimiento:&nbsp;&nbsp;
                                    </label>
                                    <div style="display: inline-block;">
                                        <select id="dia" name="dia" required
                                            style="display: inline-block; width: auto; margin-right: 10px;"
                                            class="form-field form-control border border-dark">
                                            <option value="">Día</option>
                                            <script>
                                                for (let i = 1; i <= 31; i++) {
                                                    document.write('<option value="' + i + '">' + i + '</option>');
                                                }
                                            </script>
                                        </select>

                                        <select id="mes" name="mes" required
                                            style="display: inline-block; width: auto; margin-right: 10px;"
                                            class="form-field form-control  border border-dark">
                                            <option value="">Mes</option>
                                            <option value="Enero">Enero</option>
                                            <option value="Febrero">Febrero</option>
                                            <option value="Marzo">Marzo</option>
                                            <option value="Abril">Abril</option>
                                            <option value="Mayo">Mayo</option>
                                            <option value="Junio">Junio</option>
                                            <option value="Julio">Julio</option>
                                            <option value="Agosto">Agosto</option>
                                            <option value="Septiembre">Septiembre</option>
                                            <option value="Octubre">Octubre</option>
                                            <option value="Noviembre">Noviembre</option>
                                            <option value="Diciembre">Diciembre</option>
                                        </select>

                                        <select id="anio" name="anio" required
                                            style="display: inline-block; width: auto;"
                                            class="form-field form-control  border border-dark">
                                            <option value="">Año</option>
                                            <!-- Generar los años desde el año actual menos 18 hasta un año razonable en el pasado -->
                                            <script>
                                                const yearNow = new Date().getFullYear();
                                                const yearMin = yearNow - 18;
                                                for (let i = yearMin; i >= 1900; i--) {
                                                    document.write('<option value="' + i + '">' + i + '</option>');
                                                }
                                            </script>
                                        </select>
                                        <div class="invalid-feedback">
                                            Seleccionar una opción.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- No de identificación : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">9.
                                        </span>No de identificación :</label>
                                </div>
                                <div class="m-0 col">
                                    <input type="number" id="input2"
                                        class="form-field form-control  border border-dark"
                                        placeholder="No de identificación" name="noidentificacion" required>
                                </div>
                            </div>
                            <!-- Fecha de expedición : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="" class="col-form-label">
                                        <span class="fw-bold tamanio d-none d-sm-none d-md-none d-lg-inline">11.
                                        </span>Fecha de expedición:&nbsp;&nbsp;
                                    </label>
                                    <div style="display: inline-block;">
                                        <select id="diadiaexpedicion" name="diaexpedicion" required
                                            style="display: inline-block; width: auto; margin-right: 10px;"
                                            class="form-field form-control  border border-dark">
                                            <option value="">Día</option>
                                            <!-- Generar los días del 1 al 31 -->
                                            <script>
                                                for (let i = 1; i <= 31; i++) {
                                                    document.write('<option value="' + i + '">' + i + '</option>');
                                                }
                                            </script>
                                        </select>

                                        <select id="mesdiaexpedicion" name="mesdiaexpedicion" required
                                            style="display: inline-block; width: auto; margin-right: 10px;"
                                            class="form-field form-control  border border-dark">
                                            <option value="">Mes</option>
                                            <option value="Enero">Enero</option>
                                            <option value="Febrero">Febrero</option>
                                            <option value="Marzo">Marzo</option>
                                            <option value="Abril">Abril</option>
                                            <option value="Mayo">Mayo</option>
                                            <option value="Junio">Junio</option>
                                            <option value="Julio">Julio</option>
                                            <option value="Agosto">Agosto</option>
                                            <option value="Septiembre">Septiembre</option>
                                            <option value="Octubre">Octubre</option>
                                            <option value="Noviembre">Noviembre</option>
                                            <option value="Diciembre">Diciembre</option>
                                        </select>

                                        <select id="anio" name="anioexpedicion" required
                                            style="display: inline-block; width: auto;"
                                            class="form-field form-control  border border-dark">
                                            <option value="">Año</option>
                                            <script>
                                                const yearNow2 = new Date().getFullYear();
                                                const yearMin2 = yearNow2;
                                                for (let i = yearMin2; i >= 1900; i--) {
                                                    document.write('<option value="' + i + '">' + i + '</option>');
                                                }
                                            </script>
                                        </select>

                                    </div>
                                </div>
                            </div>

                            <!-- Ciudad de Residencia : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">13.
                                        </span>Ciudad de residencia :</label>
                                </div>
                                <div class="m-0 col">
                                    <div class="select-container">
                                        <select class="form-field form-control border border-dark" id=""
                                            name="ciudadresidencia" required>
                                            <option value="" selected disabled>Seleccionar Opción</option>
                                            @foreach ($municipios as $municipio)
                                                <option
                                                    value="{{ $municipio->municipio . '-' . $municipio->departamento }}">
                                                    {{ $municipio->municipio . '-' . $municipio->departamento }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="select-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-chevron-down">
                                                <path d="m6 9 6 6 6-6" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- ========== Empresa donde trabaja ========== -->
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="empresa" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">14.
                                        </span>Empresa donde trabaja :</label>
                                </div>
                                <div class="m-0 col">
                                    <input type="text" id="empresa"
                                        class="form-field form-control  border border-dark"
                                        placeholder="Empresa donde trabaja" name="empresatrabaja" required>
                                </div>
                            </div>
                        </div>
                        <!-- ========== Lado Derecho ========== -->
                        <div class="col-12 col-md-12 col-lg-6">
                            <!-- Dirección trabajo : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="trabajo" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">15.
                                        </span>Dirección Empresa :</label>
                                </div>
                                <div class="m-0 col">
                                    <input type="text" id="trabajo"
                                        class="form-field form-control  border border-dark"
                                        placeholder="Dirección Empresa" name="dtrabajo" required>
                                </div>
                            </div>
                            <!-- Cargo : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="cargo" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">17.
                                        </span>Cargo :</label>
                                </div>
                                <div class="m-0 col">
                                    <input type="text" id="cargo"
                                        class="form-field form-control  border border-dark" placeholder="Cargo"
                                        name="cargo" required>
                                </div>
                            </div>

                            <!-- ========== Dirección de correspondencia ========== -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="dir_correspondencias" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">19.
                                        </span>Dirección de
                                        correspondencia :</label>
                                </div>
                                <div class="m-0 col">
                                    <input type="text" id="dir_correspondencias"
                                        class="form-field form-control  border border-dark"
                                        placeholder="Dirección de correspondencia" name="dcorrespondencia" required>
                                </div>
                            </div>
                        </div>
                        <!-- ========== Lado Izquierdo ========== -->
                        <div class="col-12 col-md-12 col-lg-6">
                            <!-- Ciudad de la empresa : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="ciudad_empresa" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">16.
                                        </span>Ciudad de la empresa
                                        :</label>
                                </div>
                                <div class="m-0 col">
                                    <div class="select-container">
                                        <select class="form-field form-control border border-dark" id="ciudad_empresa"
                                            name="ciudadempresa" required>
                                            <option value="" selected disabled>Seleccionar Opción</option>
                                            @foreach ($municipios as $municipio)
                                                <option
                                                    value="{{ $municipio->municipio . '-' . $municipio->departamento }}">
                                                    {{ $municipio->municipio . '-' . $municipio->departamento }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="select-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-chevron-down">
                                                <path d="m6 9 6 6 6-6" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Tiempo en el cargo : -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="tiempo_cargo" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">18.
                                        </span>Tiempo en el cargo :</label>
                                </div>
                                <div class="m-0 col">
                                    <div style="display: inline-block;">
                                        <select id="anios" name="anios" required
                                            style="display: inline-block; width: auto; margin-right: 10px;"
                                            class="form-field form-control  border border-dark">
                                            <option value="">Año(s)</option>
                                            <script>
                                                for (let i = 0; i <= 60; i++) {
                                                    document.write('<option value="' + i + '">' + i + '</option>');
                                                }
                                            </script>
                                        </select>
                                        <select id="meses" name="meses" required
                                            style="display: inline-block; width: auto; margin-right: 10px;"
                                            class="form-field form-control  border border-dark">
                                            <option value="">Mese(s)</option>
                                            <script>
                                                for (let i = 0; i <= 11; i++) {
                                                    document.write('<option value="' + i + '">' + i + '</option>');
                                                }
                                            </script>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <!-- ========== Ciudad de correspondencia ========== -->
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">20.
                                        </span>Ciudad de correspondencia :</label>
                                </div>
                                <div class="m-0 col">
                                    <div class="select-container">
                                        <select class="form-field form-control border border-dark" id=""
                                            name="ciudcorrespondencia" required>
                                            <option value="" selected disabled>Seleccionar Opción</option>
                                            @foreach ($municipios as $municipio)
                                                <option
                                                    value="{{ $municipio->municipio . '-' . $municipio->departamento }}">
                                                    {{ $municipio->municipio . '-' . $municipio->departamento }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="select-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-chevron-down">
                                                <path d="m6 9 6 6 6-6" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ========== Lado Derecho ========== -->
                        <div class="col-12 col-md-12 col-lg-6">
                            <!-- Celular #1 : -->
                            <div class="row m-0 mb-2 align-items-center">
                                <div class="col-auto">
                                    <label for="code1" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">21.
                                        </span>Celular #1:</label>
                                </div>
                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <div class="select-container">
                                            <select name="code1" id="code1"
                                                class="form-field form-control border border-dark me-2">
                                                @include('layouts.optionscellphone')
                                            </select>
                                            <div class="select-arrow" style="right: 10px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="red"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-chevron-down">
                                                    <path d="m6 9 6 6 6-6" />
                                                </svg>
                                            </div>
                                        </div>
                                        <input type="number" id="celular1" class="form-control border border-dark"
                                            placeholder="Número de celular" name="celular1" required>
                                    </div>
                                </div>
                            </div>

                            <!-- WhatsApp #1 : -->
                            <div class="row m-0 mb-2 align-items-center">
                                <div class="col-auto">
                                    <label for="code1" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">23.
                                        </span>Whatsapp #1:</label>
                                </div>
                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <div class="select-container">
                                            <select name="code1whatsapp" id="code1"
                                                class="form-field form-control border border-dark me-2">
                                                @include('layouts.optionscellphone')
                                            </select>
                                            <div class="select-arrow" style="right: 10px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="red"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-chevron-down">
                                                    <path d="m6 9 6 6 6-6" />
                                                </svg>
                                            </div>
                                        </div>
                                        <input type="number" id="whatsapp1"
                                            class="form-field form-control border border-dark"
                                            placeholder="Número de celular" name="whatsapp1" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ========== Lado Izquierdo ========== -->
                        <div class="col-12 col-md-12 col-lg-6">
                            <!-- Celular #2 : -->
                            <div class="row m-0 mb-2 align-items-center">
                                <div class="col-auto">
                                    <label for="code1" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">22.
                                        </span>Celular #2:</label>
                                </div>
                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <div class="select-container">
                                            <select name="code2" id="code1"
                                                class="form-field form-control border border-dark me-2">
                                                @include('layouts.optionscellphone')
                                            </select>
                                            <div class="select-arrow" style="right: 10px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="red"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-chevron-down">
                                                    <path d="m6 9 6 6 6-6" />
                                                </svg>
                                            </div>
                                        </div>
                                        <input type="number" id="celular2"
                                            class="form-field form-control border border-dark"
                                            placeholder="Número de celular" name="celular2" required>
                                    </div>
                                </div>
                            </div>
                            <!-- WhatsApp #2 : -->
                            <div class="row m-0 mb-2 align-items-center">
                                <div class="col-auto">
                                    <label for="code1" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">24.
                                        </span>Whatsapp #2:</label>
                                </div>
                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <div class="select-container">
                                            <select name="code2whatsapp" id="code1"
                                                class="form-field form-control border border-dark me-2">
                                                @include('layouts.optionscellphone')
                                            </select>
                                            <div class="select-arrow" style="right: 10px;">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="red"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-chevron-down">
                                                    <path d="m6 9 6 6 6-6" />
                                                </svg>
                                            </div>
                                        </div>
                                        <input type="number" id="whatsapp2"
                                            class="form-field form-control border border-dark"
                                            placeholder="Número de celular" name="whatsapp2" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ========== Correo electronico ========== -->
                        <div class="col-12 col-md-12 col-lg-12">
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="correo" class="col-form-label"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">25.
                                        </span>Correo electronico :</label>
                                </div>
                                <div class="row m-0">
                                    <div class="col">
                                        <div class="d-flex align-items-center">
                                            <input type="text" id="correo-usuario"
                                                class="form-field form-control border border-dark me-2 w-50"
                                                placeholder="ejemplo123" name="correousuario" required>
                                            <span class="me-2">@</span>
                                            <input type="text" id="correo-dominio"
                                                class="form-field form-control border border-dark w-50"
                                                placeholder="dominio.com" name="correodominio" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ========== Se autoriza a Coopserp para que consulte en las centrales de riesgo ========== -->
                        <div id="authorization-section" class="col-12 col-md-12 col-lg-12">
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-auto">
                                    <label for="" class="col-form-label text-center text-md-start"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">26.
                                        </span>Usted autoriza a Coopserp para que
                                        consulte sus datos en las
                                        centrales de
                                        riesgo :</label>
                                </div>
                                <div class="m-0 px-3 col-12 col-md-12 col-lg-auto form-check text-center">
                                    <input type="radio" class="btn-check form-field" name="autoriza"
                                        id="si-autoriza" autocomplete="off" value="SI" required>
                                    <label class="btn btn-outline-primary" for="si-autoriza">SI</label>

                                    <input type="radio" class="btn-check form-field" name="autoriza"
                                        id="no-autoriza" autocomplete="off" value="NO" required>
                                    <label class="btn btn-outline-primary" for="no-autoriza">NO</label>
                                    <div class="invalid-feedback">
                                        Seleccionar una opción.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="authorization-section" class="col-12 col-md-12 col-lg-12 d-none">
                            <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-auto">
                                    <label for="" class="col-form-label text-center text-md-start"><span
                                            class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">27.
                                        </span>¿Cual agencia le gustaria vincularse?</label>
                                </div>
                                <div class="m-0 px-3 col-12 col-md-12 col-lg-auto form-check text-center">
                                    <div class="select-container">

                                        <select id="ciudad" name="ciudad"
                                            class="form-field form-control border border-dark text-center fw-bold fs-5 blink"
                                            required>
                                            <option value="" selected disabled>Agencia</option>
                                            @foreach ($agencias as $agencia)
                                                <option value="{{ $agencia->NumAgencia }}">
                                                    {{ $agencia->NumAgencia . ' - ' . ($agencia->NameAgencia == 'La Unión' ? $agencia->NameAgencia . ' - Valle' : $agencia->NameAgencia) }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="select-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="lucide lucide-chevron-down">
                                                <path d="m6 9 6 6 6-6" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <div class="invalid-feedback">
                                    Seleccionar una agencia.
                                </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center mt-2">
                            <button id="asociarmeBtn" class="btn btn-success fs-5 fw-bold w-100"
                                type="submit">¡ASOCIARME!</button>
                        </div>
                        <script>
                            document.getElementById('asociarmeBtn').addEventListener('click', function() {
                                const formFields = document.querySelectorAll('.form-field');
                                let allFieldsFilled = true;

                                formFields.forEach(field => {
                                    if (!field.value) {
                                        field.classList.add('error');
                                        allFieldsFilled = false;
                                    } else {
                                        field.classList.remove('error');
                                    }
                                });

                                if (allFieldsFilled) {
                                    Swal.fire({
                                        title: 'Cargando...',
                                        allowOutsideClick: false,
                                        didOpen: () => {
                                            Swal.showLoading();
                                        }
                                    });

                                    setTimeout(() => {
                                        Swal.close();
                                    }, 10000);
                                } else {
                                    Swal.fire({
                                        title: 'Error',
                                        text: 'Faltan campos por completar, se encuentran en color rojo.',
                                        icon: 'error',
                                        confirmButtonColor: '#646464'
                                    });
                                }
                            });

                            document.getElementById('actualizacion').addEventListener('change', function() {
                                document.getElementById('authorization-section').style.display = 'none';
                                document.getElementById('si-autoriza').required = false;
                                document.getElementById('no-autoriza').required = false;
                            });

                            document.getElementById('asociacion').addEventListener('change', function() {
                                document.getElementById('authorization-section').style.display = 'block';
                                document.getElementById('si-autoriza').required = true;
                                document.getElementById('no-autoriza').required = true;
                            });

                        </script>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .tamanio d-none d-sm-none d-md-none d-lg-inline {
            font-size: 18px;
        }

        .select-container {
            position: relative;
            display: inline-block;
        }

        .select-container select {
            appearance: none;
            /* Remove default arrow */
            -webkit-appearance: none;
            /* Remove default arrow in Safari */
            -moz-appearance: none;
            /* Remove default arrow in Firefox */
            padding-right: 30px;
            /* Make space for the custom arrow */
        }

        .select-container .select-arrow {
            position: absolute;
            top: 50%;
            right: 20px;
            pointer-events: none;
            /* Allow click through to the select element */
            transform: translateY(-50%);
        }

        .select-arrow svg {
            stroke: black;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>


        (() => {
            'use strict'

            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            const forms = document.querySelectorAll('.needs-validation')

            // Loop over them and prevent submission
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }

                    form.classList.add('was-validated')
                }, false)
            })
        })()


        function mostrarHoraActual() {
            var now = new Date();
            var formattedDate = obtenerFechaFormateada(now);
            document.getElementById('currentDateTime').textContent = formattedDate;
        }

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
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

        function limitInputLength(element, maxLength) {
            element.addEventListener('input', function () {
                if (this.value.length > maxLength) {
                    this.value = this.value.slice(0, maxLength);
                }
            });
        }


        limitInputLength(document.getElementById('input2'), 11);
        limitInputLength(document.getElementById('celular1'), 10);
        limitInputLength(document.getElementById('celular2'), 10);
        limitInputLength(document.getElementById('whatsapp1'), 10);
        limitInputLength(document.getElementById('whatsapp2'), 10);
    </script>
</body>

</html>
