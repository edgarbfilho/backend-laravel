@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Detalhes do Cadastro</h2>
        <table class="table table-bordered mt-3">
            <tr>
                <th>ID:</th>
                <td>{{ $cadastro->id }}</td>
            </tr>
            <tr>
                <th>Nome:</th>
                <td>{{ $cadastro->nome }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $cadastro->email }}</td>
            </tr>
            <tr>
                <th>Telefone:</th>
                <td>{{ $cadastro->telefone }}</td>
            </tr>
        </table>
    </div>
@endsection

