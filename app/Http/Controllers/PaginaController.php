<?php

namespace App\Http\Controllers;

use App\Models\Pagina;
use Illuminate\Http\Request;

class PaginaController extends Controller
{
    // Lista todas as páginas
    public function index()
    {
        $paginas = Pagina::all();
        return view('paginas.index', compact('paginas'));
    }

    // Mostra o formulário de criação
    public function create()
    {
        return view('paginas.create');
    }

    // Salva uma nova página
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'conteudo' => 'required',
        ]);

        Pagina::create($request->all());
        return redirect()->route('paginas.index')->with('success', 'Página criada com sucesso!');
    }

    // Mostra uma página específica
    public function show($id)
    {
        $pagina = Pagina::findOrFail($id);
        return view('paginas.show', compact('pagina'));
    }

    // Mostra o formulário de edição
    public function edit($id)
    {
        $pagina = Pagina::findOrFail($id);
        return view('paginas.edit', compact('pagina'));
    }

    // Atualiza uma página existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required',
            'conteudo' => 'required',
        ]);

        $pagina = Pagina::findOrFail($id);
        $pagina->update($request->all());
        return redirect()->route('paginas.index')->with('success', 'Página atualizada com sucesso!');
    }

    // Deleta uma página
    public function destroy($id)
    {
        $pagina = Pagina::findOrFail($id);
        $pagina->delete();
        return redirect()->route('paginas.index')->with('success', 'Página deletada com sucesso!');
    }
}
