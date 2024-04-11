@extends('layout')
@section('content')
@foreach ($productos as $producto)
<div class="row w-100">
    <div class="col-2"></div>

    <div class="col-8">
        <div class="card mb-3">
            <div class="card-header">
                Sku: {{$producto->stock->producto->sku}}
            </div>
            <div class="card-body">
                <h5 class="card-title">Artículo: {{$producto->stock->producto->nombre}}</h5>
                <p class="card-text">Precio: ${{$producto->precio}}</p>
                <p class="card-text">Cantidad: {{$producto->cantidad}} ({{$producto->stock->proveedor->nombre}})</p>
            </div>
        </div>
    </div>

    <div class="col-2"></div>
</div>
@endforeach
@endsection