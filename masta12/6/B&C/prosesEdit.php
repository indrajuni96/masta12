<?php
    if(isset($_POST['simpan'])){
        require_once 'config/database.php';

        $id  = $_POST['id'];
        $nama  = $_POST['nama'];
        $work  = $_POST['work'];
        $salary  = $_POST['salary'];

        $sql  = "UPDATE nama SET name='$nama', id_work='$work', id_salary='$salary' WHERE id = $id";

        $conn->query($sql);
        header("Location: index.php");

    }else{
        header("Location: index.php");
    }

    // echo "<script> console.log('hallo edit');</script>";
?>