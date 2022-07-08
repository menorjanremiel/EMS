<!DOCTYPE html>
<html>
    <head>
        <title>DTR</title>
        <style type="text/css">
            table {
                border-collapse: collapse;
                width: 150%;
                color: #d96459;
                font-family: monospace;
                font-size: 20px;
                text-align: center;s
            }
            th{
                background-color: #d96459;
                color: white;
            }
            tr:nth-child(even) {background-color: #f2f2f2}
            body{
                margin: 0;
                padding: 0;
                font-family: monospace;
            }
            section{
                padding: 30% 30%;
                background-image: url();
                height: 100px;
                display: flex;
                align-items:center;
            }
            .box{
                position: relative;
                max-width: 500px;
                padding:20px 180px 20px 20px ;
                 background: rgba(255,255,255,.4);
                 box-shadow: 0 5px 15px rgba(0,0,0,.5);
            }
        </style>
    </head>
<body>
    <section>
    <div class="box">
    <table>
        <tr>
            <th>ID</th>
            <th>Date</th>
            <th>Time In</th>
            <th>Time Out</th>
        </tr>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "apsystem");
    if($conn-> connect_error) {
        die("Connection Failed:". $conn-> connect_error);
    }
    $sql = 'SELECT employee_id, date, time_in, time_out from attendance';
    $result = $conn-> query($sql);

    if ($result-> num_rows > 0) {
        while ($row = $result-> fetch_assoc()) {
            echo "<tr><td>". $row["employee_id"]. "</td><td>". $row["date"]. "</td><td>". 
            $row["time_in"], "</td><td>". $row["time_out"];
        }
        echo"</table>";
    }
    else{
        echo "0 result";
    }
    $conn-> close();
    ?>
    <table>
        <tr>
        <th>Employee ID</th>
        <th>Firstname</th>
        <th>Lastname</th>
        </tr>
    <?php
    $conn = mysqli_connect("localhost", "root", "", "apsystem");
    if($conn-> connect_error) {
        die("Connection Failed:". $conn-> connect_error);
    }
        $sql = 'SELECT employee_id, firstname, lastname from employees';
        $result = $conn -> query($sql);

        if ($result-> num_rows > 0){
            while ($row = $result-> fetch_assoc()) {
                echo "<tr><td>". $row["employee_id"]. "</td><td>". $row["firstname"]. "</td><td>". $row["lastname"];
            }
            echo"</table>";
        }
        else{
            echo "0 result";
        }
        $conn-> close();
    ?>
    </table>
    </table>
</section>
</div>
</body>
</html>