{{-- No direct PHP session_start, no MySQL queries --}}
{{-- Uses Laravel's auth, asset(), route(), url() --}}

<link rel="stylesheet" href="{{ asset('css/header.css') }}">

<header class="dfy-header">
  <div class="dfy-topbar">
    <a class="dfy-brand" href="{{ url('/') }}">
      <img src="{{ asset('photo/logo.png') }}" alt="logo">
    </a>

    <div class="dfy-right">
      <div class="icon-cart">
        <a id="Cart" href="{{ route('cart.index') }}" onclick="checkLogin(event, 'view cart')">
          <img src="{{ asset('photo/shopping cart.png') }}" alt="View Cart" width="50" height="45">
        </a>
        <span>{{ $cartCount ?? 0 }}</span>
      </div>

      @auth
        <a class="dfy-user" href="{{ route('profile') }}" title="Profile">
          <span class="dfy-avatar" aria-hidden="true"></span>
          <span class="dfy-username">{{ Auth::user()->name }}</span>
        </a>
      @else
        <a class="dfy-login" href="{{ route('login') }}">Log In</a>
      @endauth

      <button class="dfy-menu-btn" type="button" aria-expanded="false" aria-controls="dfy-links" 
        onclick="(function(btn){var el=document.getElementById('dfy-links');var open=el.classList.toggle('open');
        btn.setAttribute('aria-expanded', open?'true':'false');})(this)">☰</button>
    </div>
  </div>

  <nav id="dfy-links" class="dfy-botnav">
    <a href="{{ url('/') }}">Home</a>
    <a href="{{ route('products.index') }}">Product</a>
    <a href="{{ route('contact') }}">Contact Us</a>
    @auth
      <a href="{{ route('history.index') }}">History</a>
      <a href="{{ route('logout') }}"
         onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
         Log Out
      </a>
      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
      </form>
    @endauth
  </nav>

  <script>
    function checkLogin(event, action) {
      const isLoggedIn = @json(Auth::check());
      if (!isLoggedIn) {
        event.preventDefault();
        if (confirm('You need to login first to ' + action + '. Go to login page?')) {
          window.location.href = '{{ route('login') }}';
        }
        return false;
      }
      return true;
    }
  </script>
</header>