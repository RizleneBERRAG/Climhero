<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Back-office') | Climhero</title>
    <link rel="icon" href="{{ asset('favicon.svg') }}" type="image/svg+xml">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Sora:wght@600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ climhero_asset('css/admin.css') }}">
</head>
<body class="admin @yield('body-class')">

@auth
    <header class="admin__bar">
        <div class="admin__bar-inner">
            <a class="admin__brand" href="{{ route('admin.leads') }}">
                <span class="admin__mark"><x-logo /></span>
                Climhero <em>back-office</em>
            </a>

            <div class="admin__bar-actions">
                <a class="admin__link" href="{{ route('home') }}" target="_blank" rel="noopener">Voir le site</a>
                <a class="admin__link" href="{{ route('admin.leads.export') }}">
                    <x-icon name="download" /> Export CSV
                </a>
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit" class="admin__logout">
                        <x-icon name="logout" /> Deconnexion
                    </button>
                </form>
            </div>
        </div>
    </header>
@endauth

<main class="admin__main">
    @yield('content')
</main>

</body>
</html>
