<?php
require_once 'db.php';
$user = R::findAll('user');
?>

<nav class="navbar navbar-light bg-light">
    <form class="form-inline">
        <div class="d-flex">
            <div class="p-1"><button class="btn btn-outline-warning" type="button" id="block"> Block </button></div>
            <div class="p-1"><button class="btn btn-outline-secondary" type="button" id="unblock"> Unblock </button></div>
            <div class="p-1"><button class="btn btn btn-outline-danger" type="button" id="delete"> Delete </button></div>
        </div>
  </form>
</nav>

<table class="table table-bordered">
    <thead class="thead-light">
        <tr>
            <td scope="col"> <input type="checkbox" onclick="checkAll(this)"></td>
            <td scope="col"> ID </td>
            <td scope="col"> Name </td>
            <td scope="col"> Email </td>
            <td scope="col"> Registration data </td>
            <td scope="col"> Date of last sign in </td>
            <td scope="col"> Status </td>
        </tr>
    </thead>

<?php
    foreach($user as $u):
?>
    <tr id="<?echo($u->id)?>">
        <td><input type="checkbox" name="checkbox[]" value="<?echo($u->id)?>"></td>
        <td><?echo($u->id);?></td>
        <td><?echo($u->name);?></td>
        <td><?echo($u->email);?></td>
        <td><?echo($u->date_regictr);?></td>
        <td><?echo($u->date_last_login);?></td>
        <td><?echo($u->status);?></td>
    </tr>

<?php
    endforeach;
?>
</table>

<div class="d-flex justify-content-center m-5 ">
    <a href="logout.php" >Logout</a>
</div>