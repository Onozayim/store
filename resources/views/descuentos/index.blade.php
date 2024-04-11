@extends('layout')
@section('content')
<form action="{{ route('descuento_save') }}" method="post" class="col-lg-6 offset-lg-3">

    @csrf
    <input type="hidden" name="id_producto" value="{{$producto->id}}">
    <figure class="text-center">
        <blockquote class="blockquote">
            <p>Guarda el Descuento</p>
        </blockquote>
    </figure>
    
    <div class="row justify-content-center px-5">
        <div class="mb-3">
            <label for="sku" class="form-label">Sku</label>
            <input disabled maxlength="100" type="text" class="form-control" value="{{$producto->sku}}">
        </div>

        <div class="mb-3">
            <label for="descuento" class="form-label">Descuento</label>
            <input required min="0" type="number" step="0.01" max="100" class="form-control" name="porcentaje" value="{{$descuento->porcentaje ?? 0}}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
@endsection