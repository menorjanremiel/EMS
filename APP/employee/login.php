<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
 

    <title>EMS Connect | Employee</title>
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Varela+Round&display=swap');

    .divider:after, .divider:before {
      content: "";
      flex: 1;
      height: 1px;
      background: #eee;
    }

    .h-custom {
      height: calc(100% - 73px);
    }

    h1 {
      font-family: 'Varela Round', sans-serif;
      
    }

    @media (max-width: 450px) {
        .h-custom {
          height: 80%;
        }
      }
      
      @media (min-width: 500px) {
        .h-custom {
          height: 100vh !important;
        }
      }

    .d-flex {
        margin-right: 12px;
        font-family: 'Varela Round', sans-serif;
    }

    .btn {
        background-color: #950101;
        border: none;
    }

    .btn:hover {
        background-color: #C7CFB7;
    }

</style>
  </head>
  <body >

  <?php 

$email_err = $pass_err = $login_Err = "";
$email = $pass = "";

if( $_SERVER["REQUEST_METHOD"] == "POST" ){
   
  if( empty($_REQUEST["email"]) ){
   $email_err = " <p style='color:red'> * Email Can Not Be Empty</p> ";
  }else {
   $email = $_REQUEST["email"];
  }

  if ( empty($_REQUEST["password"]) ){
   $pass_err =  " <p style='color:red'> * Password Can Not Be Empty</p> ";
  }else {
    $pass = $_REQUEST["password"];
  }

  if( !empty($email) && !empty($pass) ){

    // database connection
    require_once "../conn.php";

    $sql_query = "SELECT * FROM employees WHERE email='$email' && password = '$pass'  ";
    $result = mysqli_query($conn , $sql_query);

    if ( mysqli_num_rows($result) > 0 ){
     while( $rows = mysqli_fetch_assoc($result) ){
      session_start();
      session_unset();
      $_SESSION["email_emp"] = $rows["email"];
      $_SESSION["id_emp"] = $rows["id"];
      header("Location: dashboard.php?login-sucess");
     }
    }else{
      $login_Err = "<div class='alert alert-warning alert-dismissible fade show'>
      <strong>Invalid Email/Password</strong>
      <button type='button' class='close' data-dismiss='alert' >
        <span aria-hidden='true'>&times;</span>
      </button>
    </div>";
    }

  }

}

?>

<section class="vh-90">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="../time.png" class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
	  
      <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
	
          <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
            <h1>Employee Login</h1>
          </div>

          <div class="divider d-flex align-items-center my-4">
          </div>

          <div class="text-center my-5"> <?php echo $login_Err; ?> </div>

          <div class="form-outline mb-4">
            <input type="text" name="email" value="<?php echo $email; ?>" class="form-control form-control-lg" placeholder="Email" required/>
              <?php echo $email_err; ?>  
          </div>

        
          <div class="form-outline mb-3">
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Password" required/>
              <?php echo $pass_err; ?> 
          </div>


          <div class="text-center text-lg-start mt-4 pt-2">
            <input type="submit" name="signin" class="btn btn-primary btn-lg"
              style="padding-left: 2.5rem; padding-right: 2.5rem;"/>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>

 
 
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="./resources/plugins/common/common.min.js"></script>
    <script src="./resources/js/custom.min.js"></script>
    <script src="./resources/js/settings.js"></script>
    <script src="./resources/js/gleek.js"></script>
    <script src="./resources/js/styleSwitcher.js"></script>
  </body>
</html>