<?php
    $con=mysqli_connect("localhost","root","","authentication");
    $sql = "SELECT * FROM books";  
    $res = mysqli_query($con, $sql);
    $today=date("Y-m-d");

    function dateDiffInDays($date1, $date2) 
    {
        // Calculating the difference in timestamps
        $diff = strtotime($date2) - strtotime($date1);
    
        // 1 day = 24 hours
        // 24 * 60 * 60 = 86400 seconds
        return abs(round($diff / 86400));
    }

    while($row = $res->fetch_array()){
        $datetime2 = $row['ReturnDate'];
        // echo $datetime2;
        // echo $today;
        $interval = dateDiffInDays($today, $datetime2);
        $fine=0;

        if($interval>=21){
            $fine=50;
        }elseif($interval>=14){
            $fine=20;
        }elseif($interval>=7){
            $fine=5;
        }
        $total= $interval*$fine;

        $sql2 = "UPDATE `books` SET `Fine`='".$total."' where UserName='".$row['UserName']."'";
        $con2=mysqli_connect("localhost","root","","authentication");
        $res2 = mysqli_query($con2, $sql2);
    }
?>
