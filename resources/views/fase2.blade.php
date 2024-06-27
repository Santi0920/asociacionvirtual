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
                            </div>
                        </div>
                        <div class="row text-center">
                                <h3 class="fw-semibold"><span>Fecha: </span><span class="text-dark">Junio 26 2024, 12:10:36 p. m.</span></h3>
                                <h3 class="fw-semibold fs-4"><span>Lugar desde donde nos escribe: <span class="fw-bold text-dark">La Unión-Valle del Cauca</span></span></h3>
                        </div>
                    </div>
                </div>
                <div class="row m-0 my-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <h2 class="fw-bold">FORMATO PARA USO<br>
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
                                                class="fw-medium fs-2 text-danger">58</span></span></label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 p-0">
                                <div class="text-start">
                                    <label for="" class="fs-4 text-start
                                     text-lg-end fw-bold">2. <span
                                            class="fw-normal">Agencia: <span
                                                class="fw-medium fs-2 text-danger">30 - Cali BC</span></span></label>
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
                                    <label for="" class="fs-4 text-end fw-bold">3. <span
                                            class="fw-normal">Nombre: <span
                                                class="fw-medium">Santiago Castaño Henao</span></span></label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 p-0">
                                <div class="text-start">
                                    <label for="" class="fs-4 text-end fw-bold">4. <span
                                            class="fw-normal">Cédula: <span
                                                class="fw-medium">1006051717</span></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row m-0 my-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="row m-0">
                            <div class="col-12 col-sm-12 col-md-2 col-lg-4 p-0">
                                <div class="text-start">
                                    <label for="" class="fs-4 text-start fw-bold">5. <span
                                            class="fw-normal">Score: <span class="fw-medium fs-2 text-danger">709</span>-<span class="fs-2">🟢⚪⚪</span></span></label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-lg-4 p-0">
                                <div class="text-start">
                                    <label for="" class="fs-4 text-start fw-bold">6. <span
                                            class="fw-normal">Código de nomina: <span
                                                class="fw-medium">WX</span></span></label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-2 col-lg-4 p-0">
                                <div class="text-start">
                                    <label for="" class="fs-4 text-start fw-bold">7. <span
                                            class="fw-normal">Salario: <span
                                                class="fw-medium">$4.000.000</span></span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row m-0 my-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="text-start">
                            <label for="" class="fs-4 text-end fw-bold">8. <span class="fw-normal">Nombre
                                    Asesor: <span class="fw-medium">Walter Cruz</span></span></label>
                        </div>
                    </div>
                </div>


                <div class="row m-0 my-2">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 ">
                        <div class="text-start">
                            <label for="firma" class="fs-4 fw-bold me-3">9. <span class="fw-normal">Firma
                                    Asesor:</span></label>
                                    <img src="storage/firmas/1006051717.jpeg" alt="asd">

                        </div>
                    </div>
                </div>

                <div class="text-center mt-2 mb-4">
                    <button id="asociarmeBtn" class="btn btn-success fs-5 fw-bold w-100" disabled
                        type="submit">¡Enviar!</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <style>


    </style>
