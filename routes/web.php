<?php
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClienteController;
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
    return view('dasboard');
})->name('index.dasboard');

Route::prefix('produtos')->group(function(){
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');
    Route::get('/create', [ProdutosController::class, 'create'])->name('produto.create');
    Route::post('/produto', [ProdutosController::class, 'store'])->name('produto.store');

    Route::get('/produto/{produto}/edit', [ProdutosController::class, 'edit'])->where('produto', '[0-9]+')->name('produto.edit');
    Route::put('/produto/{produto}', [ProdutosController::class, 'update'])->where('produto', '[0-9]+')->name('produto.update');

    Route::delete('/delete/{produto}', [ProdutosController::class, 'destroy'])->where('produto', '[0-9]+')->name('produto.delete');
    // Route::delete('delete', [ProdutosController::class, 'destroy'])->name('produto.delete'); // Delete com JS e Ajax
});

Route::prefix('clientes')->group(function(){
    Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');

    Route::get('/cliente/{cliente}', [ClienteController::class, 'show'])->where('cliente', '[0-9]+')->name('cliente.show');

    Route::get('/create', [ClienteController::class, 'create'])->name('cliente.create');
});
