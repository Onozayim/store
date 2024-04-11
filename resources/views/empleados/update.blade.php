@extends('layout')
@section('content')
<form action="{{ route('empleados_update') }}" method="post" class="col-lg-6 offset-lg-3">

    @csrf
    <input type="hidden" name="id" value="{{$empleado->id}}">
    <figure class="text-center">
        <blockquote class="blockquote">
            <p>Guarda tu Empleado</p>
        </blockquote>
    </figure>
    
    <div class="row justify-content-center px-5">
        <div class="mb-3">
            <label for="sku" class="form-label">Nombre</label>
            <input required maxlength="100" type="text" class="form-control" name="nombre" value="{{$empleado->nombre}}">
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Número telefonico</label>
            <input required maxlength="15" type="text" class="form-control" name="num_tel" value="{{$empleado->num_tel}}">
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Rol</label>
            <input required maxlength="15" type="text" class="form-control" name="rol" value="{{$empleado->rol}}">
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">CURP</label>
            <input required type="text" maxlength="50" class="form-control" name="CURP" value="{{$empleado->CURP}}">
        </div>

        <div class="mb-3">
            <label for="peso" class="form-label">Salario</label>
            <input required min="0" type="number" step="0.01" class="form-control" name="salario" value="{{$empleado->salario}}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
@endsection