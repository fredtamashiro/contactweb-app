<x-app-layout>

    <div id="header" class="shadow">
        <div class="header_row">
            <div class="titulo">
                <h2>Lista de Contatos</h2>
            </div>
        </div>
    </div>


    <div class="sm:py-4 lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-1 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="sm:p-3 lg:p-6 text-gray-900">

                    @isset($mensagemSucesso)
                        <div class="border border-green-700 rounded bg-green-50 text-green-600 p-3 text-2xl mb-4">
                            <i class="fa-solid fa-check fa-lg"></i> {{ $mensagemSucesso }}
                        </div>
                    @endisset

                    @isset($mensagemDelete)
                        <div class="border border-red-700 rounded bg-red-50 text-red-600 p-3 text-2xl mb-4">
                            <i class="fa-solid fa-check fa-lg"></i> {{ $mensagemSucesso }}
                        </div>
                    @endisset

                    <table class="w-full border mb-3 tabela">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NOME</th>
                                <th>CONTATO</th>
                                <th>E-MAIL</th>
                                <th>EDITAR</th>
                                <th>APAGAR</th>
                            </tr>
                        </thead>
                        @foreach ($contacts as $item)
                            <tr>
                                <td>{{ $item['id'] }}</td>
                                <td class="text-left">{{ $item['name'] }}</td>
                                <td class="text-left">{{ $item['contact'] }}</td>
                                <td class="text-left">{{ $item['email'] }}</td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        <a href="{{ route('contacts.edit', $item['id']) }}" class="">
                                            <i class="fa-solid fa-pen-to-square"></i>
                                        </a>
                                    </div>
                                </td>
                                <td>
                                    <div class="flex justify-center items-center">
                                        {{-- <a href="{{ route('contacts.destroy', $item['id']) }}" class="bt_cancelar"  onclick="return confirm('Tem certeza que deseja excluir?');">
                                            <i class="fa-solid fa-trash-can"></i></a> --}}

                                            <form action="{{ route('contacts.destroy', $item['id']) }}" method="POST" onsubmit="return confirm('Tem certeza que deseja excluir?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                            </form>
                                            
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {

        });
    </script>
</x-app-layout>
