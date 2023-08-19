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
  <?php
  if(isset($_POST['Filter']))
  {
    
  }else{
    session_start();
    if(isset($_POST['confirm'])){
    if($_POST['confirm']=='Confirm'){
        $con=mysqli_connect("localhost","root","","authentication");
        $sql = "SELECT * FROM teacher_attendance_temp";
        $res = mysqli_query($con, $sql);
        if($res->num_rows > 0){
          while($row = $res->fetch_array()){ 
            if(isset($_POST["sta-".$row['UserName']])){
                $sql2="INSERT INTO `teacher_attendance`(`Fname`, `Mname`, `Lname`, `Time`, `Day`, `Month`, `Year`, `Latitude`, `Longitude`, `UserName`, `Status`, `Senior`) 
                VALUES 
                ('".$row['Fname']."','".$row['Mname']."','".$row['Lname']."','".$row['Time']."','".$row['Day']."','".$row['Month']."','".$row['Year']."','".$row['Latitude']."','".$row['Longitude']."','".$row['UserName']."','".$_POST['sta-'.$row['UserName']]."','".$row['Senior']."')";                    
                $req = mysqli_query($con, $sql2);

                $sql3="DELETE FROM `teacher_attendance_temp` WHERE UserName='".$row['UserName']."' ";                    
                $req = mysqli_query($con, $sql3);
            }
            } 
        }
            
            // header('Location: ViewStudentsAccount.php');
        }else{
            echo '<div class="p-2 d-flex justify-content-center bg-danger" style="color: white;">';
                echo "<div class='col-2'><h5>Type&nbsp'Confirm'&nbspto&nbspcontinue!</h5></div>";
            echo '</div>';
        }
    
    }}
    ?>
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

    <form action="/MakeTeacherAttendance.php" method="POST">
    <main style="display:flex; " >
    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="width: 300px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">Sidebar</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
          <a href="/SelfAttandence2.php" class="nav-link active" aria-current="page">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="/SelfAttandence2.php"></use></svg>
            Attendance
          </a>
      </li>
      <li class="nav-item">
        <a href="/Attandence.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewTeacherDetails.php"></use></svg>
          Student Attendance
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
        <a href="/TeacherLeaves.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputStudentDetails.php"></use></svg>
          Leaves
        </a>
      </li>


    </ul>
    <hr>
  </div>

    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="overflow: auto; white-space: nowrap; width: 1000px;">
    <form action="MakeTeacherAttendance.php" method="POST">
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-light " style="width: 1000px;">
      <div class="row">
        <div class="col">
        <h5>Filter Teacher</h5>
        </div>
          <div class="col">
              <input type="text" name="Brunch" class="form-control" placeholder="Brunch">
          </div>
          <div class="col">
              <input type="text" name="Semester" class="form-control" placeholder="Semester">
          </div>
          <div class="col">
              <input type="text" name="Year" class="form-control" placeholder="Year">
          </div>
          <div class="col">
            <input class="col btn btn-primary"  name="Filter" type="submit" value="Filter">
          </div>
      </div>
    </form>

    <?php
    $con=mysqli_connect("localhost","root","","authentication");
    if(empty($_GET['PageNo'])){
        $_GET['PageNo']=1;
    }
    $page_number=$_GET['PageNo'];
    $limit=7;
    $initial_page=$initial_page = ($page_number-1) * $limit; ;
    if(isset($_POST['Brunch'])){
    if($_POST['Brunch']!='' && $_POST['Semester']!='' && $_POST['Year']!=''){
      $sql = "SELECT * FROM teacher_attendance_temp  where Senior='".$_SESSION['Tusername']."' and Brunch='".$_POST['Brunch']."' and Semester='".$_POST['Semester']."' and Year='".$_POST['Year']."' LIMIT " . $initial_page . ',' . $limit;
    }
    elseif($_POST['Brunch']!='' && $_POST['Semester']!=''){
      $sql = "SELECT * FROM teacher_attendance_temp  where Senior='".$_SESSION['Tusername']."' and Brunch='".$_POST['Brunch']."' and Semester='".$_POST['Semester']."' LIMIT " . $initial_page . ',' . $limit;
    }
    elseif($_POST['Semester']!='' && $_POST['Year']!=''){
      $sql = "SELECT * FROM teacher_attendance_temp  where Senior='".$_SESSION['Tusername']."' and  Semester='".$_POST['Semester']."' and Year='".$_POST['Year']."' LIMIT " . $initial_page . ',' . $limit;
    }
    elseif($_POST['Brunch']!='' && $_POST['Year']!=''){
      $sql = "SELECT * FROM teacher_attendance_temp  where Senior='".$_SESSION['Tusername']."' and  Brunch='".$_POST['Brunch']."' and Year='".$_POST['Year']."' LIMIT " . $initial_page . ',' . $limit;
    }
    elseif($_POST['Brunch']!=''){
      $sql = "SELECT * FROM teacher_attendance_temp  where Senior='".$_SESSION['Tusername']."' and  Brunch='".$_POST['Brunch']."' LIMIT " . $initial_page . ',' . $limit;
    }
    elseif($_POST['Semester']!=''){
      $sql = "SELECT * FROM teacher_attendance_temp  where Senior='".$_SESSION['Tusername']."' and  Semester='".$_POST['Semester']."' LIMIT " . $initial_page . ',' . $limit;
    }
    elseif($_POST['Year']!=''){
      $sql = "SELECT * FROM teacher_attendance_temp  where Senior='".$_SESSION['Tusername']."' and  Year='".$_POST['Year']."' LIMIT " . $initial_page . ',' . $limit;
    }
    else{
      
      $sql = "SELECT * FROM  teacher_attendance_temp where Senior='".$_SESSION['Tusername']."'  LIMIT " . $initial_page . ',' . $limit;
    }}else{
      $sql = "SELECT * FROM  teacher_attendance_temp where Senior='".$_SESSION['Tusername']."'  LIMIT " . $initial_page . ',' . $limit;
    }

    $res = mysqli_query($con, $sql);
    $row_number=7*($page_number-1);
    if($res = $con->query($sql)){ 
        if($res->num_rows > 0){ 
            echo "<table class='table table-striped mt-1'>"; 
                echo "<tr>"; 
                    echo "<th colspan='3' scope='col'>Name </th>"; 
                    echo "<th colspan='3' scope='col'>Date </th>";
                    echo "<th colspan='3' scope='col'>Month </th>";
                    echo "<th colspan='3' scope='col'>Year </th>";
                    echo "<th colspan='3' scope='col'>Status </th>";
                    echo "<th colspan='3' scope='col'>Time </th>";
                    echo "<th colspan='3' scope='col'>Latitude </th>";
                    echo "<th colspan='3' scope='col'>Longitude </th>";
                    echo "<th colspan='3' scope='col'>Accept As </th>";
                echo "</tr>"; 
                
            while($row = $res->fetch_array()){ 
                echo "<tr>"; 
                    echo "<td colspan='3' >" . $row['Fname'] ." ". $row['Mname'] ." ". $row['Lname'] . "</td>";
                    // echo "<td colspan='3' >" . $row['Brunch'] . "</td>";
                    echo "<td colspan='3' >" . date("D") . "</td>";
                    echo "<td colspan='3' >" . date("M") . "</td>";
                    echo "<td colspan='3' >" . date("Y") . "</td>";
                    echo "<td colspan='3' >" . $row['Status'] . "</td>";

                    $sql1234 = "SELECT * FROM  locations";
                    $res123 = mysqli_query($con,$sql1234);
                    $flag=1;
                    $flag2=1;
                    while($row123 = $res123->fetch_array()){ 
                      if(strtotime($row123['starttime'])<=strtotime($row['Time']) && strtotime($row123['endtime'])>=strtotime($row['Time'])){
                        $flag=0;
                      }else{
                        $flag=1;
                      }

                      if(strtotime($row['Latitude'])-10<=strtotime($row['Latitude']) && strtotime($row['Latitude'])+10>=strtotime($row['Latitude'])){
                        $flag2=0;
                      }else{
                        $flag2=1;
                      }
                    }
                    if($flag==0){
                      echo "<td colspan='3' style='color:green'>" . $row['Time'] . "</td>";
                    }else{
                      echo "<td colspan='3' style='color:red'>" . $row['Time'] . "</td>";
                    }

                    if($flag2==0){
                      echo "<td colspan='3' style='color:green'>" . $row['Latitude'] . "</td>";
                      echo "<td colspan='3' style='color:green'>" . $row['Longitude'] . "</td>";
                    }else{
                      echo "<td colspan='3' style='color:red'>" . $row['Latitude'] . "</td>";
                      echo "<td colspan='3' style='color:red'>" . $row['Longitude'] . "</td>";
                    }
                    echo "<td colspan='3' >
                    <select name='sta-".$row['UserName']."' class='form-select'>
                        <option value='P'>Present</option>
                        <option value='EL'>EL</option>
                        <option value='CL'>CL</option>
                        <option value='SL'>SL</option>
                        <option value='ML'>ML</option>
                        <option value='PL'>PL</option>
                        <option value='LOPL'>LOPL</option>
                    </select>
                    </td>";
                echo "</tr>";
                $row_number+=1;
            } 
            echo "</table>"; 
            $res->free(); 
        } else{ 
        $messagee = "No attendance records are found.";
        echo "<script type='text/javascript'> alert('$messagee'); </script> " . mysqli_error($con);
        } 
    } else{ 
        $messagee = "ERROR: Could not able to execute $sql. ";
        echo "<script type='text/javascript'> alert('$messagee'); </script> " . mysqli_error($con);
    }  
    $con->close();
    ?>
    
    <div class="mt-1">
      <?php
    echo"    <nav aria-label='Page navigation example' class='d-flex justify-content-center'>";
    echo"      <ul class='pagination'>";
    echo"        <li class='page-item'>";
    echo"          <a class='page-link' href='Attandence.php?PageNo=".($page_number-1)."' aria-label='Previous'>";
    echo"            <span aria-hidden='true'>&laquo;</span>";
    echo"            <span class='sr-only'>Previous</span>";
    echo"          </a>";
    echo"        </li>";
    echo"        <li class='page-item'>";
    echo"          <a class='page-link' href='Attandence.php?PageNo=".($page_number+1)."' aria-label='Previous'>";
    echo"            <span class='sr-only'>Next</span>";
    echo"            <span aria-hidden='true'>&raquo;</span>";
    echo"          </a>";
    echo"        </li>";
    echo"      </ul>";
    echo"    </nav>";
  ?>
    <input type="text" class="form-control" name="confirm" id="inputPassword2" placeholder='Type "Confirm" to continue'>
    </div>
    <input class="btn btn-primary mt-3 p-2"  type="submit" value="Submit">
    </div>
    </main>
</form>

<?PHP
    include('Footer.php')
?>
    