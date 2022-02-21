<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SiteContato;
class ContatoController extends Controller
{
    public function contato(Request $request)
    {

//        $contato = new SiteContato();
////        //atriburi os paramentos do formulario ao objeto
////        $contato->nome = $request->input(['nome']);
////        $contato->telefone  = $request->input(['telefone']);
////        $contato->email  = $request->input(['email']);
////        $contato->motivo_contato  = $request->input(['motivo_contato']);
////        $contato->mensagem  = $request->input(['mensagem']);
//        $contato->fill($request->all());
//        dd($contato->getAttributes());
//        $contato->save();
        return view('site.contato');
    }

    public function salvar(Request $request)
    {
        $request->validate([
            'nome' => 'required|min:5|max:90',
            'telefone' => 'required',
            'email' => 'required',
            'motivo_contato' => 'required',
            'mensagem' => 'required'

        ]);
       SiteContato::create($request->all());
    }
}
