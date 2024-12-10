<x-app-layout>
    <h1>Criar Contato</h1>

    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>

        <label for="contact">Contato:</label>
        <input type="text" id="contact" name="contact" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>

        <button type="submit">Salvar</button>
    </form>
</x-app-layout>
