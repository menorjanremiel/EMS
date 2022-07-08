<!-- header -->
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login | Admin</title>
            <!-- Tell the browser to be responsive to screen width -->
            <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
            <!-- Bootstrap 3.3.7 -->
            <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
            <!-- Font Awesome -->
            <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
            <!-- Ionicons -->
            <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
            <!-- Theme style -->
            <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
            <!-- DataTables -->
            <link rel="stylesheet" href="../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
            <!-- daterange picker -->
            <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
            <!-- Bootstrap time Picker -->
            <link rel="stylesheet" href="../plugins/timepicker/bootstrap-timepicker.min.css">
            <!-- bootstrap datepicker -->
            <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
            <!-- AdminLTE Skins. Choose a skin from the css/skins
                folder instead of downloading all of them to reduce the load. -->
            <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
            
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->

            <!-- Google Font -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
            
            <style type="text/css">
            @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');



            </style>
        </head>
<!-- header -->

<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Attendance </h1>
      <table class="table">
  <thead>
    <tr>
      <th scope="col">Date</th>
      <th scope="col">Time In</th>
      <th scope="col">Time Out</th>
    </tr>
  </thead>
  <tbody>
    <?php 
            session_start();
            include('conn.php');
            $sql = "SELECT * FROM `attendance` WHERE `employee_id` = '$_SESSION[id_emp]'";
            $result =  mysqli_query($conn,$sql) or die($conn->error);
            if(mysqli_num_rows($result)>0)
            { 
            while($attendance = mysqli_fetch_array($result))
            {  
                $date  =  $attendance['date'];
                $time_in = $attendance['time_in'];
                $time_out = $attendance['time_out'];

                ?>
                <tr>
                    <td><?php echo $date ?></td>
                    <td><?php echo $time_in ?></td>
                    <td><?php echo $time_out ?></td>
                </tr>
                <?php 
            }
        } ?>
  </tbody>
</table>
    </section>
</div>
<!-- script -->
    <script>
    $(function(){
    $('.edit').click(function(e){
        e.preventDefault();
        $('#edit').modal('show');
        var id = $(this).data('id');
        getRow(id);
    });

    $('.delete').click(function(e){
        e.preventDefault();
        $('#delete').modal('show');
        var id = $(this).data('id');
        getRow(id);
    });
    });

    function getRow(id){
    $.ajax({
        type: 'POST',
        url: 'attendance_row.php',
        data: {id:id},
        dataType: 'json',
        success: function(response){
        $('#datepicker_edit').val(response.date);
        $('#attendance_date').html(response.date);
        $('#edit_time_in').val(response.time_in);
        $('#edit_time_out').val(response.time_out);
        $('#attid').val(response.attid);
        $('#employee_name').html(response.firstname+' '+response.lastname);
        $('#del_attid').val(response.attid);
        $('#del_employee_name').html(response.firstname+' '+response.lastname);
        }
    });
    }
    </script>
<!-- script -->
</body>
</html>


