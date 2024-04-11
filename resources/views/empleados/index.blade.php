@extends('layout')
@section('content')
<a href="{{ route('empleados_create') }}" class="createButton mx-3 btn btn-primary">Crear Empleado</a>
    @foreach ($empleados as $empleado)
    <div class="row w-100">
        <div class="col-2"></div>

        <div class="col-8">
            <div class="card mb-3">
                <div class="card-header">
                    {{$empleado->nombre}}
                </div>
                <div class="card-body"> 
                    <p class="card-text">Número telefonico: {{$empleado->num_tel}}</p>
                    <p class="card-text">CURP: {{$empleado->CURP}}</p>
                    <p class="card-text">Rol: {{$empleado->rol}}</p>
                    <p class="card-text">Salario: ${{$empleado->salario}}</p>
                    <a href="{{ route('empleados_delete', ['id'=>$empleado->id]) }}" class=" mt-1 btn btn-danger">Eliminar</a>
                    <a href="{{ route('empleados_update_view', ['id'=>$empleado->id]) }}" class=" mt-1 btn btn-primary">Editar</a>
                </div>
            </div>
        </div>

        <div class="col-2"></div>
    </div>
    @endforeach
{{$empleados->links()}}
@endsection