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
        
        <a href="/" class="col-2 hovering" style="display: block; background-image: url('logomu.jpg'); background-position-y:center; background-repeat: no-repeat; background-size: contain; ">
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


    <main style="display:flex;" >
    <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light" style="width: 300px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
      <svg class="bi me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
      <span class="fs-4">HR Section</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/ViewTeacherDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewTeacherDetails.php"></use></svg>
          View Teacher Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/InputTeacherDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputTeacherDetails.php"></use></svg>
          Input Teacher Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/UpdateTeacherDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateTeacherDetails.php"></use></svg>
          Update Teacher Details
        </a>
      </li>

      <li class="nav-item">
        <a href="/DeleteTeacher.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/DeleteTeacher.php"></use></svg>
          Delete Teacher Details
        </a>
      </li>
      <hr>
      <li>
        <a href="/ViewStudentDetails.php" class="nav-link active">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentDetails.php"></use></svg>
          View Students Details
        </a>
      </li>
      <li>
        <a href="/InputStudentDetails.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputStudentDetails.php"></use></svg>
          Input Students Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/UpdateStudentDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateStudentDetails.php"></use></svg>
          Update Student Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/DeleteStudent.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/DeleteStudent.php"></use></svg>
          Delete Students Details
        </a>
      </li>
      <hr>
      <li>
        <a href="/ViewAccountant.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewAccountant.php"></use></svg>
          View Accountant Details
        </a>
      </li>
      <li>
        <a href="/InputAccountant.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputAccountant.php"></use></svg>
          Input Accountant Details
        </a>
      </li>
      <li>
        <a href="/UpdateAccountant.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateAccountant.php"></use></svg>
          Update Accountant Details
        </a>
      </li>
      <li>
        <a href="/DeleteAccountant.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/DeleteAccountant.php"></use></svg>
          Delete Accountant Details
        </a>
      </li>
      <hr>
      <li>
        <a href="/ViewLibrarian.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewLibrarian.php"></use></svg>
          View Librarian Details
        </a>
      </li>
      <li>
        <a href="/InputLibrarian.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/InputLibrarian.php"></use></svg>
          Input Librarian Details
        </a>
      </li>
      <li>
        <a href="/UpdateLibrarian.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/UpdateLibrarian.php"></use></svg>
          Update Accountant Details
        </a>
      </li>
      <li>
        <a href="/DeleteLibrarian.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/DeleteLibrarian.php"></use></svg>
          Delete Librarian Details
        </a>
      </li>

    </ul>
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
              echo "<th colspan='3' scope='col'>Studnet Id</th>";
              echo "<th colspan='3' scope='col'>First&nbspname </th>"; 
              echo "<th colspan='3' scope='col'>Middle&nbspname</th>";
              echo "<th colspan='3' scope='col'>Last&nbspname</th>"; 
              echo "<th colspan='3' scope='col'>Roll&nbspNo</th>"; 
              echo "<th colspan='3' scope='col'>Gender </th>"; 
              echo "<th colspan='3' scope='col'>DOB </th>";
              echo "<th colspan='3' scope='col'>Branch </th>"; 
              echo "<th colspan='3' scope='col'>Phone&nbspNumber </th>"; 
              echo "<th colspan='3' scope='col'>10th&nbspSchool </th>";
              echo "<th colspan='3' scope='col'>10th&nbspMarks </th>";
              echo "<th colspan='3' scope='col'>10th&nbspPassing&nbspYear </th>";
              echo "<th colspan='3' scope='col'>12th&nbspSchool </th>";
              echo "<th colspan='3' scope='col'>12th&nbspMarks </th>";
              echo "<th colspan='3' scope='col'>12th&nbspPassing&nbspYear </th>";
              echo "<th colspan='3' scope='col'>Village&nbspOR&nbspCity </th>";
              echo "<th colspan='3' scope='col'>Post&nbspOffice  </th>";
              echo "<th colspan='3' scope='col'>Police&nbspStation </th>";
              echo "<th colspan='3' scope='col'>Pin </th>";
              echo "<th colspan='3' scope='col'>District </th>";
              echo "<th colspan='3' scope='col'>State</th>";
              echo "<th colspan='3' scope='col'>Country </th>";
              echo "<th colspan='3' scope='col'>Bank&nbspName  </th>";
              echo "<th colspan='3' scope='col'>Account&nbspNo  </th>";
              echo "<th colspan='3' scope='col'>IFSC</th>";
              echo "<th colspan='3' scope='col'>Branch&nbspCode </th>";
              echo "<th colspan='3' scope='col'>Email </th>";
              echo "<th colspan='3' scope='col'>Height </th>";
              echo "<th colspan='3' scope='col'>Weight </th>";
              echo "<th colspan='3' scope='col'>Blood&nbspGroup</th>";
              echo "<th colspan='3' scope='col'>Aadhar&nbspNo</th>";
              echo "<th colspan='3' scope='col'>Hosteller</th>";
              echo "<th colspan='3' scope='col'>Parents&nbspName</th>";
              echo "<th colspan='3' scope='col'>Parents&nbspPhone&nbspNumber</th>";
              echo "<th colspan='3' scope='col'>Semester</th>";
              echo "<th colspan='3' scope='col'>Year</th>";
          echo "</tr>"; 

            while($row = $res->fetch_array()){ 
                echo "<tr>";
                    echo "<td colspan='3' >" . $row['StudentID'] . "</td>";
                    // echo "<td colspan='3' >" . $row_number . "</td>";
                    echo "<td colspan='3' >" . $row['Fname'] . "</td>";
                    echo "<td colspan='3' >" . $row['Mname'] . "</td>"; 
                    echo "<td colspan='3' >" . $row['Lname'] . "</td>";
                    echo "<td colspan='3' >" . $row['Roll'] . "</td>";
                    echo "<td colspan='3' >" . $row['Gender'] . "</td>";
                    echo "<td colspan='3' >" . $row['DOB'] . "</td>";
                    echo "<td colspan='3' >" . $row['Brunch'] . "</td>";
                    

                    echo "<td colspan='3' >" . $row['PhoneNo'] . "</td>";
                    echo "<td colspan='3' >" . $row['10thSchoolName'] . "</td>";
                    echo "<td colspan='3' >" . $row['10thSchoolMarks'] . "</td>";
                    echo "<td colspan='3' >" . $row['10thSchoolPassingYear'] . "</td>";
                    echo "<td colspan='3' >" . $row['12thSchoolName'] . "</td>";
                    echo "<td colspan='3' >" . $row['12thSchoolMarks'] . "</td>";
                    echo "<td colspan='3' >" . $row['12thSchoolPassingYear'] . "</td>";
                    echo "<td colspan='3' >" . $row['VillageOrCity'] . "</td>";
                    echo "<td colspan='3' >" . $row['PO'] . "</td>";
                    echo "<td colspan='3' >" . $row['PS'] . "</td>";
                    echo "<td colspan='3' >" . $row['Pin'] . "</td>";
                    echo "<td colspan='3' >" . $row['Dist'] . "</td>";
                    echo "<td colspan='3' >" . $row['State'] . "</td>";
                    echo "<td colspan='3' >" . $row['Country'] . "</td>";
                    echo "<td colspan='3' >" . $row['BankName'] . "</td>";
                    echo "<td colspan='3' >" . $row['AccountNo'] . "</td>";
                    echo "<td colspan='3' >" . $row['IFSC'] . "</td>";
                    echo "<td colspan='3' >" . $row['BrunchCode'] . "</td>";
                    echo "<td colspan='3' >" . $row['Email'] . "</td>";
                    echo "<td colspan='3' >" . $row['Height'] . "</td>";
                    echo "<td colspan='3' >" . $row['Weight'] . "</td>";
                    echo "<td colspan='3' >" . $row['BloodGroup'] . "</td>";
                    echo "<td colspan='3' >" . $row['AadharNo'] . "</td>";
                    echo "<td colspan='3' >" . $row['Hosteller'] . "</td>";
                    echo "<td colspan='3' >" . $row['ParestsName'] . "</td>";
                    echo "<td colspan='3' >" . $row['ParentsPhoneNumber'] . "</td>";
                    echo "<td colspan='3' >" . $row['Semester'] . "</td>";
                    echo "<td colspan='3' >" . $row['Year'] . "</td>";
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
  echo"          <a class='page-link' href='ViewStudentDetails.php?PageNo=".($page_number-1)."' aria-label='Previous'>";
  echo"            <span aria-hidden='true'>&laquo;</span>";
  echo"            <span class='sr-only'>Previous</span>";
  echo"          </a>";
  echo"        </li>";
  echo"        <li class='page-item'>";
  echo"          <a class='page-link' href='ViewStudentDetails.php?PageNo=".($page_number+1)."' aria-label='Previous'>";
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
    