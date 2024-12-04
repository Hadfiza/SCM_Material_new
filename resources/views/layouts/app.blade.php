<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'SCM Material')</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  @yield('custom-css')

  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@500;600;800&display=swap');

    body {
      font-family: 'Poppins', sans-serif;
    }

    .content,
    .nav-link {
      font-family: 'Poppins', sans-serif;
      font-weight: 500;
    }

    .nav-link,
    a,
    hr,
    .nav-link::after {
      color: #FFFFFF;
    }

    .nav-link.active {
      background-color: #8B4513;
      color: white;
    }

    .sidebar {
      background-color: #654321;
      transition: width 0.3s ease;
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      overflow-x: hidden;
    }

    .sidebar.collapsed {
      width: 70px;
    }

    .sidebar.expanded {
      width: 250px;
    }

    .sidebar:hover {
      width: 250px;
    }

    .sidebar .nav-link span {
      display: none;
      transition: all 0.3s ease;
    }

    .sidebar:hover .nav-link span {
      display: inline-block;
      color: #FFFFFF;
    }

    .sidebar .nav-link:hover{
      background-color:  #8B4513;
      color: #FFFFFF !important;
    }

    .sidebar .nav-link {
      display: flex;
      align-items: center;
      gap: 10px;
      white-space: nowrap;
    }

    .sidebar .nav-link i {
      font-size: 1.2rem;
    }
    .sidebar:hover .nav-link.active {
      background-color: #8B4513 !important;
    }
    .main-content {
      margin-left: 70px;
      transition: margin-left 0.3s ease;
    }

    .main-content.expanded {
      margin-left: 250px;
    }
    #profile{
      margin-top: auto;
    }

    .profile-picture {
      width: 60px; /* Ukuran gambar */
      height: 60px; /* Ukuran gambar */
      border-radius: 50%; /* Membuat gambar bulat */
      object-fit: cover; /* Menyesuaikan isi gambar dengan ukuran */
      border: 2px solid #FFFFFF; /* Tambahkan border untuk estetika */
    }


    .offcanvas .nav-link:hover{
      background-color: #8B4513;
      color: #FFFFFF !important;
    }
    @media screen and (max-width: 576px) {
      .main-content {
        margin-left: 0;
      }
    }
  </style>
</head>

<body class="bg-body-tertiary">
  <div>
    <div>
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-light sticky-top d-flex flex-row flex-nowrap border-bottom" style="background-color: #FFFFFF; z-index: 1030;">
        <div class="container-fluid d-flex flex-row justify-content-start">
           <!-- Button Toggler -->
           <button class="navbar-toggler ms-1 border-1 border-dark d-block d-sm-none d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu" aria-controls="offcanvasMenu">
              <span><i class="bi bi-list fs-3"></i></span>
            </button>
          <!-- Brand -->
          <a class="navbar-brand ps-2 fs-3 fw-bold text-dark" href="#">MaterialFlow</a>
        </div>
        <div class="mb-2 mb-md-0 me-4 d-flex align-items-center">
          <a href="{{route('profile.show')}}" class="text-dark text-decoration-none d-flex align-items-center">
            @if(auth()->user()->photo)
            <img src="{{ asset('storage/' . auth()->user()->photo) }}" alt="Profile Picture" class="profile-picture me-2">
            @else
            <i class="bi bi-person-circle fs-4 me-2"></i>
            @endif
            <small class="pt-1">{{ auth()->user()->name }}</small>
          </a>
        </div>
        
    
      </nav>

      <!-- Sidebar -->
      <div id="sidebar" class="sidebar collapsed position-fixed min-vh-100 mt-5 d-none d-sm-block d-md-block d-lg-block d-xl-block">
        <ul class="nav flex-column pt-3 text-white mt-3">
          <li class="nav-item">
            <a class="nav-link {{ Request::is('/') ? 'active' : '' }} ps-4 text-white " href="{{ url('/') }}">
              <i class="bi bi-house-fill pe-2"></i> <span>Dashboard</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('pengiriman*') ? 'active' : '' }} ps-4" href="#">
              <i class="bi bi-truck pe-2"></i><span>Pengiriman</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('material*') ? 'active' : '' }} ps-4" href="#">
              <i class="bi bi-box-seam pe-2"></i> <span>Material</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('pemasok*') ? 'active' : '' }} ps-4" href="#">
              <i class="bi bi-people pe-2"></i> <span>Pemasok</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('proyek*') ? 'active' : '' }} ps-4" href="{{ route('admin.proyek') }}">
              <i class="bi bi-file-earmark-text pe-2"></i> <span>Proyek</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('') ? 'active' : '' }} ps-4" href="">
            <i class="bi bi-gear pe-2"></i> <span>Settings</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link {{ Request::is('') ? 'active' : '' }} ps-4" href="{{ url('/logout') }}">
            <i class="bi bi-door-closed pe-2"></i> <span>Sign Out</span>
            </a>
          </li>
          <br><br><br><br><br><br><br><br><br>
          <li class="nav-item mb-2 d-block d-sm-block d-md-none d-lg-none d-xl-none " id="profile" style="margin-top: auto;">
            <hr>
            <a class="nav-link ps-4" href="#">
            <i class="bi bi-person-circle pe-1 fs-4"></i><span>Username</span>
            </a>
          </li>
        </ul>
      </div>

      <!-- Offcanvas Sidebar -->
      <div class="offcanvas offcanvas-start d-md-none  min-vh-100" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel" style="width: 250px; background-color:  #654321;">
        <div class="offcanvas-header">
          <a href="" class=" text-decoration-none mt-2"><h5 class="offcanvas-title text-white fs-2 fw-bold" id="offcanvasMenuLabel">MaterialFlow</h5></a>
          <button type="button" class="btn-close text-reset btn-close-white mt-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column p-0 ">
          <hr>
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link " aria-current="page" href="{{ url('/') }}">
                <i class="bi bi-house-fill pe-2"></i> Dashboard
              </a>
            </li>
            
            <!-- Dropdown Pengiriman -->
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="bi bi-file-earmark pe-2"></i> Pengiriman
              </a>
            </li>

            <!-- Dropdown Material -->
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="bi bi-box-seam pe-2"></i> Material
              </a>
            </li>

            <!-- Dropdown Pemasok -->
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="bi bi-people pe-2"></i> Pemasok
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="bi bi-graph-up pe-2"></i>Proyek
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="bi bi-gear pe-2"></i> Settings
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}">
                <i class="bi bi-door-closed pe-2"></i> Sign out
              </a>
            </li>   
            
            <br><br><br><br><br><br><br><br>
            <li class="nav-item pt-2 pb-3">
              <hr>
              <a href="#" class="nav-link text-white text-decoration-none d-flex">
              <span><i class="bi bi-person-circle pe-1 fs-4"></i></span><small class="pt-2">Username</small>
              </a>
            </li>
          </ul>
        </div>
      </div>

      <!-- Main Content -->
      <main id="mainContent" class="main-content mb-3">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-2 pb-2 mb-2 shadow bg-white">
          <h5 class="fw-bold text-dark pt-3 ms-3">@yield('navbar', 'Dashboard')</h5>
        </div>
        <div class="container-fluid">
          @yield('content')
        </div>
      </main>
    </div>
  </div>

  <!-- Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <script>
  const sidebar = document.getElementById('sidebar');
  const mainContent = document.getElementById('mainContent');
  const navLinks = document.querySelectorAll('.sidebar .nav-link');

  // Function to handle click events on nav-links
  const handleNavLinkClick = (e) => {
    // Remove 'active' class from all nav-links
    navLinks.forEach(nav => nav.classList.remove('active'));

    // Add 'active' class to clicked nav-link
    e.currentTarget.classList.add('active');
  };

  // Attach click event to each nav-link
  navLinks.forEach(link => {
    link.addEventListener('click', handleNavLinkClick);
  });

  // Handle sidebar hover
  sidebar.addEventListener('mouseover', () => {
    sidebar.classList.add('expanded');
    sidebar.classList.remove('collapsed');
    mainContent.classList.add('expanded');
  });

  sidebar.addEventListener('mouseout', () => {
    sidebar.classList.remove('expanded');
    sidebar.classList.add('collapsed');
    mainContent.classList.remove('expanded');
  });
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>

</body>
</html>








