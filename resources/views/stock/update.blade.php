@extends('layout')
@section('content')
<form action="{{ route('stock_update', ['id' => $stock->id]) }}" method="post" class="col-lg-6 offset-lg-3">

    @csrf
    <input type="hidden" value="{{$stock->id}}">
    <figure class="text-center">
        <blockquote class="blockquote">
            <p>Guarda el stock</p>
        </blockquote>
    </figure>

    <div class="row justify-content-center px-5">
        <input type="hidden" name="id_producto" value="{{$stock->producto->id}}">
        <div class="mb-3">
            <label class="form-label">Sku</label>
            <input required maxlength="50" type="text" class="form-control" disabled value="{{$stock->producto->sku}}">
        </div>

        <div class="mb-3">
            <label class="form-label" for="id_proveedor">Proveedor</label>
            <select name="id_proveedor" class="form-control">
                @foreach ($proveedores as $item)
                    <option value="{{$item->id}}" {{$item->id == $stock->proveedor->id ? 'selected' : ''}}>{{$item->nombre}}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock</label>
            <input required min="0" type="number" class="form-control" name="stock" id="stock" value="{{$stock->stock}}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>
@endsection