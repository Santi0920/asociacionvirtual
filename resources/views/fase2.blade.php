@include('layouts/head')

<body class="">
    @if (session('correcto'))
        <div>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: "!EXITOSO!",
                    html: "{!! session('correcto') !!}",
                    confirmButtonColor: '#646464'
                });
            </script>
        </div>
    @endif

    <div class="container my-5">
        <div class="row m-0 justify-content-center">
            <div class="col-12 col-md-12 shadow-lg rounded-3 text-center p-3">
                <a href="fase1" style="color: inherit;"><svg xmlns="http://www.w3.org/2000/svg" class="d-flex justify-content-start" width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-left"><path d="m12 19-7-7 7-7"/><path d="M19 12H5"/></svg></a>
                <div class="row m-0 pb-0 justify-content-center align-items-center">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6">
                        <img width="100%" height="200" src="https://www.coopserp.com/permiso/img/logoCoopserp.svg"
                        alt="https://www.coopserp.com/permiso/img/logoCoopserp.svg">
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 text-danger">
                        <div class="row">
                            <div class="col-6 text-center p-3">
                                <h1 class="h1 fw-bold m-0">F2</h1>
                            </div>
                            <div class="col-6 text-center p-3">
                                <h1 class="h1 fw-bold m-0">No {{$id}}</h1>
                                <input type="text" name="id" class="d-none" value="{{$id}}">
                            </div>
                        </div>
                        <div class="row text-center">
                                <h3 class="fw-semibold"><span>Fecha: </span><br><span class="text-dark">{{$fechavinculacion}}</span></h3>
                                <h3 class="fw-semibold fs-4"><span>Lugar desde donde nos escribe: <span class="fw-bold text-dark">{{$ciudadescribe}}</span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="row m-0 my-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <h2 class="fw-bold fs-1">FORMATO PARA USO<br>
                            EXCLUSIVO DE COOPSERP
                        </h2>
                    </div>
                </div>
                <div class="row m-0 my-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row m-0">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 p-0">
                                <div class="text-start">
                                    <label for="" class="fs-4 text-start
                                     text-lg-end fw-bold">1. <span
                                            class="fw-normal">Cuenta: <span
                                                class="fw-medium text-danger" style="font-size:45px">{{$cuenta}}</span></span></label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 p-0">
                                <div class="text-start">
                                    <label for="" class="fs-4 text-start
                                     text-lg-end fw-bold">2. <span
                                            class="fw-normal">Agencia: <span
                                                class="fw-medium text-danger" style="font-size: 45px">{{$noAgencia}} - {{$agencia}}</span></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-0 my-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row m-0">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 p-0">
                                <div class="text-start">
                                    <label for="" class="fs-4 fw-bold">3. <span
                                            class="fw-normal">Nombre: <span
                                                class="fw-medium">{{$nombreAS}}</span></span></label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 p-0">
                                <div class="text-start">
                                    <label for="" class="fs-4 fw-bold">4. <span
                                            class="fw-normal">Cédula: <span
                                                class="fw-medium">{{$cedula}}</span></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row m-0 my-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row m-0">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-0">
                                <div class="text-start">
                                    <label for="" class="fs-4 text-start fw-bold">5. <span
                                            class="fw-normal">Celular: <span class="fw-medium">{!!$celular!!}</span></label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-6 p-0">
                                <div class="text-start">
                                    <label for="" class="fs-4 text-start fw-bold">6. <span
                                            class="fw-normal">Whatsapp: <span
                                                class="fw-medium" title="">{{$whatsapp}}</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 p-0 mt-2">
                                <div class="text-start">
                                    <label for="" class="fs-4 text-start fw-bold">7.</label>
                                    <span class="fw-normal fs-4">Correo:</span>
                                    <span class="fw-medium fs-5" >{{$correo}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-0 my-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row m-0">
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 p-0">
                                <div class="text-start">
                                    <label for="" class="fs-4 text-start fw-bold">8. <span
                                            class="fw-normal">Score: <span class="fw-medium fs-2 text-danger">{!!$score!!}</span>-<span class="fs-2">{!!$estadoDatacredito!!}</span></span></label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 p-0">
                                <div class="text-start">
                                    <label for="" class="fs-4 text-start fw-bold">9. <span
                                            class="fw-normal">Código de nomina: <br><span
                                                class="fw-medium" title="{{$nomNomina}}">{{$codNomina}} - <span class="fw-bold">{{$nomNomina}}</span></span></span></label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-4 col-lg-4 p-0">
                                <div class="text-start">
                                    <label for="" class="fs-4 text-start fw-bold">10. <span
                                            class="fw-normal">Salario: $<span
                                                class="fw-medium">{{$salario}}</span></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row m-0 my-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="text-start">
                            <label for="" class="fs-4 text-end fw-bold">11. <span class="fw-normal">Nombre
                                    Asesor: <span class="fw-medium">{{$asesor}}</span></span></label>
                        </div>
                    </div>
                </div>


                {{-- <div class="row m-0 my-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
                        <div class="text-start">
                            <label for="firma" class="fs-4 fw-bold me-3">12. <span class="fw-normal">Firma
                                    Asesor:</span></label>
                                    <img src="storage/firmas/1006051717.jpeg" alt="Firma Asesor">

                        </div>
                    </div>
                </div> --}}
                <form action="{{ route('validarfase3', $id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary w-100 fs-3 boton-buscar fw-semibold" style="background-color: #6f42c1">Fase #3</button>
                </form>
{{--
                <div class="text-center mt-2 mb-4">
                    <button id="asociarmeBtn" class="btn btn-success fs-5 fw-bold w-100" disabled
                        type="submit">¡Enviar!</button>
                </div> --}}
            </div>
        </div>
    </div>
    </div>

    <style>


    </style>
