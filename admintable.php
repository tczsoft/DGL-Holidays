<?php
    session_start();
    echo isset($_SESSION['username']);

    if(isset($_SESSION['username']) !== ""){
?>

<?php
    }
    else{
        header('location:index.html');
    }
?>