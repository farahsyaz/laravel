<li class="nav-item">
  <a class="nav-link {{ $class ?? '' }} {{ request()->routeIs($route) ? 'active' : '' }}" 
     href="{{ route($route) }}">
      <i class="{{ $icon }} me-2"></i>{{ $slot }}
  </a>
</li>