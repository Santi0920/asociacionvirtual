@include('layouts/head2')

<body>
    {{-- @if (!session()->has('email'))
        @php
            header("Location: login");
            exit();
        @endphp
    @else
    @endif


    @if (session("incorrecto"))
    <div>
        <script>
            Swal.fire
            ({
                icon: 'error',
                title: "{{session('incorrecto')}}",
                text: '',
                confirmButtonColor: '#6f42c1',
            });
        </script>
    </div>
    @endif

    @if (session("correcto"))
    <div>
        <script>
            Swal.fire
            ({
                icon: 'success',
                title: "{{session('correcto')}}",
                text: '',
                confirmButtonColor: '#6f42c1',
            });
        </script>
    </div>
    @endif --}}

    @include('layouts/side')
        <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 pt-5 mt-0">
            <h2 class="mb-4 fw-bold font mt-0 text-dark">ASOCIACIONES - FASE #3</h2>
            <h2 class="mb-4 fw-bold font mt-0 text-dark">
                @if(session('rol') == 'Gerencia' || session('rol') == 'Coordinacion')
                    {{ '' }}
                @else
                    Director de agencia: {{ strtoupper(session('name')) }} - {{ strtoupper(session('agenciau')) }}
                @endif
            </h2>

            <div class="table-responsive w-100 text-start">
                <table class="table table-hover fs-5 text-start" id="asociaciones">
                    <thead>
                        <tr>
                            <th class="text-start">ID</th>
                            <th class="text-start">FECHA SOLICITUD</th>
                            <th class="text-start">CÉDULA</th>
                            <th class="text-start">NOMBRE COMPLETO</th>
                            <th class="text-start">DONDE NOS ESCRIBE</th>
                            <th class="text-start">ESTADO</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody class="table-group-divider">
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="loader terminal-loader d-none">
    <div class="terminal-header">
        <div class="terminal-title">Status</div>
        <div class="terminal-controls">
        <div class="control close"></div>
        <div class="control minimize"></div>
        <div class="control maximize"></div>
        </div>
    </div>
        <div class="text">Cargando...</div>
    </div>
    <style>
            .custom-buttons {
                display: inline-block;
                margin-right: 10px;
            }

            .custom-btn {
                background-color: #646464;
                font-weight: bold;
                font-size: 20px;
                color: white;
                padding: 5px 10px;
                margin: 2px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
            }

            .custom-btn:hover {
                background-color: #aeaeae;
            }


        .select-arrow svg {
            stroke: black;
        }

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
        /* loading */
        @keyframes blinkCursor {
        50% {
            border-right-color: transparent;
        }
        }

        @keyframes typeAndDelete {
        0%,
        10% {
            width: 0;
        }
        45%,
        55% {
            width: 6.2em;
        } /* adjust width based on content */
        90%,
        100% {
            width: 0;
        }
        }

        .terminal-loader {
        border: 0.1em solid #333;
        background-color: #1a1a1a;
        color: #0f0;
        font-family: "Courier New", Courier, monospace;
        font-size: 1em;
        padding: 1.5em 1em;
        width: 12em;
        margin: 100px auto;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        border-radius: 4px;
        position: relative;
        overflow: hidden;
        box-sizing: border-box;
        }

        .terminal-header {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 1.5em;
        background-color: #333;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
        padding: 0 0.4em;
        box-sizing: border-box;
        }

        .terminal-controls {
        float: right;
        }

        .control {
        display: inline-block;
        width: 0.6em;
        height: 0.6em;
        margin-left: 0.4em;
        border-radius: 50%;
        background-color: #777;
        }

        .control.close {
        background-color: #e33;
        }

        .control.minimize {
        background-color: #ee0;
        }

        .control.maximize {
        background-color: #0b0;
        }

        .terminal-title {
        float: left;
        line-height: 1.5em;
        color: #eee;
        }

        .text {
        display: inline-block;
        white-space: nowrap;
        overflow: hidden;
        border-right: 0.2em solid green; /* Cursor */
        animation: typeAndDelete 4s steps(11) infinite,
            blinkCursor 0.5s step-end infinite alternate;
        margin-top: 1.5em;
        }

    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script src="js/main2.js"></script>
    <script src="js/Datatables/datatablefase3.js"></script>
    <script src="ResourcesAll/dtables/dtable1.min.js"></script>
    <script src="ResourcesAll/dtables/botonesdt.min.js"></script>
    <script src="ResourcesAll/dtables/estilobotondt.min.js"></script>
    <script src="ResourcesAll/dtables/botonimprimir.min.js"></script>
    <script src="ResourcesAll/dtables/imprimir2.min.js"></script>
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


        document.addEventListener('DOMContentLoaded', function () {
            const botonBuscar = document.querySelector('.boton-buscar');
            const loader = document.querySelector('.loader');
            const botonreal = document.querySelector('#fase2');
            const form = document.querySelector('#modalf1');

            botonBuscar.addEventListener('click', function (event) {
                event.preventDefault();

                // Realiza la validación del formulario
                if (!form.checkValidity()) {
                    // Si el formulario no es válido, muestra el SweetAlert y resalta los campos en rojo
                    Swal.fire({
                        title: 'Error',
                        text: 'Faltan campos por completar, se encuentran en color rojo.',
                        icon: 'error',
                        confirmButtonColor: '#646464'
                    });

                    // Agrega las clases de Bootstrap para mostrar los mensajes de error
                    form.classList.add('was-validated');
                } else {
                    // Si el formulario es válido, muestra el loader y envía el formulario
                    loader.style.display = 'block';
                    setTimeout(() => {
                        botonreal.click();
                    }, 500);
                    Swal.fire({
                        title: '',
                        html: '<div class="loader">' + loader.innerHTML + '</div>',
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        timer: 10000,
                        timerProgressBar: true
                    }).then(() => {

                    });
                }
            });
        });

    </script>
</body>

</html>
