<?php
session_start();
$title="Main"; 
require __DIR__.'/header.php';
require "db.php";
?>
<script type="text/javascript">
$(document).ready(function(){
    $('#delete').click(function(){
        var id = [];
        $(':checkbox:checked').each(function(i){
            id[i] = $(this).val();
        });
        if(id.length === 0) {
            alert("Please Select at least one checkbox");
        }
        else {
            $.ajax({
                url:'delete.php',
                method:'POST',
                data:{id:id},
                success:function(data) {
                    var currentSessionValue = '<?php echo $_SESSION['logged_user'];?>';
                    console.log(currentSessionValue);
                    for(var i=0; i<id.length; i++) {
                        if(currentSessionValue == id[i]){
                            window.location.href=window.location.href;
                        }
                        console.log(id[i])
                        $('#'+id[i]).remove();
                    }
                }
            });
        }
    });

    $('#block').click(function(){
            var id = [];
            $(':checkbox:checked').each(function(i){
                id[i] = $(this).val();
            });
            if(id.length === 0) {
                alert("Please Select at least one checkbox");
            }
            else {
                $.ajax({
                    url:'block.php',
                    method:'POST',
                    data:{id:id},
                    success:function(data) {
                        window.location.href=window.location.href;
                    }
                });
            }
    });

    $('#unblock').click(function(){
        if(confirm("Are you sure you want to unblock those users?")) {
            var id = [];
            $(':checkbox:checked').each(function(i){
                id[i] = $(this).val();
            });
            if(id.length === 0) {
                alert("Please Select at least one checkbox");
            }
            else {
                $.ajax({
                    url:'unblock.php',
                    method:'POST',
                    data:{id:id},
                    success:function(data) {
                        window.location.href=window.location.href;
                    }
                });
            }
        }
        else {
            return false;
        }
    });
});
</script>

<?php 
if(isset($_SESSION['logged_user'])):
	require __DIR__.'/users.php';
?></br>

<?php else : ?>
    <div class="mask d-flex align-items-center h-100 ">
			<div class="container h-100 " >
				<div class="row d-flex justify-content-center align-items-center h-100 ">
							<div class="card-body p-5 ">
								<h4 class="text-uppercase text-center mb-4">Welcome!</h4>
								<div class="d-flex justify-content-center ">
                                    <a href="registration_form.php" class="text-body"><button class="btn btn-lg gradient-custom-4">Register</button><br>
									<a href="login.php" class="text-body"><button class="btn btn-lg gradient-custom-4">Sign in</button></a>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
<?php endif; ?>
<?php require __DIR__.'/footer.php'; ?>