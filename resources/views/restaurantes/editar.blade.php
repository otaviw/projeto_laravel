<div style="display:flex; flex-direction:column; width:100%; align-items:center;">
    <h1>Listagem de Restaurantes</h1>
    <p>Sistema para listagem dos seus restaurantes preferidos (ou não)</p>
</div>

<form action="{{ route('restaurantes.editarSalvar') }}" method="POST" style="display:flex; flex-direction: column; align-items:center; gap:10px">
    @csrf
    @method('PUT')

    <input type="hidden" name="id" value="{{ $restaurante->id }}">

    <input type="text" name="nome" placeholder="Nome do restaurante" value="{{ $restaurante->nome }}">
        <select name="tipo" id="" placeholder="Tipo de culinaria">
            <option value="Árabe">Árabe</option>
            <option value="Italiana">Italiana</option>
            <option value="Chinesa">Chinesa</option>
        </select>
        <input type="text" name="endereco" placeholder="Endereço" value="{{ $restaurante->endereco }}">
        <input type="number" name="telefone" placeholder="Telefone" value="{{ $restaurante->telefone }}">
        <input type="number" name="preco" placeholder="Preço médio" value="{{ $restaurante->preco }}">
        <input type="submit" value="salvar" style="padding: 5px 10px; font-size: 15px">
</form>