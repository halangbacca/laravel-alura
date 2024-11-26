<x-layout title="Nova Série">
    <form action="/series/salvar" method="post">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome da Série:</label>
            <input type="text" class="form-control" name="nome" id="nome">
        </div>
        <button class="btn btn-primary">Adicionar</button>
    </form>
</x-layout>