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
    session_start();
    if(isset($_POST['confirm'])){
        if($_POST['confirm']=='Confirm'){

            $con=mysqli_connect("localhost","root","","authentication");
            $sql = "UPDATE `teachers` SET `username`='".$_POST['username']."',`password`='".$_POST['password']."',
            `branch`='".$_POST['branch']."',`department`='".$_POST['department']."',`PhoneNo`='".$_POST['PhoneNo']."',
            `Fname`='".$_POST['Fname']."',`Mname`='".$_POST['Mname']."',`Lname`='".$_POST['Lname']."',`DOJ`='".$_POST['DOJ']."',
            `10thSchoolName`='".$_POST['10thSchoolName']."',`10thSchoolMarks`='".$_POST['10thSchoolMarks']."',`10thPasingYear`='".$_POST['10thPasingYear']."',
            `12thSchoolName`='".$_POST['12thSchoolName']."',`12thSchoolMarks`='".$_POST['12thSchoolMarks']."',`12thPassingYear`='".$_POST['12thPassingYear']."',
            `BachelorCollegeName`='".$_POST['BachelorCollegeName']."',`BachelorCollegeMarks`='".$_POST['BachelorCollegeMarks']."',
            `BachelorPassingYear`='".$_POST['BachelorPassingYear']."',`MastersCollegesName`='".$_POST['MastersCollegesName']."',
            `MastersCollegesMarks`='".$_POST['MastersCollegesMarks']."',`MastersPassingYear`='".$_POST['MastersPassingYear']."',
            `DOB`='".$_POST['DOB']."',`VillageOrCity`='".$_POST['VillageOrCity']."',`PO`='".$_POST['PO']."',
            `PS`='".$_POST['PS']."',`Pin`='".$_POST['Pin']."',`Dist`='".$_POST['Dist']."',`State`='".$_POST['State']."',
            `Country`='".$_POST['Country']."',`Gender`='".$_POST['Gender']."',`BankName`='".$_POST['BankName']."',
            `AccountNo`='".$_POST['AccountNo']."',`IFSC`='".$_POST['IFSC']."',`BrunchCode`='".$_POST['BrunchCode']."',
            `Email`='".$_POST['Email']."',`Height`='".$_POST['Height']."',`Weight`='".$_POST['Weight']."',
            `BloodGroup`='".$_POST['BloodGroup']."',`AadharNo`='".$_POST['AadharNo']."' WHERE username='".$_POST['username']."'";

            $res = mysqli_query($con, $sql);


            // header('Location: ViewTeacherDetails.php');
        }else{
            echo '<div class="p-2 d-flex justify-content-center bg-danger" style="color: white;">';
                echo "<div class='col-2'><h5>Type&nbsp'Confirm'&nbspto&nbspcontinue!</h5></div>";
            echo '</div>';
        }
    }
?>
    <div class="d-flex justify-content-between bg-dark p-1" style="color:white;">
        
        <a href="/" class="col-2 hovering" style="display: block;background-image: url('logomu.jpg'); background-position-y:center; background-repeat: no-repeat; background-size: contain; ">
        </a>
        <div class="col-8 d-flex align-items-center justify-content-evenly">
            <h1>Edit Teacher</h1>
        </div>
        <a href="/Logout.php" style="text-decoration: none; color:white;">
          <div class="col-2 d-flex align-items-center justify-content-evenly">
              <div type="button" class="btn btn-secondary py-3 m-2"> Log&nbspOut</div>
          </div>
        </a>

    </div>


    <main style="display:flex; overflow-y: hidden;" >
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
        <a href="/UpdateTeacherDetails.php" class="nav-link active" aria-current="page">
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
        <a href="/ViewStudentDetails.php" class="nav-link link-dark">
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
          Update Students Details
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
          Update Librarian Details
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
<?php
    if(isset($_POST["username"])){
        if($_POST["username"]=='' and $_POST["password"]==''){
            echo '<form action="UpdateTeacherDetails.php" method="post">
                <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light " style="width: 1000px;">
                    <h5>Enter Account Details</h5>
                    <div class="row m-2">
                        <div class="col">
                            <input type="text" name="username" class="form-control" placeholder="Username">
                        </div>
                        <div class="col">
                            <input type="text" name="password" class="form-control" placeholder="Password">
                        </div>
                        <div class="col">
                            <input class="btn btn-primary p-1" type="submit" value="Search">
                        </div>
                    </div>
                </div>

                </form>';
        }else{
    $con=mysqli_connect("localhost","root","","authentication");
    $sql2 = "SELECT * FROM teachers where username='".$_POST['username']."' and password='".$_POST['password']."'";
    $req2 = mysqli_query($con, $sql2);
    $res2 = $con->query($sql2);
    while($row2 = $res2->fetch_array()){
    echo '
    <form action="UpdateTeacherDetails.php" method="post">
        <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light " style="width: 1000px;">
            <h5>Enter Account Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="username" value="'.$row2['username'].'" class="form-control" placeholder="Username">
                </div>
                <div class="col">
                    <input type="text" name="password" value="'.$row2['password'].'" class="form-control" placeholder="Password">
                </div>
                <div class="col">
                    <input class="btn btn-primary p-1" type="submit" value="Search">
                </div>
            </div>
            <h5>Enter Personal Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="Fname" value="'.$row2['Fname'].'" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                    <input type="text" name="Mname" value="'.$row2['Mname'].'" class="form-control" placeholder="Mid name">
                </div>
                <div class="col">
                    <input type="text" name="Lname" value="'.$row2['Lname'].'" class="form-control" placeholder="Last name">
                </div>
            </div>
            <div class="row m-2">
                <div class="col d-flex">
                    Date&nbspof&nbspBirth:&nbsp<input type="Date" value="'.$row2['DOB'].'" name="DOB" class="form-control" placeholder="Date Of Birth">
                </div>
                <div class="col">
                    <select name="Gender" class="form-select">
                        <option selected value="'.$row2['Gender'].'">'.$row2['Gender'].'</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col">
                    <input type="number" value="'.$row2['PhoneNo'].'" name="PhoneNo"  class="form-control" placeholder="PhoneNo">
                </div>
                
            </div>
            <div class="row m-2">
                <div class="col">
                    <input type="email" name="Email" value="'.$row2['Email'].'" class="form-control" placeholder="Email">
                </div>
                <div class="col">
                    <input type="text" name="brunch" value="'.$row2['branch'].'" class="form-control" placeholder="Brunch">
                </div>
            </div>
            <div class="row m-2">
                <div class="col">
                    <input type="number" name="Height" value="'.$row2['Height'].'" step="0.01" class="form-control" placeholder="Height">
                </div>
                <div class="col">
                    <input type="number" name="Weight" value="'.$row2['Weight'].'" step="0.01" class="form-control" placeholder="Weight">
                </div>
                <div class="col">
                    <select name="BloodGroup" class="form-select">
                        <option selected value="'.$row2['BloodGroup'].'">'.$row2['BloodGroup'].'</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>
                </div>
            </div>
            <div class="row m-2">
                <div class="col">
                    <input type="number" name="AadharNo" value="'.$row2['AadharNo'].'" class="form-control" placeholder="Aadhar Number" min="100000000000" max="999999999999">
                </div>
            </div>

            <hr>
            <h5>Enter Education Details</h5>
            
            <div class="row m-2">
                <div class="col"><h6>10th Details</h6></div>
                <div class="col">
                    <input type="text" name="10thSchoolName" value="'.$row2['10thSchoolName'].'" class="form-control" placeholder="10th School Name">
                </div>
                <div class="col">
                    <input type="number" name="10thSchoolMarks" value="'.$row2['10thSchoolMarks'].'" class="form-control" placeholder="10th Marks">
                </div>
                <div class="col">
                    <input type="date" name="10thPasingYear" value="'.$row2['10thPasingYear'].'" class="form-control" placeholder="10th passing year">
                </div>
            </div>

            <div class="row m-2">
                <div class="col"><h6>12th Details</h6></div>
                <div class="col">
                    <input type="text" name="12thSchoolName" value="'.$row2['12thSchoolName'].'" class="form-control" placeholder="12th School Name">
                </div>
                <div class="col">
                    <input type="number" name="12thSchoolMarks" value="'.$row2['12thSchoolMarks'].'" class="form-control" placeholder="12th Marks">
                </div>
                <div class="col">
                    <input type="date" name="12thPassingYear" value="'.$row2['12thPassingYear'].'" class="form-control" placeholder="12th passing year">
                </div>
            </div>
            <div class="row m-2">
                <div class="col"><h6>Bachlors Details</h6></div>
                <div class="col">
                    <input type="text" name="BachelorCollegeName" value="'.$row2['BachelorCollegeName'].'" class="form-control" placeholder="12th School Name">
                </div>
                <div class="col">
                    <input type="number" name="BachelorCollegeMarks" value="'.$row2['BachelorCollegeMarks'].'" class="form-control" placeholder="12th Marks">
                </div>
                <div class="col">
                    <input type="date" name="BachelorPassingYear" value="'.$row2['BachelorPassingYear'].'" class="form-control" placeholder="12th passing year">
                </div>
            </div>
            <div class="row m-2">
                <div class="col"><h6>Masters Details</h6></div>
                <div class="col">
                    <input type="text" name="MastersCollegesName" value="'.$row2['MastersCollegesName'].'" class="form-control" placeholder="12th School Name">
                </div>
                <div class="col">
                    <input type="number" name="MastersCollegesMarks" value="'.$row2['MastersCollegesMarks'].'" class="form-control" placeholder="12th Marks">
                </div>
                <div class="col">
                    <input type="date" name="MastersPassingYear" value="'.$row2['MastersPassingYear'].'" class="form-control" placeholder="12th passing year">
                </div>
            </div>
            <hr>
            <h5>Enter Address Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="VillageOrCity" value="'.$row2['VillageOrCity'].'" class="form-control" placeholder="Village/City">
                </div>
                <div class="col">
                    <input type="text" name="PO" value="'.$row2['PO'].'" class="form-control" placeholder="Post Office">
                </div>

    
            </div>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="PS" value="'.$row2['PS'].'" class="form-control" placeholder="Police Station">
                </div>
                <div class="col">
                    <input type="text" name="Pin" value="'.$row2['Pin'].'" class="form-control" placeholder="Pin Code">
                </div>
            </div> 
            <div class="row m-2">
                    <div class="col">
                        <input type="text" name="Dist" value="'.$row2['Dist'].'" class="form-control" placeholder="District">
                    </div>
                    <div class="col">
                        <input type="text" name="State" value="'.$row2['State'].'" class="form-control" placeholder="State">
                    </div>
                    <div class="col">
                        <input type="text" name="Country" value="'.$row2['Country'].'" class="form-control" placeholder="Country">
                    </div>
            </div> 
            <hr>
            <h5>Enter Job Details</h5>
            <div class="row">
                <div class="col">
                    <input type="text" name="branch" value="'.$row2['branch'].'" class="form-control" placeholder="Branch">
                </div>
                <div class="col">
                    <input type="text" name="department" value="'.$row2['department'].'" class="form-control" placeholder="Department">
                </div>
                <div class="col">
                    <input type="date" name="DOJ" value="'.$row2['DOJ'].'" class="form-control" placeholder="Date of joining">
                </div>
            </div>
            <hr>

            <h5>Enter Bank Details</h5>
            <div class="row">
                <div class="col">
                    <input type="text" name="BankName" value="'.$row2['BankName'].'" class="form-control" placeholder="Bank Name">
                </div>
                <div class="col">
                    <input type="text" name="AccountNo" value="'.$row2['AccountNo'].'" class="form-control" placeholder="Account Number">
                </div>
                <div class="col">
                    <input type="text" name="IFSC" value="'.$row2['IFSC'].'" class="form-control" placeholder="IFSC Code">
                </div>
                <div class="col">
                    <input type="text" name="BrunchCode" value="'.$row2['BrunchCode'].'" class="form-control" placeholder="Brunch Code">
                </div>
            </div>

            <hr>

        <div class="mt-5">
            <input type="text" name="confirm" class="form-control" id="inputPassword2" placeholder="Type Confirm to continue">
        </div>
            <input class="btn btn-primary mt-3 p-2" type="submit" value="Submit">
        </div>
    </form>';
    }}
    }else{
        echo '<form action="UpdateTeacherDetails.php" method="post">
        <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light " style="width: 1000px;">
            <h5>Enter Account Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="username" class="form-control" placeholder="Username">
                </div>
                <div class="col">
                    <input type="text" name="password" class="form-control" placeholder="Password">
                </div>
                <div class="col">
                    <input class="btn btn-primary p-1" type="submit" value="Search">
                </div>
            </div>
        </div>

        </form>';
    }
?>
    </main>
<?PHP
    include('Footer.php')
?>
    