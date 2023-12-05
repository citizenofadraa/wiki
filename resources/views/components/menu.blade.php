<div class="topnav">
    <a href="/">Hlavná stránka</a>
    <a href="index">Stiahnutia</a>
    <a href="adverts">Fórum</a>
@guest
    <a href="login" style="float:right">Login</a>
    <a href="register" style="float:right">Register</a>
@endguest
<div class="logoutForm">
    <form method="POST" action="{{ route('logout') }}">
        @csrf @auth<button id="banan" type="submit">Logout</button>
        <a style="float:right" href="update">{{Auth::user()->name}}</a>@endauth
    </form>
</div>
@auth
    <a href="newarticle" style="float:right">Pridať článok</a>
    <a href="newquicknews" style="float:right">Pridať rýchlu správu</a>
    <a href="newadvert" style="float:right">Pridať inzerát</a>
    @endauth
</div>
