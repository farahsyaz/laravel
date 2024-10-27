<nav class="navbar navbar-expand-md navbar-light fixed-top">
  <div class="container">
      <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
          <img src="{{ asset('images/logo.png') }}" alt="{{ config('app.name') }} Logo" height="40"
              class="me-2">
          <span>{{ config('app.name', 'Laravel') }}</span>
      </a>

      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav me-auto">
              @auth
                  <x-nav-link route="listings.manage" icon="fa fa-list-alt">
                      Manage Listings
                  </x-nav-link>

                  @if (Auth::user()->is_admin)
                      <x-nav-link route="admin.users" icon="fas fa-users">
                          Manage Users
                      </x-nav-link>
                      <x-nav-link route="admin.dashboard" icon="fas fa-tachometer-alt">
                          </i>Dashboard
                      </x-nav-link>
                  @endif
              @endauth
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ms-auto">
              @guest
                  @if (Route::has('login'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('login') }}">
                              <i class="fas fa-sign-in-alt"></i>{{ __('Login') }}
                          </a>
                      </li>
                  @endif

                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">
                              <i class="fas fa-user-plus"></i>{{ __('Register') }}
                          </a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle d-flex align-items-center"
                          href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true"
                          aria-expanded="false" v-pre>
                          <i class="fas fa-user-circle me-2"></i>
                          {{ Auth::user()->name }}
                      </a>

                      <div class="dropdown-menu dropdown-menu-end fade-in">
                          <a class="dropdown-item" href="{{ route('user.profile') }}">
                              <i class="fas fa-user me-2"></i>{{ __('Profile') }}
                          </a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                              <i class="fas fa-sign-out-alt me-2"></i>{{ __('Logout') }}
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
