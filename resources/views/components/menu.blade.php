<div class="topnav">
    <a href="{{url ('/')}}">Hlavná stránka</a>
    <a href="{{url ('/index/')}}">Stiahnutia</a>
@auth
    <a href="{{url ('/forum/')}}">Fórum</a>
@endauth
@guest
    <a href="login" style="float:right">Login</a>
    <a href="register" style="float:right">Register</a>
@endguest
    <div class="logoutForm">
        <form method="POST" action="{{ route('logout') }}">
            @csrf @auth<button id="banan" type="submit" class="right">Logout</button> @endauth
        </form>
</div>
</div>
