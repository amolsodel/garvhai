<div class="container">

<?php if(!empty($error)){?>
	<div>
		<?php
			echo $error;
		?> 
	</div>
<?php }elseif (!empty($notice)) {?>
	<div>
		<?php
			echo $notice;
		?> 
	</div>
<?php }?>

  <form class="form-signin" method="post" action="http://garvhai.in/index.php/admin/login">
    <h2 class="form-signin-heading">Please sign in</h2>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" name="userEmail" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" name="userPass" id="inputPassword" class="form-control" placeholder="Password" required>
    <div class="checkbox">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  </form>

</div>