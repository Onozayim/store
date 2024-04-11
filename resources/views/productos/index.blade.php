@extends('layout')
@section('content')
    <a href="{{ route('productos_create') }}" class="createButton mx-3 btn btn-primary">Crear Producto</a>
    @foreach ($productos as $producto)
    <div class="row w-100">
        <div class="col-2"></div>

        <div class="col-8">
            <div class="card mb-3">
                <div class="card-header">
                    {{$producto->sku}}
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$producto->descripcion}}</h5>
                    <p class="card-text">${{$producto->precio}} | {{$producto->categoria}}</p>
                    @if ($producto->descuento)
                        <p class="card-text text-success">Precio con descuento: ${{$producto->precio - ($producto->precio * ($producto->descuento->porcentaje / 100))}}</p>
                    @endif
                    <a href="{{ route('stock_index', ['id'=> $producto->id]) }}" class=" mt-1 btn btn-primary">Stock</a>
                    <a href="{{ route('productos_delete', ['id'=> $producto->id]) }}" class=" mt-1 btn btn-danger">Eliminar</a>
                    <a href="{{ route('productos_update_view', ['id'=> $producto->id]) }}" class=" mt-1 btn btn-primary">Editar</a>
                    <a href="{{ route('descuento_index', ['id_producto'=> $producto->id]) }}" class=" mt-1 btn btn-primary">Descuento</a>
                </div>
            </div>
        </div>

        <div class="col-2"></div>
    </div>
    @endforeach
{{$productos->links()}}
@endsection