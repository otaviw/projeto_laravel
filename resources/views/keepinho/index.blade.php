<div style="display:flex; flex-direction:column; width:100%; align-items:center;">
    <h1>🤯Keepinho</h1>
    <p>Seja bem-vindo ao Keepinho, o seu assistente pessoal (melhor do que o google).</p>
</div>

<hr style="margin:20px 0px">
    <form action="{{ route('keep.gravar') }}" method="POST" style="display:flex; flex-direction: column; align-items:center;">
    @csrf
        <textarea placeholder="Escreva sua nota" name="texto" id="" cols="30" rows="10"></textarea>
        <br>
        <input type="submit" value="salvar" style="padding: 5px 10px; font-size: 15px">
    </form>
<hr style="margin:20px 0px">

<div style="display:flex;">
    @foreach ($notas as $nota)
        <div style="background-color:#F9F2C8; border-radius:5px; padding: 10px; font-size: larger; margin: 10px; width: 200px; height: 200px; box-shadow: rgba(0, 0, 0, 0.15) 1.95px 1.95px 2.6px;">
            {{ $nota->texto }}
        </div>
    @endforeach
</div>