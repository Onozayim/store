@extends('layout')
@section('content')
    <form action="{{ route('compra_store') }}" method="post">
        @csrf
        @foreach ($stocks as $stock)
        <div class="row w-100">
            <div class="col-2"></div>
    
            <input type="hidden" name="id[]" value="{{$stock->stock->id}}">
    
            <div class="col-8">
                <div class="card mb-3">
                    <div class="card-header">
                        {{$stock->stock->producto->nombre}} ({{$stock->stock->producto->sku}})
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Proveedor: {{$stock->stock->proveedor->nombre}}</h5>
                        <p class="card-text">${{$stock->stock->producto->precio}} | {{$stock->stock->producto->categoria}}</p>
                        @if ($stock->stock->producto->descuento)
                            <p class="card-text text-success">Precio con descuento: ${{$stock->stock->producto->precio - ($stock->stock->producto->precio * ($stock->stock->producto->descuento->porcentaje / 100))}}</p>
                        @endif
                        Stock: <input id="in_{{$stock->id}}" min="1" max="{{$stock->stock->stock}}" onchange="updateStock({{$stock->id}}, {{$stock->stock->stock}})" type="number" name="cantidad[]" class="card-text" value="{{$stock->cantidad}}"></input> <br> <br>
                        <a href="{{ route('carrito_delete', ['id'=>$stock->id]) }}" class=" mt-1 btn btn-danger">Eliminar</a>
                    </div>
                </div>
            </div>
    
            <div class="col-2"></div>
        </div>
        @endforeach
        <div class="row w-100">

            <div class="col-2"></div>
            <div class="col-4">
                <button type="submit" class="btn btn-primary">Guardar compra</button>
            </div>
            <div class="col-2"></div>
        </div>
    </form>
@endsection

<script>
    const updateStock = (id, oldStock) => {
        const can = $(`#in_${id}`).val();

        $.post('/update_cantidad', {
            'id' : id,
            'cantidad': can
        } , function (data) {});

    }
</script>