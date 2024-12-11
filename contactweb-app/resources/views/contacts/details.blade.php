<x-app-layout>   

    <div id="header" class="shadow">
        <div class="header_row">
            <div class="titulo">
                <h2>Detalhes</h2>
            </div>
        </div>
    </div>

    <table class="w-full border mb-3 tabela">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Contato</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
                <tr>
                    <td>{{ $dados['id'] }}</td>
                    <td>{{ $dados['name'] }}</td>
                    <td>{{ $dados['contact'] }}</td>
                    <td>{{ $dados['email'] }}</td>
                </tr>
        </tbody>
    </table>
    <p><a href="javascript:history.back()">Voltar</a></p>
</x-app-layout>
