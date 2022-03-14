<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Home</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
  <!-- Notifications Dropdown Menu -->
  <div id="app">
    <example :id= "{{auth()->user()->id}}" :unreads= "{{auth()->user()->unreadNotifications}}"></example>
  </div>
  <li class="nav-item mt-1">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
      <i class="fas fa-expand-arrows-alt"></i>
    </a>
  </li>
  <li class="nav-item mt-1">
    <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
      <i class="fas fa-th-large"></i>
    </a>
  </li>
        @if(\Illuminate\Support\Facades\Auth::user())
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light border-0">
                    <a class="nav-link">
                        <i class="fad fa-arrow-circle-right"></i>
                        <p class="d-inline">Logout</p>
                    </a>
                </button>
            </form>
        @endif

</ul>
</nav>
<script src= " {{asset('js/app.js')}} "></script>
