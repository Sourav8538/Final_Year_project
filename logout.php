<?php 
    session_start();
    $messagee = "You are logged Out.";
    echo "<script type='text/javascript'> alert('$messagee'); </script> ";
?>

<?php
    $messagee = "You are logged Out.";
    echo "<script type='text/javascript'> alert('$messagee'); </script> ";
    session_unset();
    session_destroy();
    header('Location: http://localhost');
?>