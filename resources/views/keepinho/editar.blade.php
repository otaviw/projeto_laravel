
<div style="display:flex; flex-direction:column; width:100%; align-items:center;">
    <h1>🤯Keepinho</h1>
    <p>Seja bem-vindo ao Keepinho, o seu assistente pessoal (melhor do que o google).</p>
</div>

@if ($errors->any())
    <div class="error-box">
        <h3>ERRO!</h3>
        <ul>
            @foreach ($errors->all() as $err)
            <li>{{ $err }}</li>
            @endforeach
        </ul>
    </div>
    @endif

<form action="{{ route('keep.editarGravar') }}" method="POST">
    @csrf
    @method('PUT')

    <input type="hidden" name="id" value="{{ $nota->id }}">

    <input value="{{ old('titulo', $nota->titulo) }}" type="text" placeholder="Título" name="titulo">
    <textarea placeholder="Escreva sua nota" name="texto" id="" cols="30" rows="10">{{ old('texto', $nota->texto) }}</textarea>
    <br>
    <input type="submit" value="salvar" style="padding: 5px 10px; font-size: 15px">
</form>