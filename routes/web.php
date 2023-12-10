<?php
use App\Http\Controllers\ProdutosController;
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

    Route::get('/produto/{produto}/edit', [ProdutosController::class, 'edit'])->name('produto.edit');
    Route::put('produto/{produto}', [ProdutosController::class, 'update'])->name('produto.update');

    Route::delete('delete/{produto}', [ProdutosController::class, 'destroy'])->name('produto.delete');
    // Route::delete('delete', [ProdutosController::class, 'destroy'])->name('produto.delete'); // Delete com JS e Ajax
});


