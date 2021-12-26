<?php
require __DIR__.'/header.php';
require "db.php";
$data = $_POST;

if(isset($data['do_signup'])) {
	
    $errors = array();

	if(trim($data['email']) == '') {
		$errors[] = "Enter your email";
	}
	if(trim($data['name']) == '') {
		$errors[] = "Enter your name";
	}
	if($data['password'] == '') {
		$errors[] = "Enter password";
	}
	if($data['password_2'] != $data['password']) {
		$errors[] = "Passwords are different";
	}

	if(R::count('user', "email = ?", array($data['email'])) > 0) {
		?>
		<div class="mask d-flex align-items-center h-100">
			<div class="container h-100">
				<div class="row d-flex justify-content-center align-items-center h-100">
							<div class="card-body p-5">
								<h5 class="text-uppercase text-center mb-5" style="color: red;">User with this email already exist!</h5>
								<div class="d-flex justify-content-center">
								<a href="login.php" class="text-body"><button class="btn btn-lg gradient-custom-4">Login here</button></a>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
		<?
	}
	else if(empty($errors)) {
		$user = R::dispense('user');

		$user->email = $data['email'];
		$user->name = $data['name'];

        date_default_timezone_set('Europe/Kiev');
        $user->date_regictr = date('Y-m-d H:i:s');

		$user->password = password_hash($data['password'], PASSWORD_DEFAULT);
		$user->status = 'registered';

		R::store($user);
        ?>
		<div class="mask d-flex align-items-center h-100">
			<div class="container h-100">
				<div class="row d-flex justify-content-center align-items-center h-100">
							<div class="card-body p-5">
								<h5 class="text-uppercase text-center mb-5">Successfully registered!</h5>
								<div class="d-flex justify-content-center">
									<button class="btn btn-success  btn-lg gradient-custom-4"><a href="login.php" class="text-body"><u>Sign in</u></a></button>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
		<?

	} else {
		echo '<div class="alert alert-warning m-5" role="alert" align = center>'. array_shift($errors).'</div>';
	}
}
require __DIR__.'/footer.php';?>