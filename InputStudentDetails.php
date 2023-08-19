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
    if(isset($_POST['confirm'])){

        if($_POST['confirm']=='Confirm'){

            // Check all the variables
            // if(){

            // }
            $con=mysqli_connect("localhost","root","","authentication");
            $sql = "
            INSERT INTO `students`(`Fname`, `Mname`, `Lname`, `DOB`, `10thSchoolName`,
            `10thSchoolMarks`, `10thSchoolPassingYear`, `12thSchoolName`, `12thSchoolMarks`,
            `12thSchoolPassingYear`, `VillageOrCity`, `PO`, `PS`, `Pin`, `Dist`, `State`, 
            `Country`, `PhoneNo`, `Email`, `UserName`, `Password`, `Brunch`, `Roll`, `Height`, 
            `Weight`, `BloodGroup`, `AadharNo`, `Hosteller`, `ParestsName`, 
            `ParentsPhoneNumber`, `Gender`,`BankName`, `AccountNo`, `IFSC`, `BrunchCode`) 
            VALUES ('".$_POST['Fname']."','".$_POST['Mname']."','".$_POST['Lname']."','".$_POST['DOB']."',
            '".$_POST['10thSchoolName']."','".$_POST['10thSchoolMarks']."','".$_POST['10thSchoolPassingYear']."',
            '".$_POST['12thSchoolName']."','".$_POST['12thSchoolMarks']."','".$_POST['12thSchoolPassingYear']."',
            '".$_POST['VillageOrCity']."','".$_POST['PO']."', '".$_POST['PS']."','".$_POST['Pin']."',
            '".$_POST['Dist']."','".$_POST['State']."', '".$_POST['Country']."','".$_POST['PhoneNo']."',
            '".$_POST['Email']."', '".$_POST['UserName']."', '".$_POST['Password']."', '".$_POST['Brunch']."',
            '".$_POST['Roll']."', '".$_POST['Height']."','".$_POST['Weight']."', '".$_POST['BloodGroup']."',
            '".$_POST['AadharNo']."', '".$_POST['Hosteller']."','".$_POST['ParestsName']."',
            '".$_POST['ParentsPhoneNumber']."','".$_POST['Gender']."','".$_POST['BankName']."',
            '".$_POST['AccountNo']."', '".$_POST['IFSC']."', '".$_POST['BrunchCode']."')";
            $res = mysqli_query($con, $sql);

            $sql2 = "INSERT INTO `admin`
            (`FName`, `MName`, `LName`, `UserName`, `Password`, `AccountType`)
            VALUES ('".$_POST['Fname']."','".$_POST['Mname']."','".$_POST['Lname']."','".$_POST['UserName']."','".$_POST['Password']."','Student')";
            $res2 = mysqli_query($con,$sql2);

            $sql3 = "INSERT INTO `marks`(`UserName`, `CA1`, `CA2`, `CA3`, `CA4`) 
            VALUES ('".$_POST['UserName']."','0','0','0','0')";
            $res3 = mysqli_query($con,$sql3);

            $sql4 = "INSERT INTO `fees`(`UserName`, `1stYear`, `2ndYear`, `3rdYear`, `4thYear`)
            VALUES ('".$_POST['UserName']."','52000','52000','54000','54000')";
            $res4 = mysqli_query($con,$sql4);

            header('Location: ViewStudentDetails.php');
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
            <h1>Edit Students</h1>
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
        <a href="/ViewStudentDetails.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewStudentDetails.php"></use></svg>
          View Students Details
        </a>
      </li>
      <li>
        <a href="/InputStudentDetails.php" class="nav-link active">
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

     
    
    <form action="InputStudentDetails.php" method="post">
        <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light " style="width: 1000px;">
            <h5>Enter Account Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="UserName" class="form-control" placeholder="Username">
                </div>
                <div class="col">
                    <input type="text" name="Password" class="form-control" placeholder="Password">
                </div>
            </div>
            <hr>
            <h5>Enter Personal Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="Fname" class="form-control" placeholder="First name">
                </div>
                <div class="col">
                    <input type="text" name="Mname" class="form-control" placeholder="Mid name">
                </div>
                <div class="col">
                    <input type="text" name="Lname" class="form-control" placeholder="Last name">
                </div>
            </div>
            <div class="row m-2">
                <div class="col d-flex">
                    Date&nbspof&nbspBirth:&nbsp<input type="Date" name="DOB" class="form-control" placeholder="Date Of Birth">
                </div>
                <div class="col">
                    <select name="Gender" class="form-select">
                        <option selected>Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="col">
                    <input type="number" name="PhoneNo"  class="form-control" placeholder="PhoneNo">
                </div>
                
            </div>
            <div class="row m-2">
                <div class="col">
                    <input type="email" name="Email"  class="form-control" placeholder="Email">
                </div>
                <div class="col">
                    <input type="text" name="Brunch"  class="form-control" placeholder="Brunch">
                </div>
                <div class="col">
                    <input type="number" name="Roll"  class="form-control" placeholder="Roll">
                </div>
            </div>
            <div class="row m-2">
                <div class="col">
                    <input type="number" name="Height" step="0.01" class="form-control" placeholder="Height">
                </div>
                <div class="col">
                    <input type="number" name="Weight" step="0.01" class="form-control" placeholder="Weight">
                </div>
                <div class="col">
                    <select name="BloodGroup" class="form-select">
                        <option selected>Select Blood Group</option>
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
                    <select name="Hosteller" class="form-select">
                        <option selected>If Hosteller</option>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
                </div>
                <div class="col">
                    <input type="text" name="ParestsName"  class="form-control" placeholder="Parests Name">
                </div>
                <div class="col">
                    <input type="number" name="ParentsPhoneNumber"  class="form-control" placeholder="Parents Phone Number">
                </div>
            </div>
            <div class="row m-2">
                <div class="col">
                    <input type="number" name="AadharNo"  class="form-control" placeholder="Aadhar Number" min="100000000000" max="999999999999">
                </div>
            </div>

            <hr>
            <h5>Enter Education Details</h5>
            
            <div class="row m-2">
                <div class="col"><h6>10th Details</h6></div>
                <div class="col">
                    <input type="text" name="10thSchoolName" class="form-control" placeholder="10th School Name">
                </div>
                <div class="col">
                    <input type="text" name="10thSchoolMarks" class="form-control" placeholder="10th Marks">
                </div>
                <div class="col">
                    <input type="date" name="10thSchoolPassingYear" class="form-control" placeholder="10th passing year">
                </div>
            </div>

            <div class="row m-2">
                <div class="col"><h6>12th Details</h6></div>
                <div class="col">
                    <input type="text" name="12thSchoolName" class="form-control" placeholder="12th School Name">
                </div>
                <div class="col">
                    <input type="text" name="12thSchoolMarks" class="form-control" placeholder="12th Marks">
                </div>
                <div class="col">
                    <input type="date" name="12thSchoolPassingYear" class="form-control" placeholder="12th passing year">
                </div>
            </div>
            <hr>

            <h5>Enter Address Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="VillageOrCity" class="form-control" placeholder="Village/City">
                </div>
                <div class="col">
                    <input type="text" name="PO" class="form-control" placeholder="Post Office">
                </div>

    
            </div>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="PS" class="form-control" placeholder="Police Station">
                </div>
                <div class="col">
                    <input type="text" name="Pin" class="form-control" placeholder="Pin Code">
                </div>
            </div> 
            <div class="row m-2">
                    <div class="col">
                        <input type="text" name="Dist" class="form-control" placeholder="District">
                    </div>
                    <div class="col">
                        <input type="text" name="State" class="form-control" placeholder="State">
                    </div>
                    <div class="col">
                        <input type="text" name="Country" class="form-control" placeholder="Country">
                    </div>
            </div> 
            <hr>

            <h5>Enter Bank Details</h5>
            <div class="row">
                <div class="col">
                    <input type="text" name="BankName" class="form-control" placeholder="Bank Name">
                </div>
                <div class="col">
                    <input type="text" name="AccountNo" class="form-control" placeholder="Account Number">
                </div>
                <div class="col">
                    <input type="text" name="IFSC" class="form-control" placeholder="IFSC Code">
                </div>
                <div class="col">
                    <input type="text" name="BrunchCode" class="form-control" placeholder="Brunch Code">
                </div>
            </div>

            <hr>

        <div class="mt-5">
            <input type="text" name="confirm" class="form-control" id="inputPassword2" placeholder="Type 'Confirm' to continue">
        </div>
            <input class="btn btn-primary mt-3 p-2" type="submit" value="Submit">
        </div>
    </form>
        
    </main>
<?PHP
    include('Footer.php')
?>
    