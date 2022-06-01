<nav class="navbar navbar-light navbar-vertical navbar-expand-xl">
  <script>
    var navbarStyle = localStorage.getItem("navbarStyle");
    if (navbarStyle && navbarStyle !== 'transparent') {
      document.querySelector('.navbar-vertical').classList.add(`navbar-${navbarStyle}`);
    }
  </script>
  <div class="d-flex align-items-center">
    <div class="toggle-icon-wrapper">

      <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

    </div><a class="navbar-brand" href="{{url('/')}}">
      <div class="d-flex align-items-center py-3"><span class="font-sans-serif">Her i Norge</span>
      </div>
    </a>
  </div>
  <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
    <div class="navbar-vertical-content scrollbar">
      <ul class="navbar-nav flex-column mb-3" id="navbarVerticalNav">
        <li class="nav-item">
            <a class="nav-link" href="<?= url('/');?>">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-grin-tongue-wink"></span></span><span class="nav-link-text ps-1">Forsiden</span>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= url('/fylker');?>">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-grin-tongue-wink"></span></span><span class="nav-link-text ps-1">Fylker</span>
          </div>
        </a>
      </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ url('posts') }}">
            <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-grin-tongue-squint"></span></span><span class="nav-link-text ps-1">Artikler</span>
            </div>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="https://twitter.com/LoggsNo">
          <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-tools"></span></span><span class="nav-link-text ps-1">Følg oss på Twitter</span>
          </div>
        </a>
      </li>
      </ul>
    </div>
  </div>
</nav>
<div class="content">
  <nav class="navbar navbar-light navbar-glass navbar-top navbar-expand">
    <button class="btn navbar-toggler-humburger-icon navbar-toggler me-1 me-sm-3" type="button" data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse" aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>
    <a class="navbar-brand me-1 me-sm-3" href="<?= url('/');?>">
      <div class="d-flex align-items-center"><span class="font-sans-serif">Her i Norge</span>
      </div>
    </a>
    <ul class="navbar-nav align-items-center d-none d-lg-block">
      <li class="nav-item">
        @include('partials/_search')
      </li>
    </ul>
    <ul class="navbar-nav navbar-nav-icons ms-auto flex-row align-items-center">
      <li class="nav-item">
        <div class="theme-control-toggle fa-icon-wait px-2">
          <input class="form-check-input ms-0 theme-control-toggle-input" id="themeControlToggle" type="checkbox" data-theme-control="theme" value="dark" />
          <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to light theme"><span class="fas fa-sun fs-0"></span></label>
          <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle" data-bs-toggle="tooltip" data-bs-placement="left" title="Switch to dark theme"><span class="fas fa-moon fs-0"></span></label>
        </div>
      </li>
@auth
      <li class="nav-item dropdown">
        <a class="nav-link notification-indicator notification-indicator-primary px-0 fa-icon-wait" id="navbarDropdownNotification" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="fas fa-bell" data-fa-transform="shrink-6" style="font-size: 33px;"></span></a>
        <div class="dropdown-menu dropdown-menu-end dropdown-menu-card dropdown-menu-notification" aria-labelledby="navbarDropdownNotification">
          <div class="card card-notification shadow-none">
            <div class="card-header">
              <div class="row justify-content-between align-items-center">
                <div class="col-auto">
                  <h6 class="card-header-title mb-0">Notifications</h6>
                </div>
                <div class="col-auto ps-0 ps-sm-3"><a class="card-link fw-normal" href="#">Mark all as read</a></div>
              </div>
            </div>
            <div class="scrollbar-overlay" style="max-height:19rem">
              <div class="list-group list-group-flush fw-normal fs--1">
                
                
              </div>
            </div>
            <div class="card-footer text-center border-top"><a class="card-link d-block" href="#">View all</a></div>
          </div>
        </div>

      </li>
      <li class="nav-item dropdown"><a class="nav-link pe-0" id="navbarDropdownUser" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <div class="avatar avatar-xl">
            <img class="rounded-circle" src="{{ asset('img/team/3-thumb.png')}}" alt="" />
          </div>
        </a>
        <div class="dropdown-menu dropdown-menu-end py-0" aria-labelledby="navbarDropdownUser">
          <div class="bg-white dark__bg-1000 rounded-2 py-2">
            <a class="dropdown-item fw-bold text-warning" href="#!"><span class="fas fa-crown me-1"></span><span>Go Pro</span></a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="/posts/manage">Artikler</a>
            <a class="dropdown-item" href="/users/profile">Profil</a>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../pages/user/settings.html">Settings</a>
            <form class="dropdown-item" method="POST" action="/logout">
              @csrf
              <button class="btn btn-default btn-sm" type="submit">Logout</button>
            </form>
          </div>
        </div>
      </li>
@else
      <li class="nav-item">
        <a class="nav-link" href="/register">Register</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="/login">Login</a>

      </li>
@endauth
    </ul>
  </nav>