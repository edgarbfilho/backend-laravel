<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;

class CadastroController extends Controller
{
    public function index()
    {
        
        $cadastros = Cadastro::all();

        //print_r($cadastros); exit;
        
        
        // return view('cadastros.index');
        return view('cadastros.index', compact('cadastros'));
        
    }

    public function create()
    {
        return view('cadastros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'telefone' => 'required',
        ]);

        Cadastro::create($request->all());

        return redirect()->route('cadastros.index')->with('success', 'Cadastro criado com sucesso.');
    }

    public function show(Cadastro $cadastro)
    {
        return view('cadastros.show', compact('cadastro'));
    }

    public function edit(Cadastro $cadastro)
    {
        return view('cadastros.edit', compact('cadastro'));
    }

    public function update(Request $request, Cadastro $cadastro)
    {
        $request->validate([
            'nome' => 'required',
            'email' => 'required|email',
            'telefone' => 'required',
        ]);

        $cadastro->update($request->all());

        return redirect()->route('cadastros.index')->with('success', 'Cadastro atualizado com sucesso.');
    }

    public function destroy(Cadastro $cadastro)
    {
        $cadastro->delete();

        return redirect()->route('cadastros.index')->with('success', 'Cadastro deletado com sucesso.');
    }
}
