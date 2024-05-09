<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atte</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-items">
                <h2 class="header__logo">
                    Atte
                </h2>
                <nav class="header-nav">
                    <ul class="header-nav__inner">
                        @if (Auth::check())
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/">ホーム</a>
                        </li>
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/attendance">日付一覧</a>
                        </li>
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/users-list">ユーザー一覧</a>
                        </li>
                        <li class="header-nav__item">
                            <form class="logout-form" action="/logout" method="post">
                                @csrf
                                <button class="logout-form__button">ログアウト</button>
                            </form>
                        </li>
                        @endif
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main class="main">
        @yield('content')
    </main>
    <footer class="footer">
        <div class="footer__inner">
            <div class="footer__logo">
                <small class="copyright">Atte,inc.</small>
            </div>
        </div>
    </footer>
</body>
</html>