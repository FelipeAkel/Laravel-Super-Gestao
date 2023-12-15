<?php
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\VendaController;
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
});

Route::prefix('clientes')->group(function(){
    Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/cliente/{cliente}', [ClienteController::class, 'show'])->where('cliente', '[0-9]+')->name('cliente.show');
    Route::get('/create', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/cliente/{cliente}/edit', [ClienteController::class, 'edit'])->where('cliente', '[0-9]+')->name('cliente.edit');
    Route::put('/cliente/{cliente}', [ClienteController::class, 'update'])->where('cliente', '[0-9]+')->name('cliente.update');
    Route::delete('cliente/{cliente}', [ClienteController::class, 'destroy'])->name('cliente.delete');
});

Route::prefix('vendas')->group(function (){
    Route::get('/', [VendaController::class, 'index'])->name('venda.index');
    Route::get('/create', [VendaController::class, 'create'])->name('venda.create');
    Route::post('/create', [VendaController::class, 'store'])->name('venda.store');
    Route::get('/comprovante-venda-email/{id}', [VendaController::class, 'enviarComprovanteVendaEmail'])->name('email.comprovante-venda');
});



// Verb          Path                        Action  Route Name
// GET           /users                      index   users.index
// GET           /users/create               create  users.create
// POST          /users                      store   users.store
// GET           /users/{user}               show    users.show
// GET           /users/{user}/edit          edit    users.edit
// PUT|PATCH     /users/{user}               update  users.update
// DELETE        /users/{user}               destroy users.destroy