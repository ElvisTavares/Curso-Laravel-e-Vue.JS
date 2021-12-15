<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function index(int $p1, int $p2)
    {
        //echo "Soma: $p1 + $p2: ". ($p1+$p2);
        //array associativo como parameto da view
        //return view('site.teste', ['x'=> $p1, 'y' => $p2]);

        //compact
        //return view ('site.teste', compact('p1', 'p2'));

        //with
        return view('site.teste')->with('p1', $p1)->with('p2', $p1);
    }
}
