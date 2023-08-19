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
            $con=mysqli_connect("localhost","root","","authentication");

            // Check if username is available in student table then in teacher table
            // Check if BookId is valid and Book in available;
            $sql1= "SELECT * FROM students where UserName='".$_POST['UserName']."'";
            $sql2= "SELECT * FROM teachers where UserName='".$_POST['UserName']."'";
            $res = mysqli_query($con, $sql1);
            $username_avail=0;
            if($res->num_rows > 0){
              $username_avail=1;
            }else{
            if($username_avail==0){
              $res = mysqli_query($con, $sql2);
              if($res->num_rows > 0){
                $username_avail=2;
              }
            }
            }
            if($username_avail==0){
              echo "<script type='text/javascript'> alert('No user with this id found!'); </script> ";
            }else{
              $sql3="SELECT * FROM books where status='Available' and BookId='".$_POST['BookId']."'";
              $res2 = mysqli_query($con, $sql3);
              
              if($res2->num_rows>0){
                $row = $res2->fetch_array();
                $sql4="UPDATE `books` SET `UserName`='".$_POST['UserName']."',`IssueDate`='".$_POST['IssueDate']."',
                `ReturnDate`='".$_POST['ReturnDate']."',`Status`='Unavailable' WHERE Status='Available' and BookId='".$_POST['BookId']."'";
                $res3 = mysqli_query($con, $sql4);
              }else{
                echo "<script type='text/javascript'> alert('This Book is not available!'); </script> ";
              }
            }

            // header('Location: ViewBookDetails.php');
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
      <span class="fs-4">Library Section</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="/ViewBookDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ViewBookDetails.php"></use></svg>
          View All Book Details
        </a>
      </li>
      <li class="nav-item">
        <a href="/AddBookDetails.php" class="nav-link link-dark" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/AddBookDetails.php"></use></svg>
          Add Books
        </a>
      </li>
      <li class="nav-item">
        <a href="/IssueBook.php" class="nav-link active" aria-current="page">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/IssueBook.php"></use></svg>
          Issue Books
        </a>
      </li>

      <li>
        <a href="/ReturnBook.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/ReturnBook.php"></use></svg>
          Return Book
        </a>
      </li>
      <li>
        <a href="/RemoveBook.php" class="nav-link link-dark">
          <svg class="bi me-2" width="16" height="16"><use xlink:href="/RemoveBook.php"></use></svg>
          Remove Book
        </a>
      </li>

    </ul>
    <hr>
  </div>

    
    <form action="IssueBook.php" method="post">
        <div class="d-flex flex-column flex-shrink-0 m-2 p-3 bg-light " style="width: 1000px;">
            <h5>Enter Book Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="number" name="BookId" class="form-control" placeholder="Book Id" required>
                </div>
            </div>
            <hr>
            <h5>Enter Person Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="text" name="UserName" class="form-control" placeholder="User Name" required>
                </div>
            </div>
            <hr>
            <h5>Enter Other Details</h5>
            <div class="row m-2">
                <div class="col">
                    <input type="Date" name="IssueDate" class="form-control" placeholder="IssueDate">
                </div>
                <div class="col">
                    <input type="Date" name="ReturnDate" class="form-control" placeholder="ReturnDate">
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
    