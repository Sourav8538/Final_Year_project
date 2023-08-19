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
    if(isset($_POST['confirm'])){
        if($_POST['confirm']=='Confirm'){

          $con=mysqli_connect("localhost","root","","authentication");
          $sql = "SELECT * FROM students";
          $res = mysqli_query($con, $sql);
          if($res = $con->query($sql)){ 
            if($res->num_rows > 0){ 
              while($row = $res->fetch_array()){ 
                  $sql2="UPDATE `fees` SET `UserName`='".$row['UserName']."',`1stYear`='".$_POST["Y1-".$row['StudentID']]."',
                  `2ndYear`='".$_POST["Y2-".$row['StudentID']]."',`3rdYear`='".$_POST["Y3-".$row['StudentID']]."',`4thYear`='".$_POST["Y4-".$row['StudentID']]."' WHERE UserName='".$row['UserName']."'";                    
                  $req = mysqli_query($con, $sql2);

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

    <form action="/InputStudentFees.php" method="POST">
    <main style="display:flex; flex-wrap: nowrap;height: 75vh;height: -webkit-fill-available;max-height: 100vh;overflow-x: auto;overflow-y: hidden;" >
    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="width: 300px;">
        <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
        <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
        <span class="fs-4">Account Section</span>
        </a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/ViewTeachersAccount.php" class="nav-link link-dark" aria-current="page">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewTeachersAccount.php"></use></svg>
            View Teacher Accounts
            </a>
        </li>
        <li class="nav-item">
            <a href="/UpdateTeachersAccount.php" class="nav-link link-dark" aria-current="page">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateTeachersAccount.php"></use></svg>
            Input Teacher Accounts
            </a>
        </li>
        <li class="nav-item">
        <a href="/UpdateTeacherSalary.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateTeacherSalary.php"></use></svg>
          Update Teacher Salary
        </a>
      </li>
        <li>
            <a href="/ViewStudentsAccount.php" class="nav-link link-dark">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentsAccount.php"></use></svg>
            View Student Accounts
            </a>
        </li>
        <li>
            <a href="/UpdateStudentsAccount.php" class="nav-link link-dark">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateStudentsAccount.php"></use></svg>
            Input Student Accounts
            </a>
        </li>
        <li>
            <a href="/InputStudentFees.php" class="nav-link active">
            <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputStudentFees.php"></use></svg>
            Update Student Fees
            </a>
        </li>

        </ul>
        <hr>
    </div>

    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="overflow: auto; white-space: nowrap; width: 1000px;">
    <form action="InputStudentFees.php" method="POST">
      <div class="d-flex flex-column flex-shrink-0 p-3 bg-light " style="width: 1000px;">
      <div class="row">
        <div class="col">
        <h5>Filter Students</h5>
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
        $sql = "SELECT * FROM students where Brunch='".$_POST['Brunch']."' and Semester='".$_POST['Semester']."' and Year='".$_POST['Year']."' LIMIT " . $initial_page . ',' . $limit;
      }
      elseif($_POST['Brunch']!='' && $_POST['Semester']!=''){
        $sql = "SELECT * FROM students where Brunch='".$_POST['Brunch']."' and Semester='".$_POST['Semester']."' LIMIT " . $initial_page . ',' . $limit;
      }
      elseif($_POST['Semester']!='' && $_POST['Year']!=''){
        $sql = "SELECT * FROM students where Semester='".$_POST['Semester']."' and Year='".$_POST['Year']."' LIMIT " . $initial_page . ',' . $limit;
      }
      elseif($_POST['Brunch']!='' && $_POST['Year']!=''){
        $sql = "SELECT * FROM students where Brunch='".$_POST['Brunch']."' and Year='".$_POST['Year']."' LIMIT " . $initial_page . ',' . $limit;
      }
      elseif($_POST['Brunch']!=''){
        $sql = "SELECT * FROM students where Brunch='".$_POST['Brunch']."' LIMIT " . $initial_page . ',' . $limit;
      }
      elseif($_POST['Semester']!=''){
        $sql = "SELECT * FROM students where Semester='".$_POST['Semester']."' LIMIT " . $initial_page . ',' . $limit;
      }
      elseif($_POST['Year']!=''){
        $sql = "SELECT * FROM students where Year='".$_POST['Year']."' LIMIT " . $initial_page . ',' . $limit;
      }
      else{
        
        $sql = "SELECT * FROM students LIMIT " . $initial_page . ',' . $limit;
      }}else{
        $sql = "SELECT * FROM students LIMIT " . $initial_page . ',' . $limit;
      }
      
    $res = mysqli_query($con, $sql);
    $row_number=7*($page_number-1);
    if($res = $con->query($sql)){ 
        if($res->num_rows > 0){ 
            echo "<table class='table table-striped mt-1'>"; 
                echo "<tr>"; 
                    echo "<th colspan='3' scope='col'>First&nbspname </th>"; 
                    echo "<th colspan='3' scope='col'>Middle&nbspname</th>";
                    echo "<th colspan='3' scope='col'>Last&nbspname</th>"; 
                    echo "<th colspan='3' scope='col'>Brunch </th>"; 
                    echo "<th colspan='3' scope='col' style='text-align:center'>Year&nbsp1 </th>";
                    echo "<th colspan='3' scope='col' style='text-align:center'>Year&nbsp2 </th>";
                    echo "<th colspan='3' scope='col' style='text-align:center'>Year&nbsp3 </th>";
                    echo "<th colspan='3' scope='col' style='text-align:center'>Year&nbsp4 </th>"; 
                echo "</tr>"; 
                
            while($row = $res->fetch_array()){ 
                echo "<tr>"; 
                    echo "<td colspan='3' >" . $row['Fname'] . "</td>";
                    echo "<td colspan='3' >" . $row['Mname'] . "</td>"; 
                    echo "<td colspan='3' >" . $row['Lname'] . "</td>";
                    echo "<td colspan='3' >" . $row['Brunch'] . "</td>";
                    $sql2 = "SELECT * FROM fees where UserName='".$row['UserName']."'";
                    $req2 = mysqli_query($con, $sql2);
                    $res2 = $con->query($sql2);
                    while($row2 = $res2->fetch_array()){
                        echo "<td colspan='3' >" . 
                        "<div class='form-outline'>
                          <input type='number' id='typeNumber' class='form-control' name='Y1-".$row['StudentID']."' value='".$row2['1stYear']."' />
                        </div>"."</td>";
                        echo "<td colspan='3' >" . 
                        "<div class='form-outline'>
                          <input type='number' id='typeNumber' class='form-control' name='Y2-".$row['StudentID']."' value='".$row2['2ndYear']."'/>
                        </div>"."</td>";
                        echo "<td colspan='3' >" . 
                        "<div class='form-outline'>
                          <input type='number' id='typeNumber' class='form-control' name='Y3-".$row['StudentID']."' value='".$row2['3rdYear']."'/>
                        </div>"."</td>";
                        echo "<td colspan='3' >" . 
                        "<div class='form-outline'>
                          <input type='number' id='typeNumber' class='form-control' name='Y4-".$row['StudentID']."' value='".$row2['4thYear']."'/>
                        </div>"."</td>";
                    }

                echo "</tr>";
                $row_number+=1;
            } 
            echo "</table>"; 
            $res->free(); 
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
    
    <div class="mt-1">
      <?php
    echo"    <nav aria-label='Page navigation example' class='d-flex justify-content-center'>";
    echo"      <ul class='pagination'>";
    echo"        <li class='page-item'>";
    echo"          <a class='page-link' href='EditMarks.php?PageNo=".($page_number-1)."' aria-label='Previous'>";
    echo"            <span aria-hidden='true'>&laquo;</span>";
    echo"            <span class='sr-only'>Previous</span>";
    echo"          </a>";
    echo"        </li>";
    echo"        <li class='page-item'>";
    echo"          <a class='page-link' href='EditMarks.php?PageNo=".($page_number+1)."' aria-label='Previous'>";
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
    