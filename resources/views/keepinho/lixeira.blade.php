<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<h1>🤯Keepinho</h1>
    <p>Seja bem-vindo ao Keepinho, o seu assistente pessoal (melhor do que o google).</p>

    <h2>🗑️ Lixeira</h2>
    <hr>
    <a href="{{ route('keep') }}">Voltar ↩️</a>
    <hr>
    @if (session('sucesso'))
    <div style="background-color:lightgreen; padding:1rem; display: flex; justify-content:center; border: solid 3px green; margin:1rem;">
    {{ session('sucesso') }}
    </div>
    @endif
    <br>

    <div class="notes">
        @foreach ($notas as $nota)
        <div class="note-card">
            <h4>{{ $nota->titulo }}</h4>
            <p>{{ $nota->texto }}</p>
            <br>
            <a href="{{ route('keep.restaurar', $nota->id) }}">Restaurar ♻️</a>
        </div>
        @endforeach
    </div>