<?php
include_once './core/init.php';
// include_once './src/modal_neded.html';
$db = DB::getInstance();
$User = new User();
if ($User->isLoggedIn()) {
  header("Location: ./src/Chat/index1.html");
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Template</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="./lib/bootstrap.css">
    <link rel="stylesheet" href="./layout/css/login.css">
  </head>

  <body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
      <div class="container">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-5">
              <img src="layout/images/login.jpg" alt="login" class="login-card-img">
            </div>
            <div class="col-md-7">
              <div class="card-body">
                <div class="brand-wrapper">
                  <img src="layout/images/logo.svg" alt="logo" class="logo">
                </div>
                <p class="login-card-description">Sign into your account</p>
                <form action="src/login_logout/check_login.php" method="POST">
                  <div class="form-group">
                    <label for="email" class="sr-only">User Name</label>
                    <input type="text" name="username" id="email" class="form-control" placeholder="User Name">
                  </div>
                  <div class="form-group mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="***********">
                  </div>
                  <input type="submit" name="login" id="login" name="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset open_signup_modal">Register here</a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!">About Us.</a>
                  <a href="#!">About This Chat Box</a>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signuplabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="signuplabel">Sign Up</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="email" class="sr-only">User Name</label>
                <input type="text" name="username0" id="email0" class="form-control" placeholder="User Name">
              </div>
              <div class="form-group mb-4">
                <label for="password" class="sr-only">Password</label>
                <input type="password" name="password0" id="password0" class="form-control" placeholder="***********">
              </div>
              
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Sign Up</button>
          </div>
        </div>
      </div>
    </div>
    <script src="./lib/jquery.js"></script>
    <script src="./lib/bootstrap.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  </body>
  <script>
    $(document).ready(function() {
      $(document).on('click', '.open_signup_modal', function() {
        $('#signup').modal('show');
      });
    });
  </script>

  </html>
<?php } ?>