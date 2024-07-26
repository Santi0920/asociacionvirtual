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
                <li class="{{ Request::is('fase1') ? 'active' : '' }} fs-5" title="Fase 1">
                    <a href="fase1"><i class="fa-solid fa-file-invoice mr-2"></i> Solicitudes F1</a>
                </li>
                {{-- <li class="{{ Request::is('fase2') ? 'active' : '' }} fs-5">
                    <a href="fase2"><span class="fa fa-briefcase mr-3"></span> Solicitudes F2</a>
                </li> --}}
                <li class="{{ Request::is('firmas') ? 'active' : '' }} fs-5" title="Fase 2">
                    <a href="firmas"><i class="fa-solid fa-scroll mr-2"></i> Agregar de Firma</a>
                </li>

                {{-- <li class="fs-5">
                    <a href="#"><span class="fa fa-sticky-note mr-3"></span> Proximamente</a>
                </li>
                <li class="fs-5">
                    <a href="#"><span class="fa fa-paper-plane mr-3"></span> Proximamente</a>
                </li> --}}
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


