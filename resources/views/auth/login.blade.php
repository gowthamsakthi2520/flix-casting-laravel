<!doctype html>
<html lang="en" data-bs-theme="semi-dark">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Flix Casting</title>
    <link rel="icon" type="image/png" href="{{asset('backend/images/favicon.png')}}" />
  <!--plugins-->
  <link href="{{asset('backend/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet">
  <link href="{{asset('backend/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet">
  <link href="{{asset('backend/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet">
  <!--Styles-->
  <link href="{{asset('backend/css/bootstrap.min.css')}}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="{{asset('backend/css/icons.css')}}">

  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
  <link href="{{asset('backend/css/main.css')}}" rel="stylesheet">
  <link href="{{asset('backend/css/dark-theme.css')}}" rel="stylesheet">

</head>

<body>


  <!--authentication-->

  <div class="section-authentication-cover">
    <div class="">
      <div class="row g-0">

        <div class="col-12 col-xl-7 col-xxl-8 auth-cover-left align-items-center justify-content-center d-none d-xl-flex bg-primary">

          <div class="card rounded-0 mb-0 border-0 bg-transparent">
            <div class="card-body">
          
            </div>
          </div>

        </div>

        <div class="col-12 col-xl-5 col-xxl-4 auth-cover-right align-items-center justify-content-center">
          <div class="card rounded-0 m-3 mb-0 border-0">
            <div class="card-body p-sm-5">
              <img src="{{asset('backend/images/logo.png')}}" class="mb-3 text-center" width="300" alt="">
          

            


              <div class="form-body mt-4">
              <form class="row g-3" method="POST" action="{{ route('login') }}">
                @csrf
                  <div class="col-12">
                    <label for="inputEmailAddress" class="form-label">Email</label>
                    <input type="email" class="form-control  border-3  @error('email') is-invalid @enderror" name="email"  value="{{ old('email') }}" id="inputEmailAddress" placeholder="">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                     @enderror
                  </div>
                  <div class="col-12">
                    <label for="inputChoosePassword" class="form-label">Password</label>
                    <div class="input-group" id="show_hide_password">
                      <input type="password" class="form-control border-end-0  border-3 @error('password') is-invalid @enderror" name="password" id="inputChoosePassword" value="" placeholder=""> 
                      <a href="javascript:;" class="input-group-text bg-transparent  border-3"><i class="bi bi-eye-slash-fill"></i></a>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                  </div>
                  <div class="col-md-6">
                    <div class="form-check form-switch  border-3">
                      <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked">
                      <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                    </div>
                  </div>
                  @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                  @endif
                  <div class="col-12">
                    <div class="d-grid">
                    <button type="submit" class="btn  border-3 btn-primary">
                      Login
                    </button>
                    </div>
                  </div>
                 
                </form>
              </div>

          </div>
          </div>
        </div>

      </div>
      <!--end row-->
    </div>
  </div>

  <!--authentication-->




  <!--plugins-->
  <script src="{{asset('backend/js/jquery.min.js')}}"></script>

  <script>
    $(document).ready(function () {
      $("#show_hide_password a").on('click', function (event) {
        event.preventDefault();
        if ($('#show_hide_password input').attr("type") == "text") {
          $('#show_hide_password input').attr('type', 'password');
          $('#show_hide_password i').addClass("bi-eye-slash-fill");
          $('#show_hide_password i').removeClass("bi-eye-fill");
        } else if ($('#show_hide_password input').attr("type") == "password") {
          $('#show_hide_password input').attr('type', 'text');
          $('#show_hide_password i').removeClass("bi-eye-slash-fill");
          $('#show_hide_password i').addClass("bi-eye-fill");
        }
      });
    });
  </script>

</body>

</html>