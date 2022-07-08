<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Employee List
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li>Employees</li>
        <li class="active">Employee List</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Fullname</th>
      <th scope="col">Reason</th>
      <th scope="col">StartDate</th>
      <th scope="col">LastDate</th>
      <th scope="col">Status</th>
    </tr>
  </thead>
  <tbody>
  <?php 
            include('includes/conn.php');
            $sql = "SELECT employees.id , employees.firstname , employees.lastname , emp_leave.emp_id, emp_leave.reason, emp_leave.start_date , emp_leave.last_date, emp_leave.status FROM `employees` INNER JOIN `emp_Leave` ON employees.id = emp_leave.emp_id WHERE emp_leave.status = 'pending'";
            $result =  mysqli_query($conn,$sql) or die($conn->error);
            if(mysqli_num_rows($result)>0)
            { 
            while($emp_leave = mysqli_fetch_array($result))
            {  
                $firstname  =  $emp_leave['firstname'];
                $lastname = $emp_leave['lastname'];
                $reason = $emp_leave['reason'];
                $startdate = $emp_leave['start_date'];
                $lastdate = $emp_leave['last_date'];
                $status = $emp_leave['status']
                ?>
                <tr>
                    <td><?php echo $firstname." ". $lastname ?></td>
                    <td><?php echo $reason ?></td>
                    <td><?php echo $startdate ?></td>
                    <td><?php echo $lastdate ?></td>
                    <td><?php echo $status ?></td>
                </tr>
                <?php 
            }
        } ?>
</tbody>
  
    </section>   
    
  </div>

  

</body>

</html>

