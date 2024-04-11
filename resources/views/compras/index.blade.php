@extends('layout')
@section('content')
    @foreach ($compras as $compra)
    <div class="row w-100">
        <div class="col-2"></div>

        <div class="col-8">
            <div class="card mb-3">
                <div class="card-header">
                    Compra: {{$compra->id}}
                </div>
                <div class="card-body">
                    <p class="card-text">Fecha de creación: {{$compra->fecha}}</p>
                    <p class="card-text">Total: ${{$compra->total}}</p>
                    <a href="{{ route('compras_detalle', ['id_compra'=> $compra->id]) }}" class=" mt-1 btn btn-primary">Detalle</a>
                </div>
            </div>
        </div>

        <div class="col-2"></div>
    </div>
    @endforeach
{{$compras->links()}}
@endsection