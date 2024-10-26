<li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle d-flex align-items-center" href="#"
      id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
      <div class="avatar-circle me-2">
          <i class="fas fa-user"></i>
      </div>
      <span>{{ $user->name }}</span>
  </a>
  <ul class="dropdown-menu dropdown-menu-end">
      <li>
          <a class="dropdown-item" href="{{ route('profile') }}">
              <i class="fas fa-user-circle me-2"></i>Profile
          </a>
      </li>
      <li>
          <hr class="dropdown-divider">
      </li>
      <li>
          <form action="{{ route('logout') }}" method="POST">
              @csrf
              <button type="submit" class="dropdown-item">
                  <i class="fas fa-sign-out-alt me-2"></i>Logout
              </button>
          </form>
      </li>
  </ul>
</li>