<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;
use App\Models\SiteContato;

class ContatoController extends Controller
{
    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();

        return view('site.contato', ['titulo' => 'Contato (teste)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar (Request $request){

        $regras = [
            'name' => 'required|min:3|max:40',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required|max:2000'
        ];

        $feedback = [
            'name.min' => 'O campo nome precisa ter no mínimo 3 caracteres',
            'name.max' => 'O campo nome deve ter no máximo 40 caracteres',
            'email.email' => 'O email informado não é válido',
            'mensagem.max' => 'A mensagem deve ter no máximo 2000 caracteres',
            'required' => 'O campo :attribute deve ser preenchido',
        ];

        $request->validate($regras, $feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }
}
