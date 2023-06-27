<!doctype html>
<html lang="en" data-bs-theme="semi-dark">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Flix Casting</title>
      <link rel="icon" type="image/png" href="{{asset('backend/images/favicon.png')}}" />
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <meta name="base_url" content="{{url('/')}}" />
      <!--plugins-->
      <link href="{{asset('backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" >
      <link href="{{asset('backend/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet">
      <link href="{{asset('backend/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet">
      <!-- loader-->
      <link href="{{asset('backend/css/pace.min.css')}}" rel="stylesheet">
      <script src="{{asset('backend/js/pace.min.js')}}"></script>
      <!--Styles-->
      <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
      <link rel="stylesheet" href="{{asset('backend/css/icons.css')}}" >
      <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
      <link href="{{asset('backend/css/main.css')}}" rel="stylesheet">
      <link href="{{asset('backend/css/dark-theme.css')}}" rel="stylesheet">
      <link href="{{asset('backend/css/semi-dark-theme.css')}}" rel="stylesheet">
      <link href="{{asset('backend/css/minimal-theme.css')}}" rel="stylesheet">
      <link href="{{asset('backend/css/shadow-theme.css')}}" rel="stylesheet">
      <link href="{{asset('backend/css/style.css')}}" rel="stylesheet">
      <link href="{{asset('backend/noty/css/noty.css')}}" rel="stylesheet" />
      <link href="{{asset('backend/plugins/datatable/css/dataTables.bootstrap5.min.css')}}" rel="stylesheet">
      <script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
   </head>
   <body>
   <header class="top-header">
      <nav class="navbar navbar-expand justify-content-between">
          <div class="btn-toggle-menu">
            <span class="material-symbols-outlined">menu</span>
          </div>
          <div class="position-relative search-bar d-lg-block d-none" data-bs-toggle="modal" data-bs-target="#exampleModal">
            <input class="form-control form-control-sm rounded-5 px-5" disabled type="search" placeholder="Search">
            <span class="material-symbols-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
          </div>
            <ul class="navbar-nav top-right-menu gap-2">
  
              <li class="nav-item dropdown dropdown-large">
                <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;" data-bs-toggle="dropdown">
                  <div class="position-relative">
                    <img src="{{Auth::user()->image !="" ? asset(Auth::user()->image): asset('backend/images/profile.webp')}}" class="profile-icon">
                  </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end mt-lg-2">
                  <div class="header-notifications-list">
                    <a class="dropdown-item" href="{{route('profile')}}">
                      <div class="d-flex align-items-center">
                      <div class="notify text-primary border">
                          <span class="material-symbols-outlined">
                            account_circle
                            </span>
                        </div>
                        <div class="flex-grow-1">
                          <h6 class="msg-name">Profile</h6>
                        </div>
                      </div>
                    </a>

                    <a class="dropdown-item"  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                      <div class="d-flex align-items-center">
                      <div class="notify text-danger border"><span class="material-symbols-outlined">logout</span></div>
                        <div class="flex-grow-1">
                          <h6 class="msg-name">Logout</h6>
                        </div>
                      </div>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                   </form>
                  </div>
                </div>
              </li>
             
               
            </ul>
       </nav>
     </header>

     <aside class="sidebar-wrapper">
          <div class="sidebar-header">
            <div class="logo-icon">
              <img src="{{asset('backend/images/logo.png')}}" class="logo-img" alt="">
            </div>
            
            <div class="sidebar-close ">
              <span class="material-symbols-outlined">close</span>
            </div>
          </div>
          <div class="sidebar-nav" data-simplebar="true">
            
              <!--navigation-->
              <ul class="metismenu" id="menu">
                <li>
                  <a href="{{url('dashboard')}}">
                    <div class="parent-icon"><span class="material-symbols-outlined">home</span>
                    </div>
                    <div class="menu-title">Dashboard</div>
                  </a>
                </li>

                <li>
                  <a href="{{url('service')}}">
                    <div class="parent-icon"><span class="material-symbols-outlined">apps</span>
                    </div>
                    <div class="menu-title">Main Services</div>
                  </a>
                </li>

                <li>
                  <a href="{{url('subservice')}}">
                  <div class="parent-icon"><span class="material-symbols-outlined">package</span>
                    </div>
                    <div class="menu-title">Sub Service</div>
                  </a>
                </li>

                <li>
                  <a href="{{url('gallery')}}">
                    <div class="parent-icon"><span class="material-symbols-outlined">backup_table</span>
                    </div>
                    <div class="menu-title">Gallery</div>
                  </a>
                </li>
                <li>
                  <a href="{{url('/banner')}}">
                    <div class="parent-icon"><span class="material-symbols-outlined">apps</span>
                    </div>
                    <div class="menu-title">Banner</div>
                  </a>
                </li>

                <li>
                  <a href="{{url('videos')}}">
                    <div class="parent-icon"><span class="material-symbols-outlined">account_circle</span>
                    </div>
                    <div class="menu-title">Our Videos </div>
                  </a>
                </li>
            
                <li>
                <a class="dropdown-item"  href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                  <div class="parent-icon"><span class="material-symbols-outlined">logout</span></div>
                  <div class="menu-title">Logout</div>
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                  </form>
                </li>
              </ul>
              <!--end navigation-->

              
          </div>
          <div class="sidebar-bottom dropdown dropup-center dropup">
              <div class="dropdown-toggle d-flex align-items-center px-3 gap-3 w-100 h-100" data-bs-toggle="dropdown">
                <div class="user-img">
                   <img src="{{asset('backend/images/avatars/01.png')}}" alt="">
                </div>
                <div class="user-info">
                  <h5 class="mb-0 user-name">Admin</h5>
                  <p class="mb-0 user-designation">Admin</p>
                </div>
              </div>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="javascript:;"><span class="material-symbols-outlined me-2">
                  account_circle
                  </span><span>Profile</span></a>
                </li>     
              </ul>
          </div>
     </aside>
    @yield('content')
      <!--start overlay-->
      <div class="overlay btn-toggle-menu"></div>
      <!--end overlay-->
      <!-- Search Modal -->
      <div class="modal" id="exampleModal" tabindex="-1">
         <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
               <div class="modal-header gap-2">
                  <div class="position-relative popup-search w-100">
                     <input class="form-control form-control-lg ps-5 border border-3 border-primary" type="search" placeholder="Search">
                     <span class="material-symbols-outlined position-absolute ms-3 translate-middle-y start-0 top-50">search</span>
                  </div>
                  <button type="button" class="btn-close d-xl-none" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="modal-body">
                  <div class="search-list">
                     <p class="mb-1">Html Templates</p>
                     <div class="list-group">
                        <a href="javascript:;" class="list-group-item list-group-item-action active align-items-center d-flex gap-2"><i class="bi bi-filetype-html fs-5"></i>Best Html Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-award fs-5"></i>Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-box2-heart fs-5"></i>Responsive Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-camera-video fs-5"></i>eCommerce Html Templates</a>
                     </div>
                     <p class="mb-1 mt-3">Web Designe Company</p>
                     <div class="list-group">
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-chat-right-text fs-5"></i>Best Html Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-cloud-arrow-down fs-5"></i>Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-columns-gap fs-5"></i>Responsive Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-collection-play fs-5"></i>eCommerce Html Templates</a>
                     </div>
                     <p class="mb-1 mt-3">Software Development</p>
                     <div class="list-group">
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-cup-hot fs-5"></i>Best Html Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-droplet fs-5"></i>Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-exclamation-triangle fs-5"></i>Responsive Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-eye fs-5"></i>eCommerce Html Templates</a>
                     </div>
                     <p class="mb-1 mt-3">Online Shoping Portals</p>
                     <div class="list-group">
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-facebook fs-5"></i>Best Html Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-flower2 fs-5"></i>Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-geo-alt fs-5"></i>Responsive Html5 Templates</a>
                        <a href="javascript:;" class="list-group-item list-group-item-action align-items-center d-flex gap-2"><i class="bi bi-github fs-5"></i>eCommerce Html Templates</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--start theme customization-->
      <div class="offcanvas offcanvas-end" tabindex="-1" id="ThemeCustomizer" aria-labelledby="ThemeCustomizerLable">
         <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="ThemeCustomizerLable">Theme Customizer</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
         </div>
         <div class="offcanvas-body">
            <h6 class="mb-0">Theme Variation</h6>
            <hr>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="inlineRadioOptions" id="LightTheme" value="option1">
               <label class="form-check-label" for="LightTheme">Light</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="inlineRadioOptions" id="DarkTheme" value="option2" checked="">
               <label class="form-check-label" for="DarkTheme">Dark</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="inlineRadioOptions" id="SemiDarkTheme" value="option3">
               <label class="form-check-label" for="SemiDarkTheme">Semi Dark</label>
            </div>
            <hr>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="inlineRadioOptions" id="MinimalTheme" value="option3">
               <label class="form-check-label" for="MinimalTheme">Minimal Theme</label>
            </div>
            <div class="form-check form-check-inline">
               <input class="form-check-input" type="radio" name="inlineRadioOptions" id="ShadowTheme" value="option4">
               <label class="form-check-label" for="ShadowTheme">Shadow Theme</label>
            </div>
         </div>
      </div>

    <script src="{{asset('backend/js/jquery.min.js')}}"></script>
      <script src="{{asset('backend/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
      <script src="{{asset('backend/plugins/metismenu/js/metisMenu.min.js')}}"></script>
      <script src="{{asset('backend/plugins/simplebar/js/simplebar.min.js')}}"></script>
      <script src="{{asset('backend/plugins/apex/apexcharts.min.js')}}"></script>
      <script src="{{asset('backend/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
      <script>
		$(document).ready(function() {
			$('#custmerList').DataTable();
		  } );
	 </script>
      <script src="{{asset('backend/js/index.js')}}"></script>
      <!--BS Scripts-->
      <script src="{{asset('backend/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('backend/js/main.js')}}"></script>

    <script src="{{asset('backend/noty/js/noty.min.js')}}"></script>
    <script src="{{asset('backend/js/custom.js')}}"></script>
    <script>
                // Replace the <textarea id="editor1"> with a CKEditor 4
                // instance, using default configuration.
                CKEDITOR.replace( 'FAQs' );
                CKEDITOR.replace( 'highlights');
                CKEDITOR.replace( 'big_description');
                CKEDITOR.replace( 'about');
            </script>
<script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>
<script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.css">
      @yield('scripts')
          
      @include('message')
   </body>
</html>

