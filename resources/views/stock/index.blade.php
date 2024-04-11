@extends('layout')
@section('content')
<a href="{{ route('stock_create', ['id'=> $id]) }}" class="createButton mx-3 btn btn-primary">Crear Stock</a>
    @foreach ($stocks as $stock)
    <div class="row w-100">
        <div class="col-2"></div>

        <div class="col-8">
            <div class="card mb-3">
                <div class="card-header">
                    {{$stock->producto->nombre}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">Proveedor: {{$stock->proveedor->nombre}}</h5>
                    <p class="card-text">Stock: {{$stock->stock}}</p>
                    <a href="{{ route('stock_delete', ['id'=>$stock->id]) }}" class=" mt-1 btn btn-danger">Eliminar</a>
                    <a href="{{ route('stock_update_view', ['id'=>$stock->id]) }}" class=" mt-1 btn btn-info text-white">Editar</a>
                    <a href="{{ route('carrito_add', ['id_stock'=>$stock->id]) }}" class=" mt-1 btn btn-info text-white">Agregar a Carrito</a>
                </div>
            </div>
        </div>

        <div class="col-2"></div>
    </div>
    @endforeach
{{$stocks->links()}}
@endsection