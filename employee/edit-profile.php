<?php
    require_once "include/header.php";
?>


<?php  
    // database connection
        require_once "../connection.php";
        
    $session_email =  $_SESSION["email_emp"];
    $sql = "SELECT * FROM employee WHERE email= '$session_email' ";
    $result = mysqli_query($conn , $sql);

if(mysqli_num_rows($result) > 0 ){
   
    while($rows = mysqli_fetch_assoc($result) ){
        $name = $rows["name"];
        $email = $rows["email"];
        $position = $rows["position"];
        $dob = $rows["dob"];
        $gender = $rows["gender"];
    }
}
        $nameErr = $emailErr = "";
        // $name = $email = $dob = $gender = "";

        if( $_SERVER["REQUEST_METHOD"] == "POST" ){ 
             // database connection
             require_once "../connection.php";
             $sql_select_query = "SELECT email FROM employee WHERE email = '$email' ";
             $r = mysqli_query($conn , $sql_select_query);
 
             $sql = "UPDATE employee SET name = '".$_REQUEST['name']."', position = '".$_REQUEST['position']."', dob = '".$_REQUEST['dob']."', gender='".$_REQUEST['gender']."' WHERE email='$_SESSION[email_emp]' ";

            //  echo "<pre>".$sql."</pre>";

             $result = mysqli_query($conn , $sql);
                 if($result){
                     $_SESSION['email_emp']= $email;
                     echo "<script>
                     $(document).ready( function(){
                         $('#showModal').modal('show');
                         $('#modalHead').hide();
                         $('#linkBtn').attr('href', 'profile.php');
                         $('#linkBtn').text('View Profile');
                         $('#addMsg').text('Profile Edited Successfully!!');
                         $('#closeBtn').hide();
                     })
                 </script>
                 ";
                 }

            //  if( mysqli_num_rows($r) > 0 ){
            //      $emailErr = "<p style='color:red'> * Email Already Register</p>";
            //  } else{

                 
            //  }

 
            // if( empty($_REQUEST["gender"]) ){
            //     $gender ="";
            // }else {
            //     $gender = $_REQUEST["gender"];
            // }


            // if( empty($_REQUEST["dob"]) ){
            //     $dob = "";
            // }else {
            //     $dob = $_REQUEST["dob"];
            // }

            // if( empty($_REQUEST["name"]) ){
            //     $nameErr = "<p style='color:red'> * Name is required</p>";
            //     $name = "";
            // }else {
            //     $name = $_REQUEST["name"];
            // }

            // if( empty($_REQUEST["email"]) ){
            //     $emailErr = "<p style='color:red'> * Email is required</p> ";
            //     $email = "";
            // }else{
            //     $email = $_REQUEST["email"];
            // }

            // if( empty($_REQUEST["position"]) ){
            //     $positionErr = "<p style='color:red'> * Email is required</p> ";
            //     $position = "";
            // }else{
            //     $position = $_REQUEST["position"];
            // }


            // if( !empty($name) && !empty($email) ){
            
               

            // }
        }
?>



<div style=""> 
<div class="login-form-bg h-100">
        <div class="container mt-5 h-100">
            <div class="row justify-content-center h-100">
                <div class="col-xl-6">
                    <div class="form-input-content">
                        <div class="card login-form mb-0">
                            <div class="card-body pt-5 shadow">                       
                                    <h4 class="text-center">Edit Your Profile</h4>
                                <form method="POST" action=" <?php htmlspecialchars($_SERVER['PHP_SELF']) ?>">
                            
                                <div class="form-group">
                                    <label >Full Name :</label>
                                    <input type="text" class="form-control" value="<?php echo $name; ?>"  name="name" required> 
                                </div>


                                <div class="form-group">
                                    <label >Email :</label>
                                    <input type="email" class="form-control" value="<?php echo $email; ?>"  name="email" disabled required>     
                                </div>

                                <div class="form-group">
                                    <label >Position :</label>
                                    <input type="position" class="form-control" value="<?php echo $position; ?>"  name="position" required >     
                                    
                                </div>

                                <div class="form-group">
                                    <label >Date-of-Birth :</label>
                                    <input type="date" class="form-control" value="<?php echo $dob; ?>" name="dob" required >  
                                   
                                </div>

                                <div class="form-group form-check form-check-inline">
                                    <label class="form-check-label" >Gender :</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Male" ){ echo "checked"; } ?>  value="Male"  selected>
                                    <label class="form-check-label" >Male</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Female" ){ echo "checked"; } ?>  value="Female">
                                    <label class="form-check-label" >Female</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gender" <?php if($gender == "Other" ){ echo "checked"; } ?>  value="Other">
                                    <label class="form-check-label" >Other</label>
                                </div>


                                <div class="btn-toolbar justify-content-between" role="toolbar" aria-label="Toolbar with button groups">
                                    <div class="btn-group">
                                   <input type="submit" value="Save Changes" class="btn btn-primary w-20 " name="save_changes" >        
                                    </div>
                                    <div class="input-group">
                                         <a href="profile.php" class="btn btn-primary w-20">Close</a>
                                    </div>
                                </div>
                                  </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php 
    require_once "include/footer.php";
?>