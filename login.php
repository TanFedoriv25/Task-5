<?php 
$title="Sign in";
require __DIR__.'/header.php';
require "db.php";
?>

<div class="mask d-flex align-items-center h-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-9 col-lg-7 col-xl-6">
          <div class="card" style="border-radius: 15px;">
            <div class="card-body p-5">
              <h2 class="text-uppercase text-center mb-5">Sign in</h2>

              <form action="login.php" method="post">

                <div class="form-outline mb-4">
                  <input type="text" name="name" id="form3Example1cg" class="form-control form-control-lg" placeholder="Name" required/>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password" id="form3Example2cg" class="form-control form-control-lg" placeholder="Password" require/>
                </div>

                <div class="d-flex justify-content-center">
                  <button name="do_login" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body" type="submit">Sign in</button>
                </div>

                <p class="text-center text-muted mt-5 mb-0">Haven't already an account? <a href="registration_form.php" class="fw-bold text-body"><u>Register here</u></a></p>

              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php require __DIR__.'/footer.php'; ?>

<?php

$data = $_POST;

if(isset($data['do_login'])) { 
    $errors = array();
    $user = R::findOne('user', 'name = ?', array($data['name']));

    if($user) {
      if($user->status == 'blocked'){
        unset($_SESSION['logged_user']);
        echo '<div class="alert alert-danger m-5" role="alert" align = center>User '.$user->name.' blocked! Can not sign in!</div>';
      }
 	    elseif(password_verify($data['password'], $user->password)) {
 		    $_SESSION['logged_user'] = $user->id;
			$user = R::load('user', $user->id);
			date_default_timezone_set('Europe/Kiev');
        	$user->date_last_login = date('Y-m-d H:i:s');
			$user->status = 'logged in';
			R::store($user);
 		    header('Location: index.php');
 	    } else {
            $errors[] = 'Incorrect password!';
 	    }
    } else {
 	    $errors[] = 'User with this name not found!';
    }
    if(!empty($errors)) {
	    echo '<div class="alert alert-warning m-5" role="alert" align = center>'. array_shift($errors).'</div>';
    }
}
?>