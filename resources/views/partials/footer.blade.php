<link rel="stylesheet" href="{{ asset('css/footer.css') }}">

<footer class="site-footer">
  <div class="footer-container">
    <div class="footer-grid">

      <!-- Explore -->
      <div class="f-col">
        <h4>EXPLORE</h4>
        <ul>
          <li><a href="{{ route('products.index') }}">Browse Drones</a></li>
          <li><a href="{{ route('history.index') }}" onclick="checkLogin(event, 'view history')">Booking History</a></li>
          <li><a href="{{ route('cart.index') }}" onclick="checkLogin(event, 'view cart')">Cart</a></li>
          @auth
            <li><a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form-footer').submit();">
                   Log Out
                </a>
                <form id="logout-form-footer" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
                </form>
            </li>
          @endauth
        </ul>
      </div>

      <!-- Information -->
      <div class="f-col">
        <h4>INFORMATION</h4>
        <ul>
          <li><a href="{{ url('/about') }}">About Us</a></li>
        </ul>
      </div>

      <!-- Customer Service -->
      <div class="f-col">
        <h4>CUSTOMER SERVICE</h4>
        <ul>
          <li><a href="https://wa.me/60123456789?text=Hello!DroneFY?" target="_blank">WhatsApp Chat</a></li>
          <li><a href="https://www.google.com/maps?q=UTAR+Sungai+Long" target="_blank">Store Locations</a></li>
          <li><a href="{{ route('contact') }}">Contact Us</a></li>
        </ul>
      </div>

      <!-- Stay Connected -->
      <div class="f-col">
        <h4>STAY CONNECTED</h4>
        <div class="social-row">
          <a href="https://facebook.com" target="_blank">
            <img src="{{ asset('photo/facebook.png') }}" alt="Facebook" class="social-icon">
          </a>
          <a href="https://instagram.com" target="_blank">
            <img src="{{ asset('photo/instagram.png') }}" alt="Instagram" class="social-icon">
          </a>
          <a href="https://x.com" target="_blank">
            <img src="{{ asset('photo/x.png') }}" alt="X" class="social-icon">
          </a>
        </div>
      </div>

    </div>
  </div>

  <div class="footer-bottom">
    <div class="payrow">
      <img src="{{ asset('photo/payrow.png') }}" alt="payrow" class="pay-icon">
    </div>
    <p>© {{ date('Y') }} Drone FY. All rights reserved.</p>
    <button class="backtop">
      <img src="{{ asset('photo/up-arrow.svg') }}" alt="Back to top" class="backtop-icon">
    </button>
  </div>
</footer>

<script src="{{ asset('js/footer.js') }}"></script>
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