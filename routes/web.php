<?php

use App\Http\Controllers\CarritoController;
use App\Http\Controllers\CompraController;
use App\Http\Controllers\DescuentosController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\ProductosController;
use App\Http\Controllers\ProveedoresController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('productos_index');
})->name('home');

//PRODUCTOS
Route::view('/crearProducto', 'productos.create')->name('productos_create');
Route::post('/storeProducto', [ProductosController::class, 'store'])->name('productos_store');
Route::get('/productos', [ProductosController::class, 'index'])->name('productos_index');
Route::get('/eliminarProductos', [ProductosController::class, 'delete'])->name('productos_delete');
Route::get('/editarProductos', [ProductosController::class, 'update_view'])->name('productos_update_view');
Route::post('/editarProductosController', [ProductosController::class, 'update'])->name('productos_update');

//COMPRAS

//PROVEEDORES
Route::view('/crearProveedores', 'proveedores.create')->name('proveedores_create');
Route::get('/proveedores', [ProveedoresController::class, 'index'])->name('proveedores_index');
Route::post('/proveedores_store', [ProveedoresController::class, 'store'])->name('proveedores_store');
Route::get('/deleteProveedores', [ProveedoresController::class, 'delete'])->name('proveedores_delete');
Route::get('/updateProveedores', [ProveedoresController::class, 'update_view'])->name('proveedores_update_view');
Route::post('/updateProveedoresController', [ProveedoresController::class, 'update'])->name('proveedores_update');

//EMPLEADO
Route::get('/empleados', [EmpleadosController::class, 'index'])->name('empleados_index');
Route::view('/createEmpleados', 'empleados.create')->name('empleados_create');
Route::post('/storeEmpleados', [EmpleadosController::class, 'store'])->name('empleados_store');
Route::get('/deleteEmpleados', [EmpleadosController::class, 'delete'])->name('empleados_delete');
Route::get('/updateEmpleados', [EmpleadosController::class, 'update_view'])->name('empleados_update_view');
Route::post('/updateEmpleadosController', [EmpleadosController::class, 'update'])->name('empleados_update');

//STOCK
Route::get('/createStock', [StockController::class, 'create'])->name('stock_create');
Route::get('/stocks', [StockController::class, 'index'])->name('stock_index');
Route::post('/storeStock', [StockController::class, 'store'])->name('stock_store');
Route::get('/deleteStock', [StockController::class, 'delete'])->name('stock_delete');
Route::get('/editarStock', [StockController::class, 'update_view'])->name('stock_update_view');
Route::post('/editarStockController', [StockController::class, 'update'])->name('stock_update');

//CARRITO
Route::get('addCarrito', [CarritoController::class, 'add'])->name('carrito_add');
Route::get('carrito', [CarritoController::class, 'index'])->name('carrito_index');
Route::post('update_cantidad', [CarritoController::class, 'update_cantidad'])->name('update_cantidad');
Route::get('deleteCarrito', [CarritoController::class, 'delete'])->name('carrito_delete');

//COMPRA
Route::post('storeCompras', [CompraController::class, 'store'])->name('compra_store');
Route::get('/compras', [CompraController::class, 'index'])->name('compras_index');
Route::get('/detalleCompras', [CompraController::class, 'detail'])->name('compras_detalle');

//DESCUENTO
Route::get('/descuento', [DescuentosController::class, 'index'])->name('descuento_index');
Route::post('/descuentoSave', [DescuentosController::class, 'save'])->name('descuento_save');