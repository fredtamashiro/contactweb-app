<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 sm:leading-3 lg:leading-tight">
            {{ __('Criar Contato') }}
        </h2>
    </x-slot>

    <div class="sm:py-4 lg:py-12">
        <div class="max-w-7xl mx-auto sm:px-1 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="sm:p-3 lg:p-6 text-gray-900">

                    <x-form.contact action="{{ route('contacts.store') }}" :dados="$dados" :update="false" />

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
