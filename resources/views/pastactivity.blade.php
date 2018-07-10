<div class="flex-center position-ref full-height">
    @if (Route::has('login'))
    <div class="top-right links">
      @auth
          <a href="{{ url('/home') }}">Home</a>
          <a href="{{ url('/activitys')}}">Voir les activités</a>
          <a href="{{ url('/pastactivity')}}">Voir les activités passée</a>
          <a href="{{ url('/idee') }}">Voir les idées</a>
          <a href="{{ url('/activitys/create')}}"> Créer une idée</a>
          <a href="{{ route('logout') }}"> Déconnexion</a>
      @else
          <a href="{{ route('login') }}">Login</a>
          <a href="{{ route('register') }}">Register</a>
      @endauth
    </div>
    @endif
  </div>
