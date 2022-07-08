<?php
  session_start();
  if(isset($_SESSION['admin'])){
    header('location:home.php');
  }
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition">
<div class="login-box">
  	<div class="login-logo">
  		<b>Admin Login</b>
  	</div>
  
  	<div class="login-box-body">
    	<p class="login-box-msg">Sign in to start your session</p>

    	<form action="login.php" method="POST">
      		<div class="form-group has-feedback">
			  <i class="glyphicon glyphicon-user form-control-feedback"></i>
        		<input type="text" class="form-control" name="username" placeholder="Username" required autofocus>
      		</div>

          <div class="form-group has-feedback">
		  <i class="glyphicon glyphicon-lock form-control-feedback"></i>
            <input type="password" class="form-control" name="password" placeholder="Password" required>
          </div>
      				<center>
          			<button type="submit" class="btn" name="login">Sign In</button>
                <a href="index1.php" class="btn">Sign Out<a>
					</center>
      		</div>
    	</form>
  	</div>
  	<?php
  		if(isset($_SESSION['error'])){
  			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>".$_SESSION['error']."</p> 
			  	</div>
  			";
  			unset($_SESSION['error']);
  		}
  	?>
</div>
	
<?php include 'includes/scripts.php' ?>
</body>
</html>