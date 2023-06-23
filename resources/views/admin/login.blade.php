<!DOCTYPE html>
<html lang="en">
  
  <head>
    @include('partials.admin-head')
  </head>

  <body>
    <div class="container-scroller">
      <div class="container-fluid page-body-wrapper full-page-wrapper">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo text-center">
                  <img src="/assets/img/logo.jpg" alt="logo" width=200/>
                </div>
                <form class="pt-3" method="post">
                  @csrf
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name="username" placeholder="Username" />
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="password" placeholder="Password" />
                  </div>
                  @if(session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                      <p>Username/Password Salah!</p>
                    </div>
                  @endif
                  <div class="mt-3">
                    <button type="submit" name="login" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- content-wrapper ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('partials.admin-script')
  </body>
</html>
