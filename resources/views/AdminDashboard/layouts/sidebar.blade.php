<!DOCTYPE html>
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>@yield('title')</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />
    
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
    
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
   <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="../assets/vendor/js/helpers.js"></script>

    <script src="../assets/js/config.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    @livewireStyles
  </head>
  <body>
    <style>
      .highcharts-figure,
.highcharts-data-table table {
  min-width: 320px;
  max-width: 800px;
  margin: 1em auto;
  
}

.highcharts-data-table table {
  font-family: Verdana, sans-serif;
  border-collapse: collapse;
  border: 1px solid #ebebeb;
  margin: 10px auto;
  text-align: center;
  width: 100%;
  max-width: 500px;
}

.highcharts-data-table caption {
  padding: 1em 0;
  font-size: 1.2em;
  color: #555;
}

.highcharts-data-table th {
  font-weight: 600;
  padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
  padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
  background: #f8f8f8;
}

.highcharts-data-table tr:hover {
  background: #f1f7ff;
}

input[type="number"] {
  min-width: 50px;
}
      </style>
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">
        <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
          <div class="app-brand demo">
            <a href="/" class="app-brand-link">
              <span class="app-brand-logo ">
                <ul class="navbar-nav ">
                 
                  <li class="nav-item navbar-dropdown dropdown-user dropdown">
                    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                      <div class="avatar avatar-online">
                        <img src="{{url('user_image/'.Auth::user()->photo)}} " style="border-radius: 50%" />
                      </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                      <li>
                        <a class="dropdown-item" href="/profil">
                          <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                              <div class="avatar avatar-online">
                                <img src="{{url('user_image/'.Auth::user()->photo)}} " style="border-radius: 50%" />
                              </div>
                            </div>
                            <div class="flex-grow-1">
                              <span class="fw-semibold d-block">{{Auth::user()->prenom ??  route('logout')}}</span>
                              <small class="text-muted">Admin</small>
                            </div>
                          </div>
                        </a>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                      </li>
                      
                      <li>
                                      <a class="dropdown-item" href="{{ route('logout') }}"
                                         onclick="event.preventDefault();
                                                       document.getElementById('logout-form').submit();">
                                          {{ __('Logout') }}
                                      </a>
  
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                          @csrf
                                      </form>
                        
                        </a>
                      </li>
                    </ul>
                  </li>
                  <!--/ User -->
                </ul>
              </span>
              <h2 class="app-brand-text  menu-text fw-bolder m-2">SETIT</h2>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item active">
              <a href="/dash" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

           <!--pages-->
            <li class="menu-header small text-uppercase">
              <span class="menu-header-text">Gestion d'Administrateur</span>
            </li>
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dock-top"></i>
                <div data-i18n="Account Settings">Paramètres du Compte</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="profil" class="menu-link">
                    <div data-i18n="Account">Profile</div>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item">
              <a href="message" class="menu-link ">
                <i class="menu-icon tf-icons bx bx-message-square-dots" ></i>
                <div data-i18n="Account Settings">Messages</div>
              </a>
            </li>
             
            
            <!-- Forms & Tables -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Ajout &amp; Edit &amp; Supprime</span></li>
            <!-- Tables -->
            <li class="menu-item">
              <a href="javascript:void(0);" class="menu-link menu-toggle">
              <!--<a href="userManager" class="menu-link">-->
                <i class="menu-icon tf-icons bx bx-table"></i>
                <div data-i18n="Tables">Fonctionnalités</div>
              </a>
              <ul class="menu-sub">
                <li class="menu-item">
                  <a href="userManager" class="menu-link">
                    <div data-i18n="Vertical Form">Gestion utilisateurs</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="actualityManager" class="menu-link">
                    <div data-i18n="Vertical Form">Gestion  actualités</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="manifestationManager" class="menu-link">
                    <div data-i18n="Vertical Form">Gestion Manifestation</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="eventManager" class="menu-link">
                    <div data-i18n="Vertical Form">Gestion evénements</div>
                  </a>
                </li>
                <li class="menu-item">
                  <a href="domainManager" class="menu-link">
                    <div data-i18n="Vertical Form">Gestion des domaines</div>
                  </a>
                </li>
                  <li class="menu-item">
                    <a href="postsManager" class="menu-link">
                      <div data-i18n="Vertical Form">Gestion publications</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="productionManager" class="menu-link">
                      <div data-i18n="Horizontal Form">Gestion production</div>
                    </a>
                  </li>
                  <li class="menu-item">
                    <a href="cooperationManager" class="menu-link">
                      <div data-i18n="Vertical Form">Gestion coopération</div>
                    </a>
                  </li>
            </li>
          </ul>
            <!-- Misc -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">About us</span></li>
              <li class="menu-item">
                <a
                  href="/#footer"
                  target="_blank"
                  class="menu-link"
                >
                  <i class="menu-icon tf-icons bx bx-support"></i>
                  <div data-i18n="Support">Contacts</div>
                </a>
            </li>

          </ul>
        </aside>
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Navbar -->

          
          
          <div>
            <div class="card-body">
              @if (session('status'))
                  <div class="alert alert-success" role="alert">
                      {{ session('status') }}
                  </div>
              @endif
            @yield('content')
          </div>
          <script src="../assets/vendor/libs/jquery/jquery.js"></script>
              <script src="../assets/vendor/libs/popper/popper.js"></script>
              <script src="../assets/vendor/js/bootstrap.js"></script>
              <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
          
              <script src="../assets/vendor/js/menu.js"></script>
              <!-- endbuild -->
          
              <!-- Vendors JS -->
              <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>
          
              <!-- Main JS -->
              <script src="../assets/js/main.js"></script>
          
              <!-- Page JS -->
              <script src="../assets/js/dashboards-analytics.js"></script>
          
              <!-- Place this tag in your head or just before your close body tag. -->
              <script async defer src="https://buttons.github.io/buttons.js"></script>
              <script type="text/javascript" src="/js/jquery-1.11.2.min.js"></script>
       @livewireScripts       

        </body>