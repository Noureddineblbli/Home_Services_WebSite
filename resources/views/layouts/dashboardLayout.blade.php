<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Admin Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/css/chblue.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/css/theme-responsive.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/css/dtb/jquery.dataTables.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/css/select2.min.css') }}" rel="stylesheet" media="screen">
    <link href="{{ asset('assets/css/toastr.min.css') }}" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard/styles.css') }}">
    @livewireStyles
  </head>
  <body>
    <div class="grid-container">

      <!-- Sidebar -->
      <span id="sidebar-toggle" class="material-icons-outlined">menu</span>
      <aside id="sidebar" class="sidebar-responsive">
        <div class="sidebar-title">
          <div class="sidebar-brand">
            <span class="material-icons-outlined">inventory</span> ServiceNet
          </div> 
          <span class="material-icons-outlined" id="sidebar-close">close</span>
        </div>
        
        <ul class="sidebar-list" style="font-weight: 600;">
          <li class="sidebar-list-item">
            <a href="{{ route('admin.dashboard') }}">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="{{ route('admin.service_categories') }}">
            <span class="material-icons-outlined">category</span> Service categorie
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="{{ route('admin.all_services') }}">
            <span class="material-icons-outlined">construction</span> Services
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="{{ route('admin.service_providers') }}" >
            <span class="material-icons-outlined">group</span> Service Providers
            </a>
          </li>
          {{-- <li class="sidebar-list-item">
            <a href="{{ route('admin.slider') }}" >
            <span class="material-icons-outlined">slideshow</span> Sliders
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="{{ route('admin.contacts') }}" >
            <span class="material-icons-outlined">contacts</span> Contacts
            </a>
          </li> --}}
          <li class="sidebar-list-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <form id="logout-form" method="POST" action="{{ route('logout') }}" style="display: none">
                    @csrf
                </form>
                <span class="material-icons-outlined">exit_to_app</span> Logout
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        {{ $slot}}
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.3/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script type="text/javascript" src="{{ asset('assets/css/dashboard/scripts.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
      window.addEventListener('show-confirmation', event => {
          Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, I'm sure"
          }).then((result) => {
              if (result.isConfirmed) {
                  Livewire.emit('ActionConfirmed')            
              }
          })

      });

  </script>

    @stack('scripts')
    @livewireScripts
  </body>
</html>