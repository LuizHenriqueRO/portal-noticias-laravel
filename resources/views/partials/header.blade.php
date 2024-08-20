<div class="row">
    <div class="col-12 bg-dark text-end">
        <a href="{{ url('/') }}" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
            Home
        </a>
        @if (Route::has('login'))
        @auth
        <a href="{{ url('/dashboard') }}" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
            Dashboard
        </a>
        @else
        <a href="{{ route('login') }}" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover me-4">
            Log in
        </a>

        @if (Route::has('register'))
        <a href="{{ route('register') }}" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
            Register
        </a>
        @endif
        @endauth
        @endif
    </div>
</div>
<div class="row" id="header-noticias">
    <div class="col-12 text-center p-4">
        <a href="{{ url('/') }}" style="text-decoration: none;">
            <h1 class="h1 text-light">Página de notícias</h1>
        </a>
    </div>
</div>