<div style="display:flex; flex-direction:column; width:100%; align-items:center;">
    <h1>🤯Keepinho</h1>
    <p>Seja bem-vindo ao Keepinho, o seu assistente pessoal (melhor do que o google).</p>
</div>

<form action="{{ route('keep.editarGravar') }}" method="POST">
    @csrf
    @method('PUT')

    <input type="hidden" name="id" value="{{ $nota->id }}">

    <textarea placeholder="Escreva sua nota" name="texto" id="" cols="30" rows="10">{{ $nota->texto }}</textarea>
    <br>
    <input type="submit" value="salvar" style="padding: 5px 10px; font-size: 15px">
</form>