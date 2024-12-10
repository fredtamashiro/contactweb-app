<form action="{{ $action }}" method="POST">
    @csrf

    @if($update==true)
    @method('PUT')
    @endif

    @if ($errors->any())
    <div class="flex">
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif

    <div class="flex">
        <div class="coluna_6">
            <span class="text-gray-700">
                <i class="fa-solid fa-asterisk text-red-600"></i> Nome
            </span>
            <input name="name" id="name" type="text" value="{{ $dados['name'] }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>

        <div class="coluna_6">
            <span class="text-gray-700">
                <i class="fa-solid fa-asterisk text-red-600"></i> Contact
            </span>
            <input name="contact" id="contact" type="text" value="{{ $dados['contact'] }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
    </div>

    <div class="flex">
        <div class="coluna_12">
            <span class="text-gray-700">
                <i class="fa-solid fa-asterisk text-red-600"></i> E-mail
            </span>
            <input name="email" id="email" type="text" value="{{ $dados['email'] }}" required
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
        </div>
    </div>

    <div class="block mt-3 text-right">
        @if($update=="true")
        {{-- <input type="hidden" name="id" value="{{ $dados['id'] }}"> --}}
        @endif
        <button class="botao_enviar" type="submit">Salvar</button>
    </div>
</form>