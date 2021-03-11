<?php
include_once './core/init.php';
$db = DB::getInstance();
$User = new User();
if ($User->isLoggedIn()) {
  header("Location: ./src/Chat/index1.php");
} else {
?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./lib/bootstrap.css">
    <link rel="stylesheet" href="./layout/css/login.css">
  </head>

  <body>
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
      <div class="container">
        <div class="card login-card">
          <div class="row no-gutters">
            <div class="col-md-6">
              <img src="layout/images/login.jpg" alt="login" class="login-card-img">
            </div>
            <div class="col-md-5">
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
                  <input type="submit" name="login" id="login" class="btn btn-block login-btn mb-4" type="button" value="Login">
                </form>
                <a href="#!" class="forgot-password-link">Forgot password?</a>
                <p class="login-card-footer-text">Don't have an account? <a href="#!" class="text-reset open_signup_modal">Register here</a></p>
                <nav class="login-card-footer-nav">
                  <a href="#!">Terms of use.</a>
                  <a href="#!">Privacy policy</a>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signuplabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="signuplabel">Sign Up</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <input type="text" name="cin" id="cin" class="form-control" placeholder="cin" required>
              </div>
              <div class="row">
                <div class="col-sm">
                  <div class="form-group">
                    <input type="text" name="nom" id="nom" class="form-control" placeholder="First Name" required>
                  </div>
                </div>
                <div class="col-sm">
                  <div class="form-group">
                    <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Last Name" required>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm">
                  <div class="form-group">
                    <input type="date" name="dob" id="dob" class="form-control" placeholder="Date Of Birth" required>
                  </div>
                </div>
                <div class="col-sm">
                  <div class="form-group">
                    <input type="text" name="phonenumber" id="phonenumber" class="form-control" placeholder="Phone Number" required>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <input type="email" name="email" id="email0" class="form-control" placeholder="Email" required>
              </div>
              <div class="form-group">
                <input type="text" name="usernameA" id="usernameA" class="form-control" placeholder="User Name" required>
              </div>
              <div class="form-group mb-4">
                <input type="password" name="passwordA" id="passwordA" class="form-control" placeholder="***********" required>
              </div>
            </form>
            <div class="resultat">

            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary signupbutton">Sign Up</button>
          </div>
        </div>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="./lib/bootstrap.js"></script>
    <script>
      $(document).ready(function() {
        $(document).on('click', '.open_signup_modal', function() {
          $('#signupModal').modal('show');
        });
      });
      $(document).ready(function() {
        $(".signupbutton").click(function() {
          $(".alertw").hide();
          let nom = $("#nom").val();
          let lastname = $("#lastname").val();
          let dob = $("#dob").val();
          let phonenumber = $("#phonenumber").val();
          let email = $("#email0").val();
          let usernameA = $("#usernameA").val();
          let passwordA = $("#passwordA").val();
          let cin = $("#cin").val();
          // console.log(nom + ' ' + lastname + ' ' +
          //   dob + ' ' + phonenumber + ' ' +
          //   email + ' ' + usernameA + ' ' +
          //   passwordA + ' ' + cin);
          $.ajax({
            url: "./src/signup/signup.php",
            method: "POST",
            data: {
              nom: nom,
              lastname: lastname,
              dob: dob,
              phonenumber: phonenumber,
              email: email,
              usernameA: usernameA,
              passwordA: passwordA,
              cin: cin
            },
            dataType: "text",
            success: function(data) {
              $(".resultat").html(data);
            }
          });
        });
      });
    </script>
  </body>

  </html>
<?php } ?>