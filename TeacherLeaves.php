<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
</head>
<body>
    <div class="d-flex justify-content-between bg-dark p-1" style="color:white;"> 
        <a href="/" class="col-2 hovering" style="display: block; background-image: url('logomu.jpg'); background-position-y:center; background-repeat: no-repeat; background-size: contain; ">
        </a>
        <div class="col-8 d-flex align-items-center justify-content-evenly">
            <h1>Enter Attandence</h1>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-evenly">
            <div type="button" class="btn btn-secondary py-3 m-2"><a href="/Logout.php" style="text-decoration: none; color:white;"> Log&nbspOut</a></div>
        </div>

    </div>

    <form action="/Makepresent.php" method="POST">
    <main style="display:flex; flex-wrap: nowrap;height: 75vh;height: -webkit-fill-available;max-height: 100vh;overflow-x: auto;overflow-y: hidden;" >
    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="width: 300px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <li class="nav-item">
            <a href="/SelfAttandence.php" class="nav-link link-dark" aria-current="page">
              <svg class="bi me-2" width="16" height="16"><use xlink:href="/SelfAttandence.php"></use></svg>
              Self Attandence
            </a>
        </li>
        <a href="/Attandence.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewTeacherDetails.php"></use></svg>
          Student Attandence
        </a>
      </li>
      <li class="nav-item">
        <a href="/BooksTeacher.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputTeacherDetails.php"></use></svg>
          Books
        </a>
      </li>

      <li>
        <a href="/EditMarks.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentDetails.php"></use></svg>
          Edit Marks
        </a>
      </li>
      <li>
        <a href="/Sallary.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputStudentDetails.php"></use></svg>
          Salary
        </a>
      </li>
      <li>
        <a href="/TeacherLeaves.php" class="nav-link active">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputStudentDetails.php"></use></svg>
          Leaves
        </a>
      </li>

    </ul>
    <hr>
  </div>

    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="overflow: auto; white-space: nowrap; width: 1000px;">
        
    <?php
    session_start();
    $con=mysqli_connect("localhost","root","","authentication");
    $total_el=18;
    $total_cl=5;
    $total_sl=12;
    $total_ml=80;
    $total_pl=15;
    
    $el=0;
    $cl=0;
    $sl=0;
    $ml=0;
    $pl=0;
    $lopl=0;
    
    $sql = "SELECT * FROM teacher_attendance where UserName='".$_SESSION['Tusername']."'"; 
    $res = mysqli_query($con, $sql);
    if($res = $con->query($sql)){ 
        if($res->num_rows > 0){ 

            echo "<table class='table table-striped'>"; 
                echo "<tr>"; 
                    echo "<th colspan='3' scope='col'>Leave&nbspDate </th>"; 
                    echo "<th colspan='3' scope='col'>Leave&nbspType</th>"; 
                echo "</tr>"; 
                
            while($row = $res->fetch_array()){
              if($row['Status']!='P'){

                if($row['Status']=='EL'){
                  $el+=1;
                }
                if($row['Status']=='CL'){
                  $cl+=1;
                }
                if($row['Status']=='SL'){
                  $sl+=1;
                }
                if($row['Status']=='ML'){
                  $ml+=1;
                }
                if($row['Status']=='PL'){
                  $pl+=1;
                }
                if($row['Status']=='LOPL'){
                  $lopl+=1;
                }
                echo "<tr>"; 
                    echo "<td colspan='3' >".$row['Day']."/".$row['Month']."/".$row['Year']."</td>";
                    echo "<td colspan='3' >" . $row['Status'] . "</td>"; 

                echo "</tr>"; 
            } }
            echo "</table>"; 

            $res->free();
            echo "<table class='table table-striped'>
            <tr>
              <th colspan='3' scope='col'>Remaining&nbspLeaves </th>
              <th colspan='3' scope='col'>Earned Leave</th>
              <th colspan='3' scope='col'>Casual Leave</th>
              <th colspan='3' scope='col'>Sick Leave </th>
              <th colspan='3' scope='col'>Maternity Leave</th>
              <th colspan='3' scope='col'>Paternity Leave</th>
              <th colspan='3' scope='col'>Loss of Pay Leave</th>
            </tr>
            <tr>
              <th colspan='3' scope='col'>".(($total_el+$total_cl+$total_sl+$total_ml+$total_pl)-($el+$cl+$sl+$ml+$pl) )."</th>
              <th colspan='3' scope='col'>".$total_el-$el."/".$total_el."</th>
              <th colspan='3' scope='col'>".$total_cl-$cl."/".$total_cl."</th>
              <th colspan='3' scope='col'>".$total_sl-$sl."/".$total_sl."</th>
              <th colspan='3' scope='col'>".$total_ml-$ml."/".$total_ml."</th>
              <th colspan='3' scope='col'>".$total_pl-$pl."/".$total_pl."</th>
              <th colspan='3' scope='col'>".$lopl."</th>
            </tr>
            </table>";
        } else{ 
          $messagee = "No matching records are found.";
          echo "<script type='text/javascript'> alert('$messagee'); </script> " . mysqli_error($con);
        } 
    } else{ 
        $messagee = "ERROR: Could not able to execute $sql. ";
        echo "<script type='text/javascript'> alert('$messagee'); </script> " . mysqli_error($con);
    }  
    $con->close();
    ?>
    </main>
</form>

    <?PHP
    include('Footer.php')
?>
    