<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="\">FTBL Squad</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarColor01">
 <!-- Left Side Of Navbar -->
 <ul class="navbar-nav mr-auto"> </ul>
 <!-- Right Side Of Navbar -->
 <ul class="navbar-nav ml-auto">
 <!-- Authentication Links -->
 @guest
 <li class="nav-item">
 <a class="nav-link" href="{{ route('login') }}">{{ __('Zaloguj się') }}</a>
 </li>
 @if (Route::has('register'))
 <li class="nav-item">
 <a class="nav-link" href="{{ route('register') }}">{{ __('Zarejestruj się') }}</a>
 </li>
 @endif
 @else
 <li class="nav-item">
        <a class="nav-link" href="{{ route('events.index') }}">Lista wydarzeń</a>
</li>
<li class="nav-item">
        <a class="nav-link" href="{{ route('events.create') }}">Dodaj wydarzenie</a>
</li>
<li class="nav-item dropdown">
 <a id="navbarDropdown" class="nav-link dropdown-toggle" href=""
 role="button" data-toggle="dropdown" aria-haspopup="true"
 aria-expanded="false" v-pre>
 {{ Auth::user()->name }} <span class="caret"></span>
 </a>
 <div class="dropdown-menu dropdown-menu-right"
 aria-labelledby="navbarDropdown">
 <a class="dropdown-item" href="{{ route('logout') }}"
 onclick="event.preventDefault();
 document.getElementById('logout-form').submit();">
 {{ __('Wyloguj się') }} </a>
 <form id="logout-form" action="{{ route('logout') }}"
 method="POST" style="display: none;">
 @csrf
 </form>
 </div>
 </li>
 @endguest
 </ul>
 </div>
 </div>
</nav>
