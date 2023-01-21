{{-- <nav class="navbar navbar-expand-lg navbar-dark bg-success">
  <div class="container">
      <a class="navbar-brand" href="/">Baznas</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
          aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item">
                  <a class="nav-link {{ ($active === "home") ? 'active' : '' }}" href="/">Home</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ ($active === "about") ? 'active' : '' }}" href="/about">About</a>
              </li>
              <li class="nav-item">
                  <a class="nav-link {{ ($active === "posts") ? 'active' : '' }}" href="/posts">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ ($active === "categories") ? 'active' : '' }}" href="/categories">Categories</a>
            </li>
          </ul>

          <ul class="navbar-nav ms-auto">
                @auth
                  <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      Welcome back, {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i> My Dashboard</a></li>
                      <li><hr class="dropdown-divider"></li>
                      <li>
                          <form action="/logout" method="post">
                                @csrf
                              <button type="submit" class="dropdown-item"><i class="bi bi-box-arrow-right"></i> Logout</button>
                          </form>
                      </li>
                    </ul>
                  </li>
                @else
                <li class="nav-item">
                    <a href="/login" class="nav-link {{ ($active === "login") ? 'active' : '' }}"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
                @endauth
            </ul>

      </div>
  </div>
</nav> --}}

<nav class="main-nav">
    <!-- ***** Logo Start ***** -->
    <a href="#" class="logo">
        <img src="/img/baznas_header.png" alt="BAZNAS" height="36px" />
    </a>
    <!-- ***** Logo End ***** -->
    <!-- ***** Menu Start ***** -->
    <ul class="nav">
        <li><a href="/" class="{{ $active === 'home' ? 'active' : '' }}">Home</a></li>
        <li><a href="/posts" class="{{ $active === 'posts' ? 'active' : '' }}">Berita</a></li>
        <li><a href="/kalkulator-zakat" class="{{ $active === 'kalkulator' ? 'active' : '' }}">Kalkulator Zakat</a></li>
        <li><a href="/bayar-zakat" class="{{ $active === 'bayar' ? 'active' : '' }}">Bayar Zakat</a></li>
        @auth
            <li><a href="/admin/dashboard">Dashboard</a></li>
            <li>
              <form action="/logout" method="post" id="form-logout">
                @csrf
                <a href="javascript:$('#form-logout').submit()" onclick="" class="{{ $active === 'logout' ? 'active' : '' }}">Logout</a>
              </form>
            </li>
        @else
            <li><a href="/login" class="{{ $active === 'login' ? 'active' : '' }}">Login</a></li>
        @endauth
        {{-- <li><a href="#testimonials">Testimonials</a></li>
        <li><a href="#pricing-plans">Pricing Tables</a></li>
        <li><a href="#blog">Blog Entries</a></li>
        <li><a href="#contact-us">Contact Us</a></li> --}}
    </ul>
    <a class='menu-trigger'>
        <span>Menu</span>
    </a>
    <!-- ***** Menu End ***** -->
</nav>
