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
            @csrf @auth<button id="banan" type="submit">Logout</button>
            <a style="float:right" href="update">{{Auth::user()->name}}</a>@endauth
        </form>
</div>
</div>
