<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div class="container">
    <h1>🤯Keepinho</h1>
    <p>Seja bem-vindo ao Keepinho, o seu assistente pessoal (melhor do que o google).</p>

    <hr style="margin:20px 0px">

    <a href="{{ route('keep.lixeira') }}">🗑️ Lixeira</a>
    <br>

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

    <form action="{{ route('keep.gravar') }}" method="POST">
        @csrf
        <input value="{{ old('titulo') }}" type="text" placeholder="Título" name="titulo">
        <textarea placeholder="Escreva sua nota" name="texto" cols="30" rows="5">{{ old('texto') }}</textarea>
        <input type="submit" value="Salvar">
    </form>

    <hr style="margin:20px 0px">

    <div class="notes">
        @foreach ($notas as $nota)
        <div class="note-card">
            <h4>{{ $nota->titulo }}</h4>
            <p>{{ $nota->texto }}</p>
            <a href="{{ route('keep.editar', $nota->id) }}">Editar</a>
            <form class="form-delete" action="{{ route('keep.apagar', $nota->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" value="Apagar">
            </form>
        </div>
        @endforeach
    </div>
</div>
