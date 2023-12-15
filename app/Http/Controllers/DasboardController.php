<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produtos;
use App\Models\Cliente;
use App\Models\Venda;

class DasboardController extends Controller
{
    public function index(){
        $arrayDasboard['totalProdutos'] = Produtos::all()->count();
        $arrayDasboard['totalClientes'] = Cliente::all()->count();
        $arrayDasboard['totalVendas'] = Venda::all()->count();

        return view('dasboard', compact('arrayDasboard'));
    }
}
