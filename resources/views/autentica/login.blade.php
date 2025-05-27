<h1>Usuários</h1>
<hr>
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
<a href="{{ route('autentica') }}">Voltar</a>
<form action="{{ route('autentica.login') }}" method="post">
    @csrf
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    <br>
    <input type="password" name="password" placeholder="Senha">
    <br>
    <input type="submit" value="Entrar">
</form>