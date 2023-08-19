<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >
    <script src="js/jquery-3.6.3.js"></script>
</head>
<body>
    <div class="d-flex justify-content-between bg-dark p-1" style="color:white;">
        
        <a href="/" class="col-2 hovering" style="display: block;background-image: url('logomu.jpg'); background-position-y:center; background-repeat: no-repeat; background-size: contain; ">
        </a>
        <div class="col-8 d-flex align-items-center justify-content-evenly">
            <h1>All Students</h1>
        </div>
        <a href="/Logout.php" style="text-decoration: none; color:white;">
          <div class="col-2 d-flex align-items-center justify-content-evenly">
              <div type="button" class="btn btn-secondary py-3 m-2"> Log&nbspOut</div>
          </div>
        </a>

    </div>


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
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewTeacherAccount.php"></use></svg>
          View Teacher Accounts
        </a>
      </li>
      <li class="nav-item">
        <a href="/UpdateTeachersAccount.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateTeacherDetails.php"></use></svg>
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
        <a href="/ViewStudentsAccount.php" class="nav-link active">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentAccount.php"></use></svg>
          View Student Accounts
        </a>
      </li>
      <li>
        <a href="/UpdateStudentsAccount.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateStudentDetails.php"></use></svg>
          Input Student Accounts
        </a>
      </li>
      <li>
          <a href="/InputStudentFees.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputStudentFees.php"></use></svg>
          Update Student Fees
          </a>
      </li>

    </ul>
    <hr>
  </div>

    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="overflow: auto; white-space: nowrap; width: 1000px;">				
    <?php
    $con=mysqli_connect("localhost","root","","authentication");
    if(empty($_GET['PageNo'])){
      $_GET['PageNo']=1;
    }
    $page_number=$_GET['PageNo'];
    $limit=9;
    $initial_page=$initial_page = ($page_number-1) * $limit; ;

    $sql = "SELECT * FROM students LIMIT " . $initial_page . ',' . $limit;  
    $res = mysqli_query($con, $sql);
    $row_number=9*($page_number-1);
    if($res = $con->query($sql)){ 
        if($res->num_rows > 0){ 
            echo "<table class='table table-striped'>"; 
                echo "<tr>";
                    echo "<th colspan='3' scope='col'></th>";
                    echo "<th colspan='3' scope='col'>First&nbspname </th>"; 
                    echo "<th colspan='3' scope='col'>Middle&nbspname</th>";
                    echo "<th colspan='3' scope='col'>Last&nbspname</th>"; 
                    echo "<th colspan='3' scope='col'>Department</th>";                    
                    echo "<th colspan='3' scope='col'>Bank&nbspName</th>";
                    echo "<th colspan='3' scope='col'>Account&nbspNumber</th>";
                    echo "<th colspan='3' scope='col'>IFSC</th>";
                    echo "<th colspan='3' scope='col'>Brunch&nbspCode</th>";
                    echo "<th colspan='3' scope='col'>Phone&nbspNumber</th>";
                echo "</tr>"; 
                
            while($row = $res->fetch_array()){ 
                echo "<tr>";
                    echo "<td colspan='3' >" . $row_number . "</td>";
                    echo "<td colspan='3' >" . $row['Fname'] . "</td>";
                    echo "<td colspan='3' >" . $row['Mname'] . "</td>"; 
                    echo "<td colspan='3' >" . $row['Lname'] . "</td>";
                    echo "<td colspan='3' >" . $row['Brunch'] . "</td>";
                    echo "<td colspan='3' >" . $row['BankName'] . "</td>";
                    echo "<td colspan='3' >" . $row['AccountNo'] . "</td>";
                    echo "<td colspan='3' >" . $row['IFSC'] . "</td>";
                    echo "<td colspan='3' >" . $row['BrunchCode'] . "</td>";
                    echo "<td colspan='3' >" . $row['PhoneNo'] . "</td>";
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
    </div>
    
</main>

<?php
echo"    <nav aria-label='Page navigation example' class='d-flex justify-content-center'>";
echo"      <ul class='pagination'>";
echo"        <li class='page-item'>";
echo"          <a class='page-link' href='ViewStudentsAccount.php?PageNo=".($page_number-1)."' aria-label='Previous'>";
echo"            <span aria-hidden='true'>&laquo;</span>";
echo"            <span class='sr-only'>Previous</span>";
echo"          </a>";
echo"        </li>";
echo"        <li class='page-item'>";
echo"          <a class='page-link' href='ViewStudentsAccount.php?PageNo=".($page_number+1)."' aria-label='Previous'>";
echo"            <span class='sr-only'>Next</span>";
echo"            <span aria-hidden='true'>&raquo;</span>";
echo"          </a>";
echo"        </li>";
echo"      </ul>";
echo"    </nav>";
?>

<?PHP
    include('Footer.php')
?>
    