<?php 
$title="Registration form";
require __DIR__.'/header.php';
?>

<div class="mask d-flex align-items-center h-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Register</h2>

              <form action="registration.php" method="post">

                <div class="form-outline mb-4">
                  <input type="text" name="name" id="form3Example1cg" class="form-control form-control-lg" placeholder="Name" required/>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" id="form3Example3cg" class="form-control form-control-lg" placeholder="Email" require/>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form3Example4cg" class="form-control form-control-lg" placeholder="Password" require/>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password_2" id="form3Example4cdg" class="form-control form-control-lg" placeholder="Confirm password" require/>
                </div>

				        <input type="hidden" name="date_registr" id="date_registr"><br>

                <div class="d-flex justify-content-center">
                  <button name="do_signup" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" type="submit">Register</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Have already an account? <a href="login.php" class="fw-bold text-body"><u>Login here</u></a></p>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php require __DIR__.'/footer.php';?>
