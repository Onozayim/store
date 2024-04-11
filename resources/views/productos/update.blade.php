@extends('layout')
@section('content')
<form action="{{ route('productos_update') }}" method="post" class="col-lg-6 offset-lg-3">

    @csrf
    <figure class="text-center">
        <blockquote class="blockquote">
            <p>Guarda tu producto</p>
        </blockquote>
    </figure>
    
    <input type="hidden" name="id" value="{{$producto->id}}">

    <div class="row justify-content-center px-5">
        <div class="mb-3">
            <label for="sku" class="form-label">Sku</label>
            <input required maxlength="50" type="text" class="form-control" name="sku" value="{{$producto->sku}}">
        </div>

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input required maxlength="50" type="text" class="form-control" name="nombre" value="{{$producto->nombre}}">
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input required maxlength="50" type="text" class="form-control" name="descripcion" value="{{$producto->descripcion}}">
        </div>

        <div class="mb-3">
            <label for="categoria" class="form-label">Categoria</label>
            <input required maxlengte="50" type="text" class="form-control" name="categoria" value="{{$producto->categoria}}">
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio</label>
            <input required min="0" type="number" step="0.01" class="form-control" name="precio" value="{{$producto->precio}}">
        </div>

        <div class="mb-3">
            <label for="peso" class="form-label">Peso (kg)</label>
            <input required min="0" type="number" step="0.01" class="form-control" name="peso" value="{{$producto->peso}}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
@endsection