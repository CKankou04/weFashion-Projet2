
<nav class="navbar navbar-expand-lg navbar-secondary bg-secondary shadow-sm" style="color:#ffffff">
  <div class="container" margin="0" padding="0">
    <a href="{{ url('/') }}" class="navbar-brand">
      <!-- Logo Image -->
      <img src="{{ asset('images/wefashion.png') }}" alt="logo" width="80" height="60" >
    </a>

    <button type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span class="navbar-toggler-icon"></span></button>

    <div id="navbarSupportedContent" class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active"><a href="{{url('solde')}}" class="nav-link" style="color:whitesmoke">Solde</a></li>
        @forelse($categories as $id => $name)
            <li class="nav-item active">
                <a href="{{url('category', $id)}}" style="color:whitesmoke" class="nav-link"  >{{$name}}</a>
            </li>
        @empty
            <li class="nav-item">Aucun genre pour l'instant</li>
        @endforelse
      </ul>
      <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" style="color:whitesmoke" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a class="nav-link" style="color:whitesmoke" href="{{ url('admin/product') }}" class="dropdown-item">Dashboard
                        </a>
                    </li>
                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color:whitesmoke" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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

        </div>
    </div>
</nav>
