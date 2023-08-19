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
    <div class="d-flex justify-content-center bg-dark p-1 mb-2" style="color:white;">
        
        <div class="col-3 p-5 " style="background-image: url('logomu.jpg'); background-repeat: no-repeat; background-size: contain; ">
                
        </div>

    </div>
    <div class="d-flex justify-content-evenly align-items-center m-2" style=" background-image:url('BackgroundImage.jpg'); height:430px; background-repeat:no-repeat; background-size: 100% 100%;">

        <a href="/HRLogin.php" class="nav-link link-dark">
            <div class="px-5 py-4 hovering_" style="color: white;  border-radius: 30px;">HR</div>
        </a>

        <a href="/AccountLogin.php" class="nav-link link-dark">
            <div class="px-5 py-4 hovering_" style="color: white; border-radius: 30px;">Account</div>
        </a>

        <a href="/TeacherLogin.php" class="nav-link link-dark">
            <div class="px-5 py-4 hovering_" style="color: white; border-radius: 30px;">Teacher</div>
        </a>

        <a href="/StudentLogin.php" class="nav-link link-dark">
            <div class="px-5 py-4 hovering_" style="color: white; border-radius: 30px;">Student</div>
        </a>

        <a href="/LibraryLogin.php" class="nav-link link-dark">
            <div class="px-5 py-4 hovering_" style="color: white; border-radius: 30px;">Library</div>
        </a>

    </div>
    
    <style>
        .hovering_{
            background-color: black;
            font-weight: bold;
        }

        .hovering_:hover{
            background-color: darkgray;
            transition: 0.5s;
            color:black !important;
        }
    </style>