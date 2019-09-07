<?php
    if(isset($_POST['submit'])){
        require_once 'config/database.php';

        $nama       = $_POST['nama'];
        $work       = $_POST['work'];
        $salary     = $_POST['salary'];

        $sql  = "INSERT INTO nama VALUES('','$nama','$work','$salary')";
        $conn->query($sql);

        header("Location: index.php");

    }else{
        header("Location: index.php");
    }
?>