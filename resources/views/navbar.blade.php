<nav class="navbar navbar-expand-lg mb-3 bg-dark" data-bs-theme="dark">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="{{ route('home') }}">INICIO</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('productos_index') }}">PRODUCTOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('compras_index') }}">COMPRAS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('proveedores_index') }}">PROVEEDORES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('empleados_index') }}">EMPLEADOS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('carrito_index') }}">CARRITO</a>
                </li>
            </ul>
        </div>
    </div>
</nav>


@if (session('success'))
<div class="alert alert-success alert-dismissible fade show position-fixed bottom-0 end-0 w-75" role="alert">
  <strong>Listo!</strong> {{session('success')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif

@if (session('error'))
<div class="alert alert-danger alert-dismissible fade show position-fixed bottom-0 end-0 w-75" role="alert">
  <strong>Error!</strong> {{session('error')}}
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif