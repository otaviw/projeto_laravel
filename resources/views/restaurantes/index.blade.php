<div style="display:flex; flex-direction:column; width:100%; align-items:center;">
    <h1>Listagem de Restaurantes</h1>
    <p>Sistema para listagem dos seus restaurantes preferidos (ou não)</p>
</div>
<div>
<a href="{{ route('restaurantes.adicionar') }}">Adicionar novo restaurante</a>
</div>
<div>
    <h2>Seus Restaurantes Adicionados</h2>
    @foreach ($restaurantes as $restaurante)
        <div style="border:solid 1px black; padding: 10px; margin: 10px;">
            <p>Nome: {{ $restaurante->nome }}</p>
            <p>Tipo: {{ $restaurante->tipo }}</p>
            <p>Endereço: {{ $restaurante->endereco }}</p>
            <p>Telefone: {{ $restaurante->telefone }}</p>
            <p>Preço Médio: {{ $restaurante->preco }}R$</p>
            <br>
            <a href="{{ route('restaurantes.editar', $restaurante->id) }}">Editar</a>
        </div>
    @endforeach
</div>