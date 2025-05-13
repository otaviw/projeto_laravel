<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<div style="display:flex; flex-direction:column; width:100%; align-items:center;">
    <h1>🤯Keepinho</h1>
    <p>Seja bem-vindo ao Keepinho, o seu assistente pessoal (melhor do que o google).</p>
</div>

<hr style="margin:20px 0px">
@if ($errors->any())
<div style="color: red; display:flex; flex-direction: column; align-items:center;">
    <h3>ERRO!</h3>
</div>
@endif
    <form action="{{ route('keep.gravar') }}" method="POST" style="display:flex; flex-direction: column; align-items:center;">
    @csrf
        <input type="text" placeholder="título" name="titulo">
        <br>
        <textarea placeholder="Escreva sua nota" name="texto" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="salvar" style="padding: 5px 10px; font-size: 15px">
    </form>
<hr style="margin:20px 0px">

<div style="display:flex;">
    @foreach ($notas as $nota)
        <div style="background-color:#F9F2C8; border-radius:5px; padding: 10px; font-size: larger; margin: 10px; width: 200px; height: 200px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
            <h4>{{ $nota->titulo }}</h4>
            {{ $nota->texto }}
            <br>
            <a href="{{ route('keep.editar', $nota->id) }}">Editar</a>
            <br>
            <form action="{{ route('keep.apagar', $nota->id) }}" method="POST">
                @method('DELETE')
                @csrf
                <input type="submit" value="Apagar">
            </form>
        </div>
    @endforeach
</div>