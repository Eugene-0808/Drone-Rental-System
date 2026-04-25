

<footer class="site-footer">
  <div class="footer-container">
    <div class="footer-grid">
      <div class="f-col">
        <h4>EXPLORE</h4>
        <ul>
          <li><a href="#">Browse Drones</a></li>
          <li><a href="{{ route('purchase.history') }}">Booking History</a></li>
          <li><a href="#" onclick="checkLogin(event, 'view cart')">Cart</a></li>
          @if (Auth::check())
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form-footer').submit();">Log Out</a></li>
            <form id="logout-form-footer" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
          @endif
        </ul>
      </div>
      <div class="f-col">
        <h4>INFORMATION</h4>
        <ul>
          <li><a href="{{ url('/') }}">About Us</a></li>
        </ul>
      </div>
      <div class="f-col">
        <h4>CUSTOMER SERVICE</h4>
        <ul>
          <li><a href="https://wa.me/60123456789?text=Hello!DroneFY?" target="_blank">WhatsApp Chat</a></li>
          <li><a href="https://www.google.com/maps?q=UTAR+Sungai+Long" target="_blank">Store Locations</a></li>
          <li><a href="{{ route('contact.form') }}">Contact Us</a></li>
        </ul>
      </div>
      <div class="f-col">
        <h4>STAY CONNECTED</h4>
        <div class="social-row">
          <a href="https://facebook.com" target="_blank"><img src="{{ asset('photo/facebook.png') }}" alt="Facebook" class="social-icon"></a>
          <a href="https://instagram.com" target="_blank"><img src="{{ asset('photo/instagram.png') }}" alt="Instagram" class="social-icon"></a>
          <a href="https://x.com" target="_blank"><img src="{{ asset('photo/x.png') }}" alt="X" class="social-icon"></a>
        </div>
      </div>
    </div>
  </div>

  <div class="footer-bottom">
    <div class="payrow">
      <img src="{{ asset('photo/payrow.png') }}" alt="payrow" class="pay-icon">
    </div>
    <p>© {{ date('Y') }} Drone FY. All rights reserved.</p>
    <button class="backtop" onclick="window.scrollTo({top:0,behavior:'smooth'})">
      <img src="{{ asset('photo/up-arrow.svg') }}" alt="Back to top" class="backtop-icon">
    </button>
  </div>
</footer>

<script src="{{ asset('js/footer.js') }}"></script>
<script>
    // Ensure checkLogin is defined (included in header already, but we can redefine here if needed)
    // This function is already in header.blade.php, so it's globally available.
</script>