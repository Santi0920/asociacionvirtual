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
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8 shadow-lg rounded-3 text-center">
                        <div class="row m-0 pb-0 justify-content-center align-items-center">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-4 d-none d-md-none d-lg-block">
                                <img width="100%" height="200" src="https://www.coopserp.com/permiso/img/logoCoopserp.svg" alt="https://www.coopserp.com/permiso/img/logoCoopserp.svg">
                            </div>
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-6 text-end">
                                        <h1 class="h1 fw-bold m-0 text-danger">F2</h1>
                                    </div>
                                    <div class="col-6">
                                        <h1 class="h1 fw-bold m-0 text-danger">No ..</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-0">
                                <div class="col-12">
                                    <h2 class="fw-bold">FORMATO PARA USO<br>
                                        EXCLUSIVO DE COOPSERP
                                    </h2>
                                </div>
                            </div>
                            <div class="row m-0">
                                sd
                            </div>
                        </div>
                    </div>
                </div>
            </div>
