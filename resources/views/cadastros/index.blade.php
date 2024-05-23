@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Lista de Cadastros</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Nome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Telefone</th>
                                <th scope="col">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cadastros as $cadastro)
                            <tr>
                                <th scope="row">{{ $cadastro->id }}</th>
                                <td>{{ $cadastro->nome }}</td>
                                <td>{{ $cadastro->email }}</td>
                                <td>{{ $cadastro->telefone }}</td>
                                <td>
                                    <a href="{{ route('cadastros.show', $cadastro->id) }}" class="btn btn-primary">Ver</a>
                                    <a href="{{ route('cadastros.edit', $cadastro->id) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('cadastros.destroy', $cadastro->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este cadastro?')">Excluir</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
