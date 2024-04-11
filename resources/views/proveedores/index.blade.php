@extends('layout')
@section('content')
<a href="{{ route('proveedores_create') }}" class="createButton mx-3 btn btn-primary">Crear Proveedor</a>
    @foreach ($proveedores as $proveedor)
    <div class="row w-100">
        <div class="col-2"></div>

        <div class="col-8">
            <div class="card mb-3">
                <div class="card-header">
                    {{$proveedor->nombre}}
                </div>
                <div class="card-body">
                    <p class="card-text">Número telefonico: {{$proveedor->num_tel}}</p>
                    <a href="{{ route('proveedores_delete', ['id'=>$proveedor->id]) }}" class=" mt-1 btn btn-danger">Eliminar</a>
                    <a href="{{ route('proveedores_update_view', ['id'=>$proveedor->id]) }}" class=" mt-1 btn btn-primary">Editar</a>
                </div>
            </div>
        </div>

        <div class="col-2"></div>
    </div>
    @endforeach
{{$proveedores->links()}}
@endsection