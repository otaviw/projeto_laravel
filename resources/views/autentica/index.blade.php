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
<a href="{{ route('autentica.login') }}">Fazer login</a>
<form action="{{ route('autentica.gravar') }}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Nome" value="{{ old('name') }}">
    <br>
    <input type="email" name="email" placeholder="Email" value="{{ old('email') }}">
    <br>
    <input type="password" name="password" placeholder="Senha">
    <br>
    <input type="password" name="password_confirmation" placeholder="Confirme sua senha">
    <br>
    <input type="submit" value="gravar">
</form>