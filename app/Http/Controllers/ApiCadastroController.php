<?php

namespace App\Http\Controllers;

use App\Models\Cadastro;
use Illuminate\Http\Request;

class ApiCadastroController extends Controller
{
    public function index()
    {
        return Cadastro::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:cadastros',
            'telefone' => 'required|string|max:20',
        ]);

        $cadastro = Cadastro::create($request->all());

        return response()->json($cadastro, 201);
    }

    public function show(Cadastro $cadastro)
    {
        return $cadastro;
    }

    public function update(Request $request, Cadastro $cadastro)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:cadastros,email,' . $cadastro->id,
            'telefone' => 'required|string|max:20',
        ]);

        $cadastro->update($request->all());

        return response()->json($cadastro, 200);
    }

    public function destroy(Cadastro $cadastro)
    {
        $cadastro->delete();

        return response()->json(null, 204);
    }
}
