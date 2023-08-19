<?php
    $con=mysqli_connect("localhost","root","","authentication");
    $sql = "SELECT * FROM teachers";
    $res = mysqli_query($con, $sql);


    if($res = $con->query($sql)){ 
    if($res->num_rows > 0){ 
        while($row = $res->fetch_array()){
        if($row['username']==$_SESSION['Tusername']){
            
            $sql2="INSERT INTO `teacher_attendance_temp`
            (`Fname`, `Mname`, `Lname`, `Time`, `Day`, `Month`, 
            `Year`, `Latitude`, `Longitude`, `UserName`, `Status`,`Senior`)
            VALUES ('".$row['Fname']."','".$row['Mname']."','".$row['Lname']."',
            '".$_COOKIE['hour'].":".$_COOKIE['minit'].":".$_COOKIE['second']."',
            '".date("d")."',
            '".date("m")."',
            '".date("Y")."',
            '".$_COOKIE['lat']."',
            '".$_COOKIE['lon']."',
            '".$row['username']."',
            '".$_POST['Status']."',
            '".$row['Senior']."')";                    
            $req = mysqli_query($con, $sql2);
        }
        } 
        }
    }
    // echo "aaa";
    // echo "$hour a";
    // echo "$minit b";
    // echo "$second c";
    // echo "$lat d";
    // echo "$lon";
    // echo $_COOKIE['minit'];
    // header('Location: SelfAttandence.php');
    
?>