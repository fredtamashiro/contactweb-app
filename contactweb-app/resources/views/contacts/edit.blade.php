<x-app-layout>

    <h1>Editar Contato</h1>

    <form action="{{ route('contacts.update', $contact->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value="{{ $contact->name }}" required>

        <label for="contact">Contato:</label>
        <input type="text" id="contact" name="contact" value="{{ $contact->contact }}" required>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ $contact->email }}" required>

        <button type="submit">Salvar</button>
    </form>
</x-app-layout>
