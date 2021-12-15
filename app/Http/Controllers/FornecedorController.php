<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
//        $fornecedores = ['Mike', 'fony'];
//        return view('app.fornecedor.index', compact('fornecedores'));
        $fornecedores = [
            0 => [
                'nome' => 'Mike',
                'status' => 'S'
            ],
            1 => [
                'nome'=> 'Mok',
                'status' => 'S'
            ],
            2 => [
                'nome'=> 'Muk',
                'status' => 'N'
            ]
        ];

        //echo isset($fornecedores[0]['status']) ? 'Status informado' : 'Status nao informado';

        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
