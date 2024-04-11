@extends('layout')
@section('content')
<form action="{{ route('proveedores_store') }}" method="post" class="col-lg-6 offset-lg-3">

    @csrf
    <figure class="text-center">
        <blockquote class="blockquote">
            <p>Guarda tu proveedor</p>
        </blockquote>
    </figure>

    <div class="row justify-content-center px-5">
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input required maxlength="50" type="text" class="form-control" name="nombre">
        </div>

        <div class="mb-3">
            <label for="num_tel" class="form-label">num_tel</label>
            <input required maxlength="10" type="text" class="form-control" name="num_tel" id="num_tel">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>

<script>
$(document).ready(function() {
    $('#num_tel').keyup(function(e) {
        if (/\D/g.test(this.value))
            this.value = this.value.replace(/\D/g, '');
    });
});
</script>
@endsection