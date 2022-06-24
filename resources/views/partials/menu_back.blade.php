<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <div class="row justify-content-between align-items-center w-100 m-0">
            <span class="navbar-brand">We Fashion</span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#">Catégories</a>
                    </li>
                </ul>
            </div>

            <a href="#" target="__blank">
                <i class="fas fa-globe fa-lg"></i>
            </a>
        </div>
    </div>
</nav>
<nav class="navbar navbar-expand-lg py-3 navbar-dark bg-dark shadow-sm">
  <div class="container">
    <a href="{{ url('/') }}" class="navbar-brand">
      <!-- Logo Image -->
      <img src="images/wefashion.png" alt="logo" width="50" height="50">
    </a>

    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

    <div id="navbarSupportedContent" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
      <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#">Produits</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-uppercase" href="#">Catégories</a>
                    </li>
      </ul>
      <ul class="navbar-nav ms-auto">
    <!-- Authentication Links -->
    @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
      </ul>
    </div>
  </div>
</nav>
