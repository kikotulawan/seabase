 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand-md navbar-light navbar-white text-sm ">
    <div class="container">
      <a href="{{ url('./home') }}" class="navbar-brand">
        <img src="{{ asset('img/logo.png')}}" alt="NEPTUNE Logo" class="brand-image"
             style="opacity: .8">
        <span class="brand-text font-weight-bold">NEPTUNE</span>
      </a>
      {{-- <a href="{{ url('./home') }}" class="brand-link">
        <img src="{{ asset('img/logo.png')}}" alt="AdminLTE Logo" class="brand-image "
             style="opacity: .8">
        <span class="brand-text font-weight-bold">NEPTUNE</span>
      </a> --}}
      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="{{ url('/portal')}}" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="{{ route('portal.show',Auth::user()->id)}}" class="nav-link">Profile</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Payslip</a>
          </li>

        </ul>


      </div>

      <!-- Right navbar links -->
      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <!-- Messages Dropdown Menu -->
        <ul class="navbar-nav ml-auto">
            <!-- Authentication Links -->
           <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->first_name . ' ' . Auth::user()->last_name}} <span class="caret"></span>
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
      </ul>
    </div>
  </nav>
  <!-- /.navbar -->
