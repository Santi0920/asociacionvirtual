@include('layouts/head2')

<body>
    @if (!session()->has('email'))
        @php
            header("Location: login");
            exit();
        @endphp
    @else
    @endif
    <div class="wrapper d-flex align-items-stretch">
        <nav id="sidebar" class="">
            <div class="custom-menu d-block d-lg-none">
                <button type="button" id="sidebarCollapse" class="btn btn-primary">
                    <i class="fa fa-bars"></i>
                    <span class="sr-only">Toggle Menu</span>
                </button>
            </div>
            <div class="p-4">
                <div class="image-container mb-2">
                    <img src="https://www.coopserp.com/permiso/img/logoCoopserp.svg" alt="Logo Coopserp"
                        style="filter: drop-shadow(0 2px 0.4px white);">
                </div>
                <div class="text-center">
                    <h1 class="fs-5 text-white">❗Asociación Virtual❗</h1>
                    <img style="height: 5.5rem" class="mx-1 mb-2 mt-2" src="img/perfil.png">
                    <h1 class="fs-5 text-white">Bienvenido <span class="text-warning">{{ session('name') }}</span>
                    </h1>

                </div>
                <ul class="list-unstyled components mb-5">
                    <li class="active fs-5" title="Fase 1">
                        <a href="#"><i class="fa-solid fa-file-invoice mr-2"></i> Solicitudes F1</a>
                    </li>
                    <li class="fs-5" title="Fase 2">
                        <a href="#"><i class="fa-solid fa-scroll mr-2"></i> Solicitudes F2</a>
                    </li>
                    <li class="fs-5">
                        <a href="#"><span class="fa fa-briefcase mr-3"></span> Proximamente</a>
                    </li>
                    <li class="fs-5">
                        <a href="#"><span class="fa fa-sticky-note mr-3"></span> Proximamente</a>
                    </li>
                    <li class="fs-5">
                        <a href="#"><span class="fa fa-paper-plane mr-3"></span> Proximamente</a>
                    </li>
                </ul>
                <a onclick="return csesion()" href="{{ route('login.destroy') }}">
                    <div class="text-center mb-4">
                        <button class="btn-class-name" title="Cerrar Sesión">
                            <span class="back"></span>
                            <span class="front"><i class="fa-solid fa-right-from-bracket"></i></span>
                        </button>
                    </div>
                </a>

                <div class="footer">
                    <p class="text-white">Coopserp Web &copy; <?php echo date('Y'); ?> Diseñado y Desarrollado
                        por <a class="text-warning text-decoration-none fw-semibold" target="_blank"
                            href="https://github.com/Santi0920">Santiago Henao</a>.</p>
                </div>


            </div>
        </nav>

        <!-- Page Content  -->
        <div id="content" class="p-4 p-md-5 pt-5 mt-0">
            <h2 class="mb-4 fw-bold font mt-0 text-dark">ASOCIACIONES ó ACTUALIZACIÓN DE DATOS - FASE #1</h2>
            <div class="table-responsive w-100 text-start">
                <table class="table table-hover fs-5 text-start" id="asociaciones">
                    <thead>
                        <tr>
                            <th class="text-start">ID</th>
                            <th class="text-start">FECHA SOLICITUD</th>
                            <th class="text-start">CÉDULA</th>
                            <th class="text-start">NOMBRE COMPLETO</th>
                            <th class="text-start">AGENCIA</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade fs-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5 fw-bold text-dark" id="nombrehead"></h1>
                    <button type="button" class="btn-close fs-5" data-bs-dismiss="modal" aria-label="Close"
                        style="outline: none; border: none; font-size:18px" onclick="hideModal()">
                    </button>
                </div>
                <div class="modal-body text-dark">
                    <form action="{{route('validarfase2')}}" method="POST" class="needs-validation" novalidate id="modalf1">
                            @csrf
                            <!-- Logo Coopserp/Titulo/Formato/Consecutivo -->
                            <input type="text" value="" name="id" id="id" class="d-none">
                            <div class="row m-0 p-3 pb-0 justify-content-center align-items-center">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 d-none d-md-none d-lg-block">
                                <img width="100%" height="200" src="https://www.coopserp.com/permiso/img/logoCoopserp.svg" alt="https://www.coopserp.com/permiso/img/logoCoopserp.svg">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 text-center">
                                <h1 class="h2 fw-bold m-0">VINCULACIÓN VIRTUAL COMO ASOCIADO ó ACTUALIZACIÓN DE DATOS</h1>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 text-danger">
                                <div class="row">
                                    <div class="col-6 text-center p-3">
                                        <h1 class="h1 fw-bold m-0">F1</h1>
                                    </div>
                                    <div class="col-6 text-center p-3">
                                        <h1 class="h1 fw-bold m-0 text-danger" id="numeroAutorizacion"></h1>
                                    </div>
                                </div>
                                <div class="row text-center">
                                        <h3 class="fw-semibold"><span>Fecha: </span><span class="text-dark" id="fecha"></span></h3>
                                        <div class="select-container">
                                            <select id="ciudad" name="ciudad" class="form-control border border-dark text-center fw-bold fs-5 blink" style="" required>
                                                @foreach($municipios as $municipio)
                                                    <option value="{{ $municipio->municipio . '-' . $municipio->departamento }}">{{ $municipio->municipio . '-' . $municipio->departamento }}</option>
                                                @endforeach
                                            </select>
                                            <div class="select-arrow" style="right: 40px">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                                <path d="m6 9 6 6 6-6"/>
                                                </svg>
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
                                    Reconoce y protege el derecho que tienen todas las personas a conocer, actualizar y rectificar las
                                    informaciones que se hayan recogido sobre ellas en bases de datos o
                                    archivos que sean susceptibles de tratamiento por entidades de naturaleza pública o privada
                                </p>
                            </div>
                            </div>

                            <div class="row m-0 p-3">
                            <!-- ========== Lado Derecho ========== -->
                            <div class="col-12 col-md-12 col-lg-6">

                                <!-- Primera vez que se vincula? : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-auto">
                                    <label class="col-form-label"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">1. </span>Primera vez que se vincula? :</label>
                                </div>
                                <div class="m-0 col-auto form-check">
                                        <input type="radio" class="btn-check"  name="vinculado" id="si" autocomplete="off" value="SI" required>
                                        <label class="btn btn-outline-primary" for="si">SI</label>

                                        <input type="radio" class="btn-check"  name="vinculado" id="no" autocomplete="off" value="NO" required>
                                        <label class="btn btn-outline-primary" for="no">NO</label>
                                        <div class="invalid-feedback">
                                            Seleccionar una opción.
                                        </div>
                                </div>
                                </div>

                                <!-- Nombre : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="nombre" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">3. </span> Nombre(s) :</label>
                                </div>
                                <div class="m-0 col">
                                    <input type="text" id="nombre" class="form-control  border border-dark" placeholder="Nombre" name="nombre" required>
                                </div>
                                </div>
                                <!-- Lugar de Nacimiento : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="nacimiento" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">5. </span>Lugar de Nacimiento :</label>
                                </div>
                                <div class="m-0 col">
                                    <div class="select-container">
                                        <select class="form-control border border-dark" id="lnacimiento" name="lnacimiento" required>
                                            @foreach($municipios as $municipio)
                                                <option value="{{ $municipio->municipio . '-' . $municipio->departamento }}">{{ $municipio->municipio . '-' . $municipio->departamento }}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                            <path d="m6 9 6 6 6-6"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- Tipo de Identificacion? : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-auto">
                                    <label for="" class="col-form-label"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">7. </span>Tipo de Identificación? :</label>
                                </div>
                                <div class="m-0 col-auto form-check text-center">
                                        <input type="radio" class="btn-check" name="tidentificacion" id="CC" autocomplete="off" value="C.C" required>
                                        <label class="btn btn-outline-secondary" for="CC">C.C</label>

                                        <input type="radio" class="btn-check" name="tidentificacion" id="CE" autocomplete="off" value="C.E" required>
                                        <label class="btn btn-outline-secondary" for="CE">C.E</label>

                                        <input type="radio" class="btn-check" name="tidentificacion" id="TI" autocomplete="off" value="T.I" required>
                                        <label class="btn btn-outline-secondary" for="TI">T.I</label>
                                        <div class="invalid-feedback">
                                            Seleccionar una opción.
                                        </div>
                                </div>
                                </div>
                                <!-- Lugar de expedición : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="expedicion" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">9. </span>Lugar de expedición :</label>
                                </div>
                                <div class="m-0 col">
                                    <div class="select-container">
                                        <select class="form-control border border-dark" id="lexpedicion" name="lexpedicion" required>
                                            @foreach($municipios as $municipio)
                                                <option value="{{ $municipio->municipio . '-' . $municipio->departamento }}">{{ $municipio->municipio . '-' . $municipio->departamento }}</option>
                                            @endforeach
                                        </select>
                                        <div class="select-arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                                <path d="m6 9 6 6 6-6"/>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                </div>
                                <!-- Direccion de residencia : -->
                                <div class="row m-0 g-3 mb-2 align-items-center my-5">
                                    <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                        <label for="nombre" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">11. </span> Dirección de residencia:</label>
                                    </div>
                                    <div class="m-0 col">
                                        <input type="text" id="dresidencia" class="form-field form-control  border border-dark" placeholder="Dirección residencia" name="dresidencia" required>
                                    </div>
                                </div>

                            </div>
                            <!-- ========== Lado Derecho ========== -->
                            <div class=" col-12 col-md-12 col-lg-6">
                                <!-- Genero : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-auto">
                                    <label for="" class="col-form-label"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">2. </span>Genero :</label>
                                </div>
                                <div class="m-0 col-auto form-check">
                                        <input type="radio" class="btn-check" name="genero" id="hombre" autocomplete="off" value="M" required>
                                        <label class="btn btn-outline-primary" for="hombre">M</label>

                                        <input type="radio" class="btn-check" name="genero" id="mujer" autocomplete="off" value="F" required>
                                        <label class="btn btn-outline-primary" for="mujer">F</label>
                                        <div class="invalid-feedback">
                                            Seleccionar una opción.
                                        </div>
                                </div>
                                </div>
                                <!-- Apellidos : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="apellidos" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">4. </span>Apellidos :</label>
                                </div>
                                <div class="m-0 col">
                                    <input type="text" id="apellidos" class="form-control  border border-dark" placeholder="Apellidos" name="apellidos" required>
                                </div>
                                </div>
                                <!-- Fecha de nacimiento : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                    <div class="col-sm-12 col-md-12 col-lg-auto">
                                        <label for="fecha_nacimiento" class="col-form-label">
                                            <span class="fw-bold tamanio d-none d-sm-none d-md-none d-lg-inline">6. </span>Fecha de nacimiento:&nbsp;&nbsp;
                                        </label>
                                        <div class="d-inline-flex align-items-center">
                                            <select id="dia" name="dia" required class="form-control border border-dark" style="width: 45px">
                                                <script>
                                                    for (let i = 1; i <= 31; i++) {
                                                        document.write('<option value="' + i + '">' + i + '</option>');
                                                    }
                                                </script>
                                            </select>

                                            <select id="mes" name="mes" required class="form-control border border-dark">
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

                                            <select id="anio" name="anio" required class="form-control border border-dark" style="width: 65px">
                                                <script>
                                                    const yearNow = new Date().getFullYear();
                                                    const yearMin = yearNow - 18;
                                                    for (let i = yearMin; i >= 1900; i--) {
                                                        document.write('<option value="' + i + '">' + i + '</option>');
                                                    }
                                                </script>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <!-- No de identificación : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="input2" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">8. </span>No de identificación :</label>
                                </div>
                                <div class="m-0 col">
                                    <input type="number" class="form-control border border-dark" placeholder="No de identificación" name="noidentificacion" id="noidentificacion" required>
                                </div>
                                </div>
                                <!-- Fecha de expedición : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                    <div class="col-sm-12 col-md-12 col-lg-auto">
                                        <label for="" class="col-form-label">
                                            <span class="fw-bold tamanio d-none d-sm-none d-md-none d-lg-inline">10. </span>Fecha de expedición:&nbsp;&nbsp;
                                        </label>
                                        <div class="d-inline-flex align-items-center">
                                            <select id="diadiaexpedicion" name="diadiaexpedicion" required class="form-control border border-dark" style="width: 45px">
                                                <script>
                                                    for (let i = 1; i <= 31; i++) {
                                                        document.write('<option value="' + i + '">' + i + '</option>');
                                                    }
                                                </script>
                                            </select>

                                            <select id="mesdiaexpedicion" name="mesdiaexpedicion" required class="form-control border border-dark">
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

                                            <select id="anioexpedicion" name="anioexpedicion" required class="form-control border border-dark" style="width: 65px">
                                                <script>
                                                    const yearNow2 = new Date().getFullYear();
                                                    const yearMin2 = yearNow2 - 18;
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
                                    <div class="m-0 col-sm-12 col-md-12 col-lg-auto my-2">
                                        <label for="" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">12. </span>Ciudad de residencia :</label>
                                    </div>
                                    <div class="m-0 col">
                                        <div class="select-container">
                                            <select class="form-field form-control border border-dark" id="ciudadresidencia" name="ciudadresidencia" required>
                                                @foreach($municipios as $municipio)
                                                    <option value="{{ $municipio->municipio . '-' . $municipio->departamento }}">{{ $municipio->municipio . '-' . $municipio->departamento }}</option>
                                                @endforeach
                                            </select>
                                            <div class="select-arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                                <path d="m6 9 6 6 6-6"/>
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
                                    <label for="empresa" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">13. </span>Empresa donde trabaja :</label>
                                </div>
                                <div class="m-0 col">
                                    <input type="text" id="empresatrabaja" class="form-control  border border-dark" placeholder="Empresa donde trabaja" name="empresatrabaja" required>
                                </div>
                                </div>
                            </div>
                            <!-- ========== Lado Derecho ========== -->
                            <div class="col-12 col-md-12 col-lg-6">
                                <!-- Dirección Empresa : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="trabajo" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">14. </span>Dirección Empresa :</label>
                                </div>
                                <div class="m-0 col">
                                    <input type="text" id="dtrabajo" class="form-control  border border-dark" placeholder="Dirección Empresa" name="dtrabajo" required>
                                </div>
                                </div>
                                <!-- Cargo : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                    <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                        <label for="cargo" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">16. </span>Cargo :</label>
                                    </div>
                                    <div class="m-0 col">
                                        <input type="text" id="cargo" class="form-control  border border-dark" placeholder="Cargo" name="cargo" required>
                                    </div>
                                </div>
                                <!-- ========== Dirección de correspondencia ========== -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                    <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                        <label for="dir_correspondencias" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">18. </span>D. de
                                            correspondencia :</label>
                                    </div>
                                    <div class="m-0 col">
                                        <input type="text" id="dcorrespondencia" class="form-field form-control  border border-dark"
                                        placeholder="Dirección de correspondencia" name="dcorrespondencia" required>
                                    </div>
                                </div>
                            </div>
                            <!-- ========== Lado Izquierdo ========== -->
                            <div class="col-12 col-md-12 col-lg-6">
                                <!-- Ciudad de la empresa : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="ciudad_empresa" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">15. </span>Ciudad de la empresa:</label>
                                </div>
                                <div class="m-0 col">
                                    <div class="m-0 col">
                                            <div class="select-container">
                                                <select class="form-control border border-dark" id="ciudadempresa" name="ciudadempresa" required>
                                                    @foreach($municipios as $municipio)
                                                        <option value="{{ $municipio->municipio . '-' . $municipio->departamento }}">{{ $municipio->municipio . '-' . $municipio->departamento }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="select-arrow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                                    <path d="m6 9 6 6 6-6"/>
                                                    </svg>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                                </div>
                                <!-- Tiempo en el cargo : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="tiempo_cargo" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">17. </span>Tiempo en el cargo :</label>
                                </div>
                                <div class="m-0 col">
                                    <div style="display: inline-block;">
                                        <input type="text" id="tiempocargo" class="form-control  border border-dark"
                                        placeholder="Tiempo Cargo" name="tiempocargo" required>
                                    </div>
                                </div>
                                </div>

                                <!-- Ciudad de Correspondencia : -->
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                    <div class="m-0 col-sm-12 col-md-12 col-lg-auto my-2">
                                        <label for="" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">19. </span>C. de Correspondencia :</label>
                                    </div>
                                    <div class="m-0 col">
                                        <div class="select-container">
                                            <select class="form-field form-control border border-dark" id="ciudcorrespondencia" name="ciudcorrespondencia" required>
                                                @foreach($municipios as $municipio)
                                                    <option value="{{ $municipio->municipio . '-' . $municipio->departamento }}">{{ $municipio->municipio . '-' . $municipio->departamento }}</option>
                                                @endforeach
                                            </select>
                                            <div class="select-arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                                <path d="m6 9 6 6 6-6"/>
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
                                        <label for="code1" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">20. </span>Celular #1:</label>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex align-items-center">
                                            <div class="select-container" >
                                                <select name="code1" id="code1" class="form-control border border-dark me-2" style="width: 300px">
                                                    @include('layouts.optionscellphone')
                                                </select>
                                                <div class="select-arrow" style="right: 10px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                                    <path d="m6 9 6 6 6-6"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <input type="number" id="celular1" class="form-control border border-dark" placeholder="Número de celular" name="celular1" value="" required>
                                        </div>
                                    </div>
                                </div>

                                <!-- WhatsApp #1 : -->
                                <div class="row m-0 mb-2 align-items-center">
                                    <div class="col-auto">
                                        <label for="code1" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">22. </span>Whatsapp #1:</label>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex align-items-center">
                                            <div class="select-container">
                                                <select name="code1whatsapp" id="code1whatsapp" class="form-control border border-dark me-2" style="width: 300px">
                                                    @include('layouts.optionscellphone')
                                                </select>
                                                <div class="select-arrow" style="right: 10px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                                    <path d="m6 9 6 6 6-6"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <input type="number" id="whatsapp1" class="form-control border border-dark" placeholder="Número de celular" name="whatsapp1" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ========== Lado Izquierdo ========== -->
                            <div class="col-12 col-md-12 col-lg-6">
                                <!-- Celular #2 : -->
                                <div class="row m-0 mb-2 align-items-center">
                                    <div class="col-auto">
                                        <label for="code1" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">21. </span>Celular #2:</label>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex align-items-center">
                                            <div class="select-container">
                                                <select name="code2" id="code2" class="form-control border border-dark me-2" style="width: 300px">
                                                    @include('layouts.optionscellphone')
                                                </select>
                                                <div class="select-arrow" style="right: 10px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                                    <path d="m6 9 6 6 6-6"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <input type="number" id="celular2" class="form-control border border-dark" placeholder="Número de celular" name="celular2" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- WhatsApp #2 : -->
                                <div class="row m-0 mb-2 align-items-center">
                                    <div class="col-auto">
                                        <label for="code1" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">23. </span>Whatsapp #2:</label>
                                    </div>
                                    <div class="col">
                                        <div class="d-flex align-items-center">
                                            <div class="select-container">
                                                <select name="code2whatsapp" id="code1" class="form-control border border-dark me-2" style="width: 300px">
                                                    @include('layouts.optionscellphone')
                                                </select>
                                                <div class="select-arrow" style="right: 10px;">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                                    <path d="m6 9 6 6 6-6"/>
                                                    </svg>
                                                </div>
                                            </div>
                                            <input type="number" id="whatsapp2" class="form-control border border-dark" placeholder="Número de celular" name="whatsapp2" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ========== Correo electronico ========== -->
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                <div class="m-0 col-sm-12 col-md-12 col-lg-auto">
                                    <label for="correo" class="col-form-label d-none d-md-block"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">24. </span>Correo electronico :</label>
                                </div>
                                <div class="row m-0">
                                    <div class="col">
                                        <div class="d-flex align-items-center">
                                            <input type="text" id="correo" class="form-control border border-dark me-2 w-50" placeholder="ejemplo123" name="correo" required>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <!-- ========== Se autoriza a Coopserp para que consulte en las centrales de riesgo ========== -->
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                    <div class="m-0 col-auto">
                                        <label for="" class="col-form-label text-center text-md-start"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">25. </span>Usted autoriza a Coopserp para que
                                            consulte sus datos en las
                                            centrales de
                                            riesgo :</label>
                                    </div>
                                    <div class="m-0 px-3 col-12 col-md-12 col-lg-auto form-check text-center">
                                        <input type="radio" class="btn-check" name="autoriza" id="si-autoriza"
                                            autocomplete="off" value="SI" required>
                                        <label class="btn btn-outline-primary" for="si-autoriza">SI</label>

                                        <input type="radio" class="btn-check" name="autoriza" id="no-autoriza"
                                            autocomplete="off" value="NO" required>
                                        <label class="btn btn-outline-primary" for="no-autoriza">NO</label>
                                        <div class="invalid-feedback">
                                            Seleccionar una opción.
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- ========== Vincular asociado a la agencia ========== -->
                            <div class="col-12 col-md-12 col-lg-12">
                                <div class="row m-0 g-3 mb-2 align-items-center">
                                    <div class="m-0 col-auto">
                                        <label for="" class="col-form-label text-center text-md-start"><span class="fw-bold tamanio  d-none d-sm-none d-md-none d-lg-inline">26. </span>Vincular asociado a la agencia :</label>
                                    </div>
                                    <div class="m-0 col">
                                        <div class="select-container">
                                            <select class="form-control border border-dark fw-bold" id="agencia" name="agencia" required>
                                                <option value="" class="fw-bold" disabled selected>Seleccionar Agencia</option>
                                                @foreach($agencias as $agencia)
                                                <option value="{{ $agencia->NameAgencia }}">{{ $agencia->NameAgencia }}</option>
                                                @endforeach
                                            </select>
                                            <div class="select-arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-chevron-down">
                                                    <path d="m6 9 6 6 6-6"/>
                                                </svg>
                                            </div>
                                            <div class="invalid-feedback">
                                                Seleccionar una opción.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary w-100 fs-5"
                    data-bs-dismiss="modal" aria-label="Close" onclick="hideModal()">Cerrar</button>
                    <button type="submit" class="btn btn-primary w-100 fs-5">Validar (Fase 2)</button>
                </div>
            </form>
            </div>
        </div>
    </div>

    <style>
              .tamanio  d-none d-sm-none d-md-none d-lg-inline{
         font-size: 18px;
      }

      .select-container {
            position: relative;
            display: inline-block;
        }

        .select-container select {
            appearance: none; /* Remove default arrow */
            -webkit-appearance: none; /* Remove default arrow in Safari */
            -moz-appearance: none; /* Remove default arrow in Firefox */
            padding-right: 30px; /* Make space for the custom arrow */
        }

        .select-container .select-arrow {
            position: absolute;
            top: 50%;
            right: 10px;
            pointer-events: none; /* Allow click through to the select element */
            transform: translateY(-50%);
        }


        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

        .font {
            font-family: "Inter", sans-serif;
        }

        body {
            background-color: #f0f0f0;
        }

        .image-container {
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            height: 100px;
            /* Ajusta esta altura según sea necesario */
            width: auto;
        }

        .image-container img {
            height: 190%;
            /* Ajusta la imagen para que llene el contenedor en altura */
            width: auto;
            object-fit: contain;
            /* Mantiene la proporción de la imagen */
        }

        .btn-class-name {
            --primary: 255, 90, 120;
            --secondary: 150, 50, 60;
            width: 60px;
            height: 50px;
            border: none;
            outline: none;
            cursor: pointer;
            user-select: none;
            touch-action: manipulation;
            outline: 10px solid rgb(var(--primary), .5);
            border-radius: 100%;
            position: relative;
            transition: .3s;
        }

        .btn-class-name .back {
            background: rgb(var(--secondary));
            border-radius: 100%;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
        }

        .btn-class-name .front {
            background: linear-gradient(0deg, rgba(var(--primary), .6) 20%, rgba(var(--primary)) 50%);
            box-shadow: 0 .5em 1em -0.2em rgba(var(--secondary), .5);
            border-radius: 100%;
            position: absolute;
            border: 1px solid rgb(var(--secondary));
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 1.2rem;
            font-weight: 600;
            font-family: inherit;
            transform: translateY(-15%);
            transition: .15s;
            color: rgb(var(--secondary));
        }

        .btn-class-name:active .front {
            transform: translateY(0%);
            box-shadow: 0 0;
        }

        .box {
            width: 140px;
            height: auto;
            float: left;
            transition: .5s linear;
            position: relative;
            display: block;
            overflow: hidden;
            padding: 5px;
            text-align: center;
            background: transparent;
            text-transform: uppercase;
            font-weight: 500;
        }

        .box:before {
            position: absolute;
            content: '';
            left: 0;
            bottom: 0;
            height: 4px;
            width: 100%;
            border-bottom: 4px solid transparent;
            border-left: 4px solid transparent;
            box-sizing: border-box;
            transform: translateX(100%);
        }

        .box:after {
            position: absolute;
            content: '';
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            border-top: 4px solid transparent;
            border-right: 4px solid transparent;
            box-sizing: border-box;
            transform: translateX(-100%);
        }

        .box:hover {
            box-shadow: 0 5px 15px #494ca2d2;
        }

        .box:hover:before {
            border-color: black;
            height: 100%;
            transform: translateX(0);
            transition: .3s transform linear, .3s height linear .3s;
        }

        .box:hover:after {
            border-color: #262626;
            height: 100%;
            transform: translateX(0);
            transition: .3s transform linear, .3s height linear .5s;
        }

        button {
            color: black;
            text-decoration: none;
            cursor: pointer;
            outline: none;
            border: none;
            background: transparent;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="js/main2.js"></script>
    <script src="js/datatable.js"></script>
    <script>
        $(document).ready(function() {
            $('#whatsapp2').on('input', function() {
                if ($(this).val().trim() !== "") {
                    $('#asociarmeBtn').prop('disabled', false);
                } else {
                    $('#asociarmeBtn').prop('disabled', true);
                }
            });
        });

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
    </script>
</body>

</html>
