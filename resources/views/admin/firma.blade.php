@include('layouts/head2')

<body>
    @if (!session()->has('email'))
        @php
            header('Location: login');
            exit();
        @endphp
    @else
    @endif


    @if (session('incorrecto'))
        <div>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: "{{ session('incorrecto') }}",
                    text: '',
                    confirmButtonColor: '#6f42c1',
                });
            </script>
        </div>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: '{{ session('error') }}'
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Éxito',
                text: '{{ session('success') }}'
            });
        </script>
    @endif

    @include('layouts/side')
    <!-- Page Content -->
    <div id="content" class="p-4 p-md-5 pt-5 mt-0">
        <h2 class="mb-4 fw-bold font mt-0 text-dark">REGISTRO DE FIRMA</h2>
        <button type="button" class="btn btn-primary m-2" data-toggle="modal" id="mediumButton"
            data-target="#mediumModal">Añadir Firma</button>
        <div class="table-responsive w-100 text-start">
            @if ($firmas->isEmpty())
                <div class="message-container text-center">
                    <p class="no-firmas-message">No tienes firmas registradas.</p>
                </div>
            @else
                <div class="table-responsive w-100 text-start">
                    <table class="table table-hover fs-5 text-start" id="">

                        <thead>
                            <tr>
                                <th class="text-start">ID</th>
                                <th class="text-start">NOMBRE</th>
                                <th class="text-start">FIRMA</th>
                                <th></th>
                            </tr>
                        </thead>

                        <tbody class="table-group-divider">
                            @foreach ($firmas as $firma)
                                <tr>
                                    <td>{{ $firma->id }}</td>
                                    <td>{{ $firma->nombre }}</td>
                                    <td><img src="img/firmas/{{$firma->firma}}"
                                            alt="Firma" style="width: 15rem">
                                    </td>
                                    <td>
                                        <form action="{{ route('eliminar.firma', ['id' => $firma->id]) }}"
                                            method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger eliminar">Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
        </div>
        @endif
        <!-- Modal -->
        <div class="modal fade fs-5" id="mediumModal" tabindex="-1" aria-labelledby="mediumModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5 fw-bold text-dark" id="nombrehead">Firmas</h1>
                        <button type="button" class="btn-close fs-5" data-bs-dismiss="modal" aria-label="Close"
                            style="outline: none; border: none; font-size:18px" onclick="hideModalfirma()">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="{{ route('guardar.firma') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Nombre del Firmante</label>
                                <input type="text" class="form-control mb-2" id="nombre" name="nombre"
                                    aria-describedby="emailHelp" value="{{ session('name') }}" required>
                            </div>
                            <div class="container">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="options" id="option1"
                                                value="option1" onclick="showSelectBox()">
                                            <label class="form-check-label ml-2" for="option1">
                                                Firmar digitalmente
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="options" id="option2"
                                                value="option2" onclick="showSelectBox()">
                                            <label class="form-check-label" for="option2">
                                                Subir imagen de tu firma
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="select-box-option1" style="display: none;">
                                <div id="signature-pad" class="signature-pad">
                                    <div class="description">Dibujar aquí</div>
                                    <div class="signature-pad--body">
                                        <canvas style="border: 1px black solid;" id="canvas"></canvas>
                                    </div>
                                    <div class="m-signature-pad--footer">
                                        <button class="btn btn-danger"id="clear">Borrar Firma</button>
                                    </div>
                                </div>
                            </div>

                            <div id="select-box-option2" style="display: none;">
                                <div class="mt-2">
                                    <input class="form-control" type="file" id="firma" name="firma" accept="image/*">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                                    onclick="hideModalfirma()">Cerrar</button>
                                <button type="submit" class="btn btn-primary" id="firmasave">Guardar Firma</button>
                                <input type="hidden" id="firmaImagen" name="firmaImagen" value="">
                            </div>
                        </form>
                    </div>
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
                right: 10px;
                pointer-events: none;
                /* Allow click through to the select element */
                transform: translateY(-50%);
            }


            @import url('https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap');

            .font {
                font-family: "Inter", sans-serif;
            }

            body {
                background-color: #f0f0f0;
            }

            .message-container {
                margin-top: 20px;
                /* Espacio superior */
                text-align: center;
                /* Alineación del texto */
            }

            .no-firmas-message {
                background-color: #f8d7da;
                /* Color de fondo */
                color: #721c24;
                /* Color de texto */
                padding: 20px;
                /* Espaciado interior */
                border: 1px solid #f5c6cb;
                /* Borde */
                border-radius: 5px;
                /* Borde redondeado */
                font-size: 1.5rem;
                /* Tamaño de fuente */
                font-weight: bold;
                /* Negrita */
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                /* Sombra */
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
        <script src="js/signature_pad.min.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
        <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
        <script src="js/main2.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="js/datatable.js"></script>
        <script>
            var signaturePad = new SignaturePad(document.getElementById('canvas'), {
                backgroundColor: 'rgba(255, 255, 255, 0)',
                penColor: 'rgb(0, 0, 0)',
                width: 640,
                height: 420
            });
            var saveButton = document.getElementById('firmasave');
            var cancelButton = document.getElementById('clear');
            var firmaDataInput = document.getElementById('firmaImagen');

            saveButton.addEventListener('click', function(event) {
                var data = signaturePad.toDataURL();
                firmaDataInput.value = data;



            });

            cancelButton.addEventListener('click', function(event) {
                event.preventDefault();
                signaturePad.clear();
            });


            document.addEventListener('DOMContentLoaded', function() {
                var btnDelete = document.querySelectorAll('.eliminar');
                btnDelete.forEach(function(btn) {
                    btn.addEventListener('click', function(event) {
                        event.preventDefault();
                        var url = this.parentNode.getAttribute('action');

                        Swal.fire({
                            title: '¿Estás seguro?',
                            text: "No podrás revertir esto!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Sí, eliminarlo!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Enviar el formulario para eliminar
                                fetch(url, {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json',
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                                    },
                                    body: JSON.stringify({
                                        _method: 'DELETE'
                                    })
                                }).then(response => {
                                    if (response.ok) {
                                        // Mostrar SweetAlert de éxito
                                        Swal.fire(
                                            'Eliminado!',
                                            'La firma ha sido eliminada.',
                                            'success'
                                        );

                                        window.location.reload();
                                    } else {
                                        console.error('Error al eliminar la firma:',
                                            response.statusText);
                                        Swal.fire('Error',
                                            'Hubo un problema al eliminar la firma.',
                                            'error');
                                    }
                                }).catch(error => {
                                    console.error('Error al eliminar la firma:', error);
                                    Swal.fire('Error',
                                        'Hubo un problema al eliminar la firma.',
                                        'error');
                                });
                            }
                        });
                    });
                });
            });
        </script>
</body>

</html>
