@extends('admin.layout')
@section('title', 'Connexion')
@section('body-class', 'admin--login')

@section('content')
    <div class="login">
        <div class="login__card">
            <span class="admin__mark admin__mark--lg"><x-icon name="thermometer" /></span>
            <h1>Back-office Climhero</h1>
            <p class="login__sub">Boite de reception des demandes de devis.</p>

            @if ($errors->any())
                <div class="admin__alert admin__alert--error">{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('admin.login.attempt') }}">
                @csrf
                <label class="admin__field">
                    <span>Email</span>
                    <input type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                </label>

                <label class="admin__field">
                    <span>Mot de passe</span>
                    <input type="password" name="password" required autocomplete="current-password">
                </label>

                <label class="admin__check">
                    <input type="checkbox" name="remember" value="1">
                    Rester connecte
                </label>

                <button type="submit" class="admin__btn admin__btn--primary admin__btn--block">Se connecter</button>
            </form>
        </div>
    </div>
@endsection
