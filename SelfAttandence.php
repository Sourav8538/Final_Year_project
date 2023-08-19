<?php
    session_start();
    $con=mysqli_connect("localhost","root","","authentication");
    $sql = "SELECT * FROM teachers where username='".$_SESSION['Tusername']."' and password='".$_SESSION['Tpassword']."'";
    $res = mysqli_query($con, $sql);
    if($res = $con->query($sql)){ 
        if($res->num_rows > 0){
            while($row = $res->fetch_array()){ 
                if($row['username']==$_SESSION['Tusername']){
                    if($row['Senior']==""){
                        header('Location: MakeTeacherAttendance.php');
                    }else{
                        header('Location: SelfAttandence2.php');
                    }
                }
            }

        } else{ 
            $messagee = "No matching records are found.";
            echo "<script type='text/javascript'> alert('$messagee'); </script> " . mysqli_error($con);
        } 
    } else{ 
        $messagee = "ERROR: Could not able to execute $sql. ";
        echo "<script type='text/javascript'> alert('$messagee'); </script> " . mysqli_error($con);
    }
?>